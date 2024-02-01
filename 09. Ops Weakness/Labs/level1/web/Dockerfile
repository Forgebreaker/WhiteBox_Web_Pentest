FROM php:7.2-apache

# Install necessary packages
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

# Set the working directory for the web app
WORKDIR /var/www/html/

# Copy the challenge source code to default document root
COPY ./src /var/www/html/

# Set up permissions for owner
RUN chown -R root:www-data .
RUN chmod 750 .
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

# Add sticky bit to prevent delete files
RUN chmod +t -R .