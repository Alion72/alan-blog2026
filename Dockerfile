FROM php:8.3-apache

RUN apt-get update \
  && apt-get install -y --no-install-recommends curl libcurl4-openssl-dev libonig-dev \
  && docker-php-ext-install curl mbstring \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

ENV STORAGE_PATH=/data

WORKDIR /var/www/html
COPY . /var/www/html

RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf \
  && printf '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' > /etc/apache2/conf-available/public.conf \
  && a2enconf public \
  && mkdir -p /data/logs \
  && chown -R www-data:www-data /data /var/www/html/storage

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
  CMD curl -fsS http://localhost/health.php || exit 1
