FROM php:7.4-cli

RUN apt-get update -yqq \
 && apt-get install -yqq \
    # install sshd
    openssh-server \
    # install ping and netcat (for debugging xdebug connectivity)
    iputils-ping netcat \
    # common php extensions
    zip unzip libzip-dev libmcrypt-dev zlib1g-dev;

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

# @see https://docs.docker.com/engine/examples/running_ssh_service/
CMD ["/usr/sbin/sshd", "-D"]