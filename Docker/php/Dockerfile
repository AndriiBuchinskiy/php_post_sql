FROM php:8.0-fpm-buster
LABEL maintainer="palmo<palmo@palmo-HP-Laptop-15s-eq1xxx>"
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  docker-php-ext-install pdo pdo_mysql  && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org && \
docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY ./php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./php/php.ini /usr/local/etc/php/php.ini

WORKDIR /work/backend
