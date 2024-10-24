FROM php:8.1-apache

# Replace shell with bash
SHELL ["/bin/bash", "-l", "-c"]

# Install Packages
RUN apt-get update --fix-missing
RUN apt-get install -y build-essential
RUN apt-get install -y vim
RUN apt-get install -y curl
RUN apt-get install -y zip unzip

# Install PHP Zip Extension
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

# Install PHP MySQL Driver
RUN docker-php-ext-install pdo pdo_mysql

# Install PHP GD Extension
RUN apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
RUN docker-php-ext-install gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Mod Rewrite
RUN a2enmod rewrite
RUN a2enmod headers

# RUN cd /etc/apache2/mods-enabled && ln -s /etc/apache2/mods-available/headers.load headers.load

RUN service apache2 restart

# Switch to Working Directory
WORKDIR /var/www
