FROM registry-backend.cic.kz/centras/php-fpm:mycic

WORKDIR /app

ENV PUSHER_APP_ID=874293
ENV PUSHER_APP_KEY=7be3a303223fdcdf62d5
ENV PUSHER_APP_SECRET=91d7feb674c6a3f29d46
ENV PUSHER_APP_CLUSTER=ap2
ENV MIX_PUSHER_APP_KEY=7be3a303223fdcdf62d5
ENV MIX_PUSHER_APP_CLUSTER=ap2

# VOLUME /root/shared/vendor /app/vendor
# VOLUME /root/shared/node_modules /app/node_modules

COPY ./ /app/

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN wget https://getcomposer.org/composer.phar
RUN php composer.phar update
RUN php composer.phar dump-autoload

RUN npm i
RUN npm run dev

RUN chmod 0777 storage -R

CMD php artisan serve --host=0.0.0.0
