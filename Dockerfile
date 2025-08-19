# Simple PHP + Apache image for Render
FROM php:8.2-apache

# Optional: set timezone for logs
RUN echo "date.timezone=Asia/Ho_Chi_Minh" > /usr/local/etc/php/conf.d/timezone.ini

# Enable Apache modules if needed
RUN a2enmod rewrite

# Copy app to Apache document root
COPY . /var/www/html/

# Expose Apache port
EXPOSE 80

# Default CMD from base image launches apache2-foreground
