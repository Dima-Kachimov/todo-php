FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql

# Удаляем все включенные MPM
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load \
          /etc/apache2/mods-enabled/mpm_*.conf

# Включаем только prefork вручную
RUN ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load && \
    ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf

# Rewrite для .htaccess
RUN a2enmod rewrite

COPY . /var/www/html

# public как корень сайта
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Railway port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' /etc/apache2/sites-available/000-default.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 8080

CMD ["apache2-foreground"]