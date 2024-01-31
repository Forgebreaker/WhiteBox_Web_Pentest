FROM php:7.2-apache

RUN apt-get update && apt-get install inetutils-ping dnsutils -y

WORKDIR /var/www/html
COPY ./src .
COPY flag.txt /secret.txt
# config permission
RUN chown -R root:www-data /var/www/html
RUN chmod 750 /var/www/html
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

RUN chmod +t -R /var/www/html/