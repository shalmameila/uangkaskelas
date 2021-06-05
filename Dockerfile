FROM php:apache
COPY cobakas /var/www/html/cobakas
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
RUN a2enmod rewrite
RUN chmod -R 777 /var/www/html/cobakas