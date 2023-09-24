FROM php:7.3-apache

RUN apt update && apt install libzip-dev zlib1g-dev -y

RUN docker-php-ext-install zip

RUN mkdir /var/www/html/upload/

RUN a2enmod headers

COPY ./configs/apache2.conf /etc/apache2/apache2.conf
COPY ./configs/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY ./configs/apache2.conf /var/www/html/apache2.conf
COPY ./configs/000-default.conf /var/www/html/000-default.conf


COPY ./src /var/www/html

RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html


WORKDIR /var/www/html/
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

# add write permission for upload file
RUN chown -R root:www-data /var/www/html/upload
RUN chmod g+w /var/www/html/upload/

# add write permission for exploit ~~
RUN chmod g+w /var/www/html/

# prevent delete
RUN chmod +t -R /var/www/html/
RUN echo "CBJS{FAKE_FLAG_FAKE_FLAG}" > /secret.txt
