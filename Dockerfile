FROM registry-backend.cic.kz/centras/php-fpm:mycic

WORKDIR /app

# VOLUME /root/shared/vendor /vendor
# VOLUME /root/shared/node_modules /node_modules

COPY ./ /app/

RUN wget https://getcomposer.org/composer.phar
RUN php composer.phar update
RUN php composer.phar dump-autoload

RUN npm i
RUN npm run dev

RUN bash -c "rm -rf node_modules"

RUN chmod 0777 storage -R

CMD php artisan serve --host=0.0.0.0
