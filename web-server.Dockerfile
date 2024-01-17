FROM php:8.3.1-apache
COPY / /var/www/html
# RUN apt-get update && apt-get install -y vim
ENV APACHE_DOCUMENT_ROOT /var/www/html/web
ENV API_ROOT /var/www/html/api/index.php
ENV MYSQL_HOST mysql
ENV MYSQL_USER root
ENV MYSQL_PASSWORD secret
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf 
RUN sed -i '1s/^/AliasMatch ^\/api\/(.*)$ ${API_ROOT} \n\ 
        <Directory "\/var\/www\/html\/api\/"> \n\
                Options FollowSymlinks \n\
                AllowOverride None \n\
                Require all granted \n\
        <\/Directory>\n/' /etc/apache2/mods-available/alias.conf