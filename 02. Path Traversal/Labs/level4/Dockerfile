FROM php:7.3-apache

RUN mkdir /var/www/html/upload/

RUN chown -R root:www-data /var/www/html/upload

RUN a2enmod headers

COPY ./configs/apache2.conf /etc/apache2/apache2.conf
COPY ./configs/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./src/ /var/www/html/

RUN apt update
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;
# add write permission for upload file
RUN chmod g+w /var/www/html/upload/

RUN chmod +t -R /var/www/html/
RUN chmod +t -R /var/www/html/upload/

RUN echo "CBJS{FAKE_FLAG_FAKE_FLAG}"  > /secret.txt