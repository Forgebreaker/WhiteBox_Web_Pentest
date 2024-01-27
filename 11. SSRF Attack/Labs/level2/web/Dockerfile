FROM php:7.2-apache

# Set up permissions for owner
RUN chown -R www-data:www-data /var/www/html

# Copy challenge's file to public website
COPY ./src /var/www/html/

# Copy challenge's file to internal website
COPY ./internal /var/www/internal/html 

# Configure apache2 server
COPY ./config/000-default.conf /etc/apache2/sites-available/
RUN echo "Listen 8888" >> /etc/apache2/ports.conf
RUN echo "Listen 9002" >> /etc/apache2/ports.conf