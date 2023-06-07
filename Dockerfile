FROM php:7.4-zts-alpine3.16

COPY www /var/www/

EXPOSE 8080
WORKDIR "/var/www"

CMD ["php", "-S", "0.0.0.0:8080"]
