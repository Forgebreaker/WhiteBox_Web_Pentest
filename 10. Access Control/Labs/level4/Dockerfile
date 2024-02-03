# Use the official PHP 7.2 Apache image
FROM php:7.2-apache

# Install the necessary PHP extensions for MySQL support
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the web challenge into the default Document Root
WORKDIR /var/www/html/
COPY ./web .

# Configure permissions and ownership for the application code
RUN chown -R root:www-data .
RUN chmod 750 .
RUN find . -type f -exec chmod 640 {} \;
RUN find . -type d -exec chmod 750 {} \;

# Set the sticky bit to prevent deletion of files and directories
RUN chmod +t -R .