# Elegimos la versión de PHP8.1 con Debian Bulleye como base
FROM php:8.3-fpm-bookworm
ARG UNAME=www-data
ARG UGROUP=www-data
ARG UID=1000
ARG GID=1000

RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP

# Installing dependencies for the PHP modules
RUN apt-get update && \
apt-get install -y zip libzip-dev libpng-dev libfreetype-dev libjpeg62-turbo-dev unzip wget

# Installing initial PHP extensions
RUN docker-php-ext-install gd

RUN docker-php-ext-install mysqli pdo pdo_mysql gd zip

# Installing curl extension
RUN apt-get install -y libcurl4-openssl-dev

RUN docker-php-ext-install curl

# Installing xml extension
RUN apt-get install -y libxml2-dev

RUN docker-php-ext-install xml




## Installing xdebug extension
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Extensiones presentes:
# root@4ebc99e84da5:/var/www/html# php -m
# [PHP Modules]
  #Core
  #ctype
  #curl
  #date
  #dom
  #fileinfo
  #filter
  #ftp
  #gd
  #hash
  #iconv
  #json
  #libxml
  #mbstring
  #mysqli
  #mysqlnd
  #openssl
  #pcre
  #PDO
  #pdo_mysql
  #pdo_sqlite
  #Phar
  #posix
  #readline
  #Reflection
  #session
  #SimpleXML
  #sodium
  #SPL
  #sqlite3
  #standard
  #tokenizer
  #xdebug
  #xml
  #xmlreader
  #xmlwriter
  #zip
  #zlib
  #
  #[Zend Modules]
  #Xdebug


RUN docker-php-ext-install intl

RUN docker-php-ext-install soap

RUN docker-php-ext-install exif

RUN docker-php-ext-install opcache

RUN chmod 777 /var/www


# instalando composer
# Descargar e instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# poner un php.ini de desarrollo
# RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
# poner un php.ini de producción
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
