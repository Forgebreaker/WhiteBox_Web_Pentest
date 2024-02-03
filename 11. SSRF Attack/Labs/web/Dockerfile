FROM php:7.2-apache

# Install packages
RUN apt update && apt install vsftpd -y && apt install ftp -y && apt install  net-tools -y
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql
RUN pecl install apcu && docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini

# Switch working environment 
WORKDIR /var/cbjs/html

# Copy challenge's file to public website 
COPY ./src /var/cbjs/html

# Copy challenge's file to internal website
COPY ./web-internal /var/cbjs/internal/html 

# Set up permissions for owner
RUN chown -R www-data:www-data /var/cbjs/html

# Configure apache2 server
COPY ./config/000-default.conf /etc/apache2/sites-available/
COPY ./config/apache2.conf /etc/apache2/ 
RUN echo "Listen 8888" >> /etc/apache2/ports.conf
RUN echo "Listen 9001" >> /etc/apache2/ports.conf

# Generate flag 5 into /etc/passwd
RUN echo "Flag5: CBJS{FAKE_FLAG_FAKE_FLAG}" >> /etc/passwd 
