FROM php:8.0.2-cli-alpine

#ARG LIBRDKAFKA_VERSION=1.5.0
#ARG EXT_RDKAFKA_VERSION=5.0.0
ARG GITLAB_TOKEN

RUN apk --no-cache upgrade && \
    apk add --no-cache \
		icu-dev \
		zlib-dev \
		libzip-dev \
		libpng-dev  \
		libjpeg-turbo \
		freetype freetype-dev \
		libjpeg-turbo-dev \
		libwebp-dev \
		libxpm-dev \
		oniguruma-dev \
        git \
        openssh \
        vim \
        unzip \
        bash \
        composer \
        postgresql-dev \
        librdkafka-dev

# Extensions
## Add build utils

ENV BUILD_DEPS 'autoconf git gcc g++ make bash openssh libssl1.1 openssl-dev'
RUN apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS $BUILD_DEPS


## Common Exts
RUN pecl install -o -f redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl iconv bcmath mbstring pdo pdo_mysql mysqli opcache zip gd exif sockets pcntl

## utils

RUN apk --no-cache upgrade && \
    apk add --no-cache openssh bash nano curl

## XDebug

RUN mkdir -p /usr/src/php/ext/xdebug && curl -fsSL https://pecl.php.net/get/xdebug | tar xvz -C "/usr/src/php/ext/xdebug" --strip 1 && docker-php-ext-install xdebug
RUN docker-php-ext-enable xdebug

## Kafka

#RUN pecl channel-update pecl.php.net \
#    && pecl install rdkafka-$EXT_RDKAFKA_VERSION \
#    && docker-php-ext-enable rdkafka \
#    && rm -rf /librdkafka


## Remove build utils

RUN apk del .phpize-deps $BUILD_DEPS \
    && rm -rf /tmp/pear

# Content

WORKDIR /app
