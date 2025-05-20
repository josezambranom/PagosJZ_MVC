FROM php:8.2-apache

# Instala extensiones de PHP necesarias
RUN docker-php-ext-install mysqli

# Instala dependencias necesarias para Composer y PHPMailer
RUN apt-get update && apt-get install -y \
    nano \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia todo el proyecto al contenedor
COPY . /var/www/html/

# Establece la carpeta pública como raíz
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Activa mod_rewrite de Apache
RUN a2enmod rewrite

# Establece permisos
RUN chown -R www-data:www-data /var/www/html

# Ejecuta Composer para instalar dependencias
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto
EXPOSE 80