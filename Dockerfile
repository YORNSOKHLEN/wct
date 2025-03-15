FROM php:8.3-rc-fpm-alpine
COPY src /usr/src
WORKDIR /usr/src
CMD ["/bin/sh"]
