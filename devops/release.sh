#!/bin/zsh

# Variables
STEP=$1
BRANCH=$(git rev-parse --abbrev-ref HEAD)
RELEASES=$(gh release list --json tagName | jq -r '.[].tagName')

get_branch_for_tag() {
  local tag=$1
  local sha=$(git rev-list -n 1 "$tag")
  if git branch -r --contains "$sha" | grep -q "origin/main"; then
    echo "main"
  elif git branch -r --contains "$sha" | grep -q "origin/develop"; then
    echo "develop"
  else
    echo "other"
  fi
}

# Track latest versions
MAIN_VERSION="0.0.0"
DEVELOP_VERSION="0.0.0"
OTHER_VERSION="0.0.0"

for tag in $RELEASES; do
  branch=$(get_branch_for_tag $tag)
  case $branch in
    main)
      if [ "$(printf '%s\n' "$MAIN_VERSION" "$tag" | sort -V | tail -n1)" = "$tag" ]; then
        MAIN_VERSION=$tag
      fi
      ;;
    develop)
      if [ "$(printf '%s\n' "$DEVELOP_VERSION" "$tag" | sort -V | tail -n1)" = "$tag" ]; then
        DEVELOP_VERSION=$tag
      fi
      ;;
    other)
      if [ "$(printf '%s\n' "$OTHER_VERSION" "$tag" | sort -V | tail -n1)" = "$tag" ]; then
        OTHER_VERSION=$tag
      fi
      ;;
  esac
done

# Determine which version to bump
if [ "$BRANCH" = "main" ]; then
  VERSION=$MAIN_VERSION
elif [ "$BRANCH" = "develop" ]; then
  MAIN_MAJOR=$(echo $MAIN_VERSION | cut -d. -f1)
  DEV_MAJOR=$(echo $DEVELOP_VERSION | cut -d. -f1)
  if [ "$DEVELOP_VERSION" = "0.0.0" ] || [ "$DEV_MAJOR" = "$MAIN_MAJOR" ]; then
    VERSION="$((MAIN_MAJOR+1)).0.0"
  else
    VERSION=$DEVELOP_VERSION
  fi
else
  VERSION=$OTHER_VERSION
fi

# Parse version
MAJOR=$(echo $VERSION | cut -d. -f1)
MINOR=$(echo $VERSION | cut -d. -f2)
PATCH=$(echo $VERSION | cut -d. -f3)

# Bump version
if [ "$STEP" = "major" ]; then
  MAJOR=$((MAJOR+1))
  MINOR=0
  PATCH=0
elif [ "$STEP" = "minor" ]; then
  MINOR=$((MINOR+1))
  PATCH=0
elif [ "$STEP" = "patch" ]; then
  PATCH=$((PATCH+1))
else
  echo "Invalid step: $STEP"
  exit 1
fi
NEW_VERSION="$MAJOR.$MINOR.$PATCH"

# Build table data
header="$(printf '\033[1;34mBranch\033[0m|\033[1;34mLatest Version\033[0m')"
table_data=$(cat <<EOF
$header
main|$MAIN_VERSION
develop|$DEVELOP_VERSION
other|$OTHER_VERSION
EOF
)

# Format table
formatted_table=$(echo "$table_data" | column -t -s '|')

# Highlight row we are going to release
branch_row=$(echo "$formatted_table" | grep -E "^$BRANCH[[:space:]]")
highlighted_table=$(echo "$formatted_table" | sed "s|^$branch_row$|$(printf '\033[1;32m')$branch_row$(printf '\033[0m')|")

# Print table
echo "$highlighted_table"

# Confirm release
echo "\nNew version to release: \033[1;33m$NEW_VERSION\033[0m on branch \033[1;36m$BRANCH\033[0m"
read -p "Proceed with release? (y/N): " CONFIRM
if [[ ! "$CONFIRM" =~ ^[Yy]$ ]]; then
  echo "Aborted."
  exit 1
fi

gh release create "$NEW_VERSION" --generate-notes --target $BRANCH

exit 0
