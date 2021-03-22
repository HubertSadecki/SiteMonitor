FROM php:7.4-fpm

RUN cp /usr/share/zoneinfo/Europe/Warsaw /etc/localtime
RUN echo "Europe/Rome" > /etc/timezone

RUN apt-get update > /dev/null
RUN apt-get install supervisor cron zip unzip -y
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN pecl install redis
RUN docker-php-ext-enable redis

# INSTALL COMPOSER
ENV COMPOSER_HOME=/tmp
RUN curl -s https://getcomposer.org/installer | php > /dev/null
RUN mv composer.phar /usr/local/bin/composer

# PHP CONFIG
COPY zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY conf.d/* /usr/local/etc/php/conf.d/
RUN ln -s /usr/local/bin/php /usr/bin/php

## SETUP CRON
COPY crontab /etc/cron.d/crontab
RUN crontab -u root /etc/cron.d/crontab

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]
