FROM php:8.1-apache

# Instala dependencias necesarias (intl ahora sí)
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql intl

# Habilita mod_rewrite para que funcione CodeIgniter 4 correctamente
RUN a2enmod rewrite

# Cambia el DOCUMENT_ROOT a /var/www/html/public (requerido por CI4)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Establece directorio de trabajo
WORKDIR /var/www/html
