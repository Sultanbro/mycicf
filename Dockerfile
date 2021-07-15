FROM registry-backend.cic.kz/centras/php-fpm:7.2

WORKDIR /app

COPY ./ /app/

RUN php composer.phar update
RUN npm i
RUN npm run prod
