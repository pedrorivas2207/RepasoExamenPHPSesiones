FROM php:8.3-apache

# Apache sirve los archivos PHP desde /var/www/html
WORKDIR /var/www/html

EXPOSE 80
