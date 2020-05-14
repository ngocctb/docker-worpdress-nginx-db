FROM php:7.3-fpm

ENV TZ UTC
ENV COMPOSER_ALLOW_SUPERUSER 1

# install Lib for composer
RUN apt-get update -qq && \
    apt-get install --no-install-recommends -y libpq-dev git zip unzip vim nano iputils-ping postgresql-client sendmail && \
    apt-get clean && \
    apt-get install -y cron && \
    rm -rf /var/cache/apt

RUN apt-get update && apt-get install -y \
    libwebp-dev \
    libpng-dev \
    libxpm-dev \
    libfreetype6-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    libarmadillo-dev \
    libhdf4-alt-dev \
    libhdf5-dev \
    libjpeg-dev \
    libmlpack-dev \
    libnetcdf-dev \
    libtiff5-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-webp-dir=/usr/include/ --with-xpm-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# RUN docker-php-ext-install mbstring pdo pdo_pgsql

RUN docker-php-ext-install mysqli

RUN docker-php-ext-install zip

RUN php -v

# install redis
RUN pecl install -o -f redis \ 
    && rm -rf /tmp/pear \ 
    && docker-php-ext-enable redis

# RUN docker-php-ext-install gd

# php.conf php-fpm.conf
# COPY docker/app/conf/php/php.ini /usr/local/etc/php/php.ini
# COPY docker/app/conf/php/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# install Nodejs
RUN apt-get install -y nodejs npm

RUN node -v

# install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

RUN composer -v

COPY . /var/www/wordpress
COPY conf/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/wordpress

# RUN /usr/local/bin/composer install

# change owner
RUN chown www-data:www-data -R ./
