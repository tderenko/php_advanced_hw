FROM php:8.1-apache

RUN apt-get update \
    && apt-get install libpq-dev -y \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean
