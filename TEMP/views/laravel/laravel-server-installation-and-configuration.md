# Installation Cheatsheet

<!-- MarkdownTOC -->

- [Apache Web Server](#apache-web-server)
    - [Install, start and enable](#install-start-and-enable)
    - [Verify apache status](#verify-apache-status)
    - [Create Virtual Host File](#create-virtual-host-file)
- [PHP and Required Extensions](#php-and-required-extensions)
    - [Remove PHP](#remove-php)
- [Install Composer](#install-composer)
- [Install Laravel](#install-laravel)
    - [Set Permissions](#set-permissions)
- [Troubleshooting](#troubleshooting)
        - [Error: laravel: command not found](#error-laravel-command-not-found)
- [Table Plus](#table-plus)
- [Laravel Docker File](#laravel-docker-file)

<!-- /MarkdownTOC -->

sudo apt autoremove

<a id="apache-web-server"></a>
## Apache Web Server

<a id="install-start-and-enable"></a>
### Install, start and enable

```bash
# install apache2
sudo apt install apache2
# start and enable
sudo systemctl enable apache2 && sudo systemctl start apache2
```

<a id="verify-apache-status"></a>
### Verify apache status

```bash
# verify Apache status
sudo systemctl status apache2
# Restart web server
systemctl restart apache2
```

<a id="create-virtual-host-file"></a>
### Create Virtual Host File

###### Create new virtual host file
```bash
# Go into the Apache directory where the configuration files are stored
cd /etc/apache2/sites-available/
# create a configuration file for the Laravel application.
sudo nano laravel.conf
sudo nano /etc/apache2/sites-available/laravel.conf
# Paste the following lines of code, save the file and close it.
<VirtualHost *:80>
    ServerName test.site
    ServerAlias *.test.site
    DocumentRoot /var/www/html/example-app/public
    <Directory /var/www/html/example-app>
        AllowOverride All
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


```

###### Enable the new virtual host files
```bash
# Enable the Apache configuration for Laravel.
sudo a2ensite laravel.conf
# disable the default site defined in 000-default.conf:
sudo a2dissite 000-default.conf
# activate the new configuration
sudo systemctl restart apache2
# Check the syntax:
apachectl -t
```
###### Set up local hosts file (optional)
```bash
# edit your local file with administrative privileges by typing:
sudo nano /etc/hosts
# add ip
127.0.0.1   test.site
```



<a id="php-and-required-extensions"></a>
## PHP and Required Extensions

```bash
# update the system
sudo apt-get update -y && sudo apt-get upgrade -y
# install common packages
sudo apt-get install curl php php-cli php-mbstring sqlite3 git unzip git
# download and install latest nodejs
curl -sL https://deb.nodesource.com/setup_lts.x | sudo -E bash - && sudo apt-get install -y nodejs
# Install PHP8.2
sudo apt-get install php8.2 php8.2-cli php8.2-common php8.2-imap php8.2-redis php8.2-snmp php8.2-xml php8.2-zip php8.2-mbstring php8.2-curl
sudo apt-get install php8.2-mysql sudo apt-get install mysql-server php8.2-sqlite3
```

sudo apt-get install sqlite3

### Remove PHP

The following commands will remove PHP from Ubuntu:

```bash
sudo apt-get purge php7.0 // php7.* if we want to remove PHP version starts with 7
sudo apt-get autoclean
sudo apt-get autoremove
```




<a id="install-composer"></a>
## Install Composer

```bash
# Go to your home directory
cd ~
# download composer
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
# Verify the hash of the downloaded PHP composer script with the signatures at the official page
HASH=`curl -sS https://composer.github.io/installer.sig`
# validate if the PHP Composer installer can be safely executed or not
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
# Run the installer script
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

<a id="install-laravel"></a>
## Install Laravel

```bash
# Install Laravel using Composer:
composer create-project --prefer-dist laravel/laravel example-app
# Install Or, globally install the Laravel installer
composer global require laravel/installer
# Install from global installer
laravel new example-app
```

### Set Permissions
```bash

sudo chown -R www-data:www-data /var/www/example-app

sudo find /var/www/example-app -type d -exec chmod 755 {} \;
sudo find /var/www/example-app -type f -exec chmod 644 {} \;


sudo chgrp -R www-data /var/www/example-app/storage /var/www/example-app/bootstrap/cache
sudo chmod -R ug+rwx /var/www/example-app/storage /var/www/example-app/bootstrap/cache

# give the web server write permission to the "images" directory. (required for image optimizer??)
sudo chown -R www-data:www-data /var/www/example-app/public/images
sudo chmod -R 755 /var/www/example-app/public/images

```

<a id="troubleshooting"></a>
## Troubleshooting

<a id="error-laravel-command-not-found"></a>
#### Error: laravel: command not found

```bash
# Add path to .bashrc config
nano ~/.bashrc
# Add path, save and close
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
# refresh .bashrc
source ~/.bashrc
```

###### Error: The stream or file "/var/www/example-app/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission denied The exception occurred while attempting to log:

```bash
sudo chmod -R 755 storage
sudo chmod -R 755 bootstrap/cache
# This solves the problem but it is unsecure!!
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```

## Table Plus
```bash
# Add TablePlus gpg key
wget -qO - https://deb.tableplus.com/apt.tableplus.com.gpg.key | gpg --dearmor | sudo tee /etc/apt/trusted.gpg.d/tableplus-archive.gpg > /dev/null

# Add TablePlus repo
sudo add-apt-repository "deb [arch=amd64] https://deb.tableplus.com/debian/22 tableplus main"

# Install
sudo apt update
sudo apt install tableplus
```


















## Laravel Docker File

```bash
FROM ubuntu:22.04

LABEL maintainer="Taylor Otwell"

ARG WWWGROUP
ARG NODE_VERSION=18
ARG POSTGRES_VERSION=14

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 dnsutils \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.2-cli php8.2-dev \
       php8.2-pgsql php8.2-sqlite3 php8.2-gd php8.2-imagick \
       php8.2-curl \
       php8.2-imap php8.2-mysql php8.2-mbstring \
       php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
       php8.2-intl php8.2-readline \
       php8.2-ldap \
       php8.2-msgpack php8.2-igbinary php8.2-redis php8.2-swoole \
       php8.2-memcached php8.2-pcov php8.2-xdebug \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y mysql-client \
    && apt-get install -y postgresql-client-$POSTGRES_VERSION \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.2

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /etc/php/8.2/cli/conf.d/99-sail.ini
RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000

ENTRYPOINT ["start-container"]

```
