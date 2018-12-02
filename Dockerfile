FROM php:5.6-cli

RUN apt-get update
RUN apt-get install zlib1g-dev
RUN pecl install memcache
RUN echo 'extension=memcache.so' >> /usr/local/etc/php/php.ini
