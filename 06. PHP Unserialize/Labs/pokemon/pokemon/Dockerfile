FROM php:7.3-apache

# put files
WORKDIR /var/www/html/
COPY ./src .
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

# Setup xdebug
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

# config permission
RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;
RUN chmod +t -R /var/www/html/
RUN echo -n "CBJS{FAKE_FLAG_FAKE_FLAG}" > /flag

COPY ./php.ini /usr/local/etc/php/
