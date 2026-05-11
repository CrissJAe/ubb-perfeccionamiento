FROM php:8.3-apache

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    curl \
    gnupg2 \
    apt-transport-https \
    ca-certificates \
    unzip \
    git \
    unixodbc-dev \
    libzip-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensiones PHP mínimas
RUN docker-php-ext-install mbstring zip

# Driver ODBC de Microsoft
RUN curl -sSL https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor -o /usr/share/keyrings/microsoft-prod.gpg \
    && echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/debian/12/prod bookworm main" > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18 \
    && rm -rf /var/lib/apt/lists/*

# Extensiones SQL Server
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Apache
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY src/composer.json ./
RUN composer install --no-interaction --no-dev --optimize-autoloader

COPY src/ .

EXPOSE 80
CMD ["apache2-foreground"]