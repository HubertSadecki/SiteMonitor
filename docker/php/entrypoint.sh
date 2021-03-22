#!/bin/sh
cron -f &
/usr/bin/supervisord &
php-fpm -R
