FROM php:7.4-fpm

RUN apt-get update && \
    docker-php-ext-install pdo pdo_mysql && \
    apt-get install iputils-ping -y
