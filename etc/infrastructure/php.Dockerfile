FROM php:8.2-fpm-alpine

COPY php/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY php/xdebug.ini /usr/local/etc/php/conf.d/

RUN apk --update upgrade \
    && apk add --update linux-headers \
    && apk add --no-cache autoconf automake make gcc g++ bash icu-dev libzip-dev \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        zip \
        pdo_mysql

RUN pecl install xdebug

RUN docker-php-ext-enable \
        opcache \
        xdebug

ENV PHP_IDE_CONFIG 'serverName=DockerApp'

RUN apk add --no-cache $PHPIZE_DEPS
