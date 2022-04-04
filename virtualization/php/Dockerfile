FROM php:8.0-fpm-alpine
ENV DOCKERIZE_VERSION v0.6.1

COPY ./start.sh /usr/local/startup.sh
RUN chown root:root /usr/local/startup.sh
RUN chmod 0777 /usr/local/startup.sh
COPY ./supervisord.conf /etc/supervisord.conf

RUN mkdir -p /etc/ssl/certs && \
    update-ca-certificates && \
    apk add --update \
    bash \
    curl-dev \
    freetds-dev \
    freetype-dev \
    gettext-dev \
    gmp-dev \
    icu-dev \
    jpeg-dev \
    openldap-dev \
    libzip-dev \
    apk-cron \
    supervisor


RUN docker-php-ext-configure gd && \
    docker-php-ext-configure ldap --with-libdir=lib/ && \
    docker-php-ext-configure pdo_dblib --with-libdir=lib/ && \
    docker-php-ext-configure curl --with-libdir=lib/ && \
    docker-php-ext-install \
    curl \
    exif \
    gd \
    gettext \
    gmp \
    intl \
    pdo_dblib \
    pdo_mysql \
    pcntl \
    zip

RUN php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" && \
    php /tmp/composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('/tmp/composer-setup.php');" && \
    docker-php-ext-enable exif

VOLUME /app
WORKDIR /app

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]