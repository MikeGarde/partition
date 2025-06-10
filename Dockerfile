ARG PHP_VERSION=8.1
FROM php:${PHP_VERSION}-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev

# Install Composer &...
# Can install >100 PHP extensions
# See: https://github.com/mlocati/docker-php-extension-installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions @composer xdebug

COPY devops/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN rm /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /app
