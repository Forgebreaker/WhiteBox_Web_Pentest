FROM php:7.3-apache

# put files
WORKDIR /var/www/html/
COPY ./src .
RUN curl -sS https://getcomposer.org/installer | php
RUN apt update
RUN apt install git unzip -y
RUN php composer.phar require guzzlehttp/guzzle:6.0.0
RUN echo "CBJS{FAKE_FLAG_FAKE_FLAG}" >> /flag

# Setup xdebug
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

# config permission
RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

# create folder to handle save data
RUN mkdir /usr/save_files/
RUN chown -R www-data:www-data /usr/save_files/ 

RUN chmod +t -R /var/www/html/

COPY ./php.ini /usr/local/etc/php/
