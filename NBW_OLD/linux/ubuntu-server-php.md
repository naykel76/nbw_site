# Ubuntu PHP Setup

- [PHP and Required Extensions](#php-and-required-extensions)
    - [Node, Git and npm](#node-git-and-npm)
    - [Composer](#composer)
        - [Remove Composer](#remove-composer)
- [How to Uninstall PHP on Ubuntu](#how-to-uninstall-php-on-ubuntu)

<!-- sudo apt install -y software-properties-common ca-certificates lsb-release apt-transport-https
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.4 php8.4-cli php8.4-dev php8.4-bcmath php8.4-bz2 php8.4-curl \
    php8.4-gd php8.4-intl php8.4-mbstring php8.4-mysql php8.4-opcache php8.4-readline \
    php8.4-soap php8.4-sqlite3 php8.4-xml php8.4-zip php8.4-ldap php8.4-msgpack \
    php8.4-igbinary php8.4-redis php8.4-memcached php8.4-pcov php8.4-imagick php8.4-xdebug \
    unzip curl git sqlite3 supervisor -->


## PHP and Required Extensions

`sudo apt install php` will install the latest stable version of PHP available in the default repositories for your distribution.

```bash
sudo apt-get install curl php php-cli php-mbstring unzip
```

If you want to install a specific version of PHP, add `ondrej/php` PPA which provides different PHP versions for Ubuntu, then you can specify the version number after the "php" package name, for example `sudo apt install php7.4`

<!-- 2. If you are using apache2, you are advised to add ppa:ondrej/apache2 -->
<!-- 3. If you are using nginx, you are advised to add ppa:ondrej/nginx-mainline or ppa:ondrej/nginx -->

```bash
# add the `ondrej/php` repo
sudo add-apt-repository ppa:ondrej/php
sudo apt-get install php8.2 php8.2-cli php8.2-common php8.2-imap php8.2-redis php8.2-snmp php8.2-xml php8.2-zip php8.2-mbstring php8.2-curl php8.2-mysql
```

### Node, Git and npm

```bash
sudo apt install nodejs npm git
```

### Composer

```bash
# Go to your home directory, then retrieve the installer using curl:
cd ~
# download composer
curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
# Verify the hash of the downloaded PHP composer script with the signatures at the official page:
HASH=`curl -sS https://composer.github.io/installer.sig`
# validate if the PHP Composer installer can be safely executed or not:
php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
# Run the installer script
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

#### Remove Composer

```bash
sudo apt-get remove composer
# If you want to remove any configuration files associated with Composer
sudo apt-get purge composer
# Finally, you can remove any remaining dependencies that were installed along with Composer
sudo apt-get autoremove
```

If you do have Composer installed, but the `sudo apt-get remove composer` command doesn't work, you can try removing Composer by running the following command:

```bash
sudo rm -rf /usr/local/bin/composer
```

## How to Uninstall PHP on Ubuntu

To uninstall PHP from Ubuntu, follow the instructions below:

1. Run the following command in the terminal:

    sudo apt-get purge php<version>

For example, if you installed the PHP 7.4 FPM version, run:

    sudo apt-get purge php7.4-fpm

2. Remove the orphaned packages with:

    sudo apt-get autoremove

3. Lastly, check the PHP version to confirm the uninstall worked:

    php -v

