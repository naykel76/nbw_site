# Web Server Setup

<!-- TOC -->

- [Apache](#apache)
    - [Install](#install)
    - [Configuration](#configuration)
    - [Verify Apache status](#verify-apache-status)
- [Create Virtual Host](#create-virtual-host)
- [Install SSL with Lets Encrypt](#install-ssl-with-lets-encrypt)
- [Configuration](#configuration-1)
- [Firewalls](#firewalls)
    - [UFW](#ufw)
- [Trouble shooting](#trouble-shooting)

<!-- /TOC -->

Important Paths

```bash +torchlight-bash
# Apache configuration files
/etc/apache2/
# Apache virtual host files
/etc/apache2/sites-available/
# Apache virtual host files
/etc/apache2/sites-enabled/
# Apache log files
/var/log/apache2/
```

<a id="markdown-apache" name="apache"></a>

## Apache

<a id="markdown-install" name="install"></a>

### Install

```bash +torchlight-bash
sudo apt update && apt upgrade -y
sudo apt install apache2
# Enable Apache
sudo systemctl enable apache2
sudo systemctl start apache2
```

<a id="markdown-configuration" name="configuration"></a>

### Configuration

```bash +torchlight-bash
# Go into the Apache directory where the configuration files are stored
cd /etc/apache2/
# Create a new virtual host file
sudo nano apache2.conf
```

```bash +torchlight-bash
# Open the Apache configuration file
sudo nano /etc/apache2/apache2.conf
```

<a id="markdown-verify-apache-status" name="verify-apache-status"></a>

### Verify Apache status

```bash +torchlight-bash
# Verify Apache status
sudo systemctl status apache2
# Restart Apache
systemctl restart apache2
# Verify Apache configuration
sudo apache2ctl configtest
```


<a id="markdown-create-virtual-host" name="create-virtual-host"></a>

## Create Virtual Host

```bash +torchlight-bash
# Go into the Apache directory where the configuration files are stored
cd /etc/apache2/sites-available/
# Create a new virtual host file
sudo nano your_site.com.conf
```

```bash +torchlight-bash
<VirtualHost *:80>
    ServerName your_site.com
    ServerAlias www.your_site.com
    ServerAdmin your_email@example.com
    DocumentRoot /var/www/your_site.com

    Options -Indexes

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


<VirtualHost *:443>
    ServerName your_site.com
    ServerAlias www.your_site.com
    ServerAdmin your_email@example.com

    SSLEngine on
    SSLCertificateFile /path/to/your/ssl/certificate.crt
    SSLCertificateKeyFile /path/to/your/ssl/privatekey.key
    SSLCertificateChainFile /path/to/your/ssl/chainfile.crt




Certificate Path: /etc/letsencrypt/live/uni.nathanwatts.xyz/fullchain.pem
Private Key Path: /etc/letsencrypt/live/uni.nathanwatts.xyz/privkey.pem

    ProxyPreserveHost On
    ProxyPass / http://localhost:8443/
    ProxyPassReverse / http://localhost:8443/
</VirtualHost>

```

**Enable the virtual host file**

```bash +torchlight-bash
sudo a2ensite your_site.com.conf
# restart Apache
sudo systemctl restart apache2
```

<a id="markdown-install-ssl-with-lets-encrypt" name="install-ssl-with-lets-encrypt"></a>

## Install SSL with Lets Encrypt

Enable Required Modules

```bash +torchlight-bash
sudo a2enmod ssl
sudo a2enmod proxy
sudo a2enmod proxy_http
```

```bash +torchlight-bash
# Install Certbot and the Apache plugin for Certbot
sudo apt-get install certbot python3-certbot-apache
# Obtain SSL certificate (bare minimum)
sudo certbot --apache -d uni.nathanwatts.xyz
sudo certbot --apache -d uni.nathanwatts.xyz
# Obtain SSL certificate with flags
sudo certbot --apache --agree-tos --redirect --email your_email@example.com -d your_site.com

# Certbot flags
--email your_email@example.com # Email used for registration and recovery contact
--agree-tos # Agree to terms of service
--redirect # Redirect all traffic to HTTPS
--hsts # Add the Strict-Transport-Security header to every HTTP response. Forcing browser to always use SSL for the domain. Defends against SSL/TLS Stripping
--staple-ocsp # Enables OCSP Stapling. A valid OCSP response is stapled to the certificate that the server offers during TLS. Improves speed and privacy
```

/var/log/letsencrypt/letsencrypt.log





**Verify SSL certificate**

```bash +torchlight-bash
# Verify SSL certificate
sudo certbot certificates
# Verify SSL certificate location
/etc/letsencrypt/live/
```



<a id="markdown-configuration" name="configuration"></a>

## Configuration


```bash +torchlight-bash
# List enabled sites
sudo a2query -s
# Disable the default configuration
sudo a2dissite 000-default.conf
# Enable the new configuration
sudo a2ensite uni-nathanwatts.xyz.conf
# Restart Apache
sudo systemctl restart apache2
```


<a id="markdown-firewalls" name="firewalls"></a>

## Firewalls

<a id="markdown-ufw" name="ufw"></a>

### UFW

```bash +torchlight-bash
# Check UFW status
sudo ufw status
# Allow Apache
sudo ufw allow 'Apache'
# Allow SSH
sudo ufw allow 'OpenSSH'
# Allow HTTPS
sudo ufw allow 'Apache Full'
# Allow HTTP
sudo ufw allow 'Apache Secure'
# Enable UFW
sudo ufw enable
# Check UFW status
sudo ufw status
```

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble shooting

**Error:** AH00112: Warning: DocumentRoot [/var/www/html/uni-nathanwatts.xyz] does not exist <br>
**Error:** AH00558: apache2: Could not reliably determine the server's fully qualified domain
name

**Solution:**  Verify which virtual host configuration files are currently enabled in Apache. Use
the a2ensite and a2dissite commands to enable or disable sites as needed.

