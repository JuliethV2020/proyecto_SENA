FROM php:7.4-apache as base
RUN docker-php-ext-install mysqli
COPY . /var/www/html
WORKDIR /var/www/html