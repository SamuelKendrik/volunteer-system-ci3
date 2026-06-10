FROM php:7.4-apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html

RUN a2enmod rewrite

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80