FROM php:7.4-fpm

RUN apt-get update -y && \

    docker-php-ext-install \
        pdo \
        pdo_mysql && \

    apt-get install -y \
            iputils-ping \
            supervisor

RUN pecl install redis && docker-php-ext-enable redis

RUN service supervisor start
