FROM registry-backend.cic.kz/centras/php-fpm:7.3

WORKDIR /app

COPY ./ /app/

RUN ls
