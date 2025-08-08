# Use official PHP image with Apache
FROM php:8.2-apache

# Copy project files into the Apache document root
COPY . /var/www/html/

# Set Apache permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Apache runs automatically as the container's entrypoint
