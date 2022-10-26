FROM php:8.1-apache
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_mysql intl zlib zip
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer
RUN apt update
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf
COPY ./user-management/ /var/www/
WORKDIR /var/www/
RUN cd /var/www/ && composer install && composer require --dev symfony/maker-bundle
RUN php bin/console doctrine:database:create --no-interaction
#RUN php bin/console doctrine:migrations:migrate --no-interaction
#ENTRYPOINT ["bash", "./docker/docker.sh"]
EXPOSE 80