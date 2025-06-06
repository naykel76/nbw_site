# Xampp Cheat Sheet

- [Configure XAMPP for Laravel Development](#configure-xampp-for-laravel-development)
    - [Change HTDOCS Location](#change-htdocs-location)
    - [Add a Virtual Host](#add-a-virtual-host)
    - [Enable extensions in php.ini](#enable-extensions-in-phpini)
    - [Increase `max_allowed_packet` in MySQL Configuration `C:\xampp\mysql\bin\my.ini`](#increase-max_allowed_packet-in-mysql-configuration-cxamppmysqlbinmyini)
- [Setting up HTTPS on XAMPP](#setting-up-https-on-xampp)
- [Generate a self-signed certificate for testing purposes](#generate-a-self-signed-certificate-for-testing-purposes)
- [How to Setup a Virtual Host](#how-to-setup-a-virtual-host)
- [SSL Configuration](#ssl-configuration)
        - [Configure `httpd-vhosts.conf`](#configure-httpd-vhostsconf)
        - [Make SSL Keys](#make-ssl-keys)
        - [Configure `httpd.conf`](#configure-httpdconf)



## Configure XAMPP for Laravel Development

### Change HTDOCS Location

Open `C:\xampp\apache\conf\httpd.conf` and edit the `DocumentRoot` and `Directory` paths:
   
```bash
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">
```

Change the paths to the new location of your htdocs folder. For example:

```bash
DocumentRoot "C:\Users\natha\sites"
<Directory "C:\Users\natha\sites">
```

2. Save and Restart Your Apache


### Add a Virtual Host

Open `C:\xampp\apache\conf\extra\httpd-vhosts.conf` and add a new virtual host entry:

```bash
<VirtualHost *:80>
	DocumentRoot "C:\Users\natha\sites\nbw_site\public"
	ServerName nbw.site
</VirtualHost>
```

### Enable extensions in php.ini

Find and uncomment:

```bash
extension=intl
extension=sqlite3
```

### Increase `max_allowed_packet` in MySQL Configuration `C:\xampp\mysql\bin\my.ini`

Note that there are two one around line 37 and another around line 163

```bash
max_allowed_packet=48M
```

<!-- ## Set up for Laravel

1. Increase the `post_max_size` and `upload_max_filesize` in the `php.ini` file to at least `100M`:
```bash

increase sql script sice -->

## Setting up HTTPS on XAMPP

1. Navigate to the Apache directory in your XAMPP installation:
```bash
cd /c/xampp/apache
```
2. Create a new directory to store your SSL keys with the `mkdir` command:
```bash
mkdir conf/ssl.crt
```
3. Use the `openssl` command to generate a new self-signed SSL certificate:
```
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout conf/ssl.key/server.key -out conf/ssl.crt/server.crt
```
You will be prompted to enter some information for the certificate. Enter whatever you like, or leave the fields blank.

4. Open the Apache `httpd.conf` configuration file in a text editor. You can find this file in the `/xampp/apache/conf` directory.
5. Uncomment the line that includes the SSL module:
```
LoadModule ssl_module modules/mod_ssl.so
```
6. Open the `httpd-ssl.conf` SSL configuration file in a text editor. You can find this file in the `/xampp/apache/conf/extra` directory.
7. Find the lines that set the paths to the SSL certificate and key, and update them to point to the files you created earlier:
```
SSLCertificateFile "conf/ssl.crt/server.crt"
SSLCertificateKeyFile "conf/ssl.key/server.key"
```

-
-
-
-
-
-
-
-
-
-
-
-
-
## Generate a self-signed certificate for testing purposes

**Requires OpenSSL ** which comes with git bash

    Step 1: Generating a CSR and Private Key.
    Step 2: Order and Configure the SSL Certificate.
    Step 3: Download the SSL Certificate files and move them to the XAMPP.
    Step 4: Add the site in Windows Hosts.
    Step 5: Edit the SSL Configuration file for Apache.

```bash
# generate the private key
openssl genpkey -algorithm RSA -out private.key
```

## How to Setup a Virtual Host

https://www.youtube.com/watch?v=H3uRXvwXz1o&index=2&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-

A virtual host allows a URL to be typed directly into the address bar when developing locally instead of using `localhost` or `127.0.0.1`.

**Step 1.** Edit `C:\xampp\apache\conf\extra\httpd-vhost.conf` to create virtual host entry to point to the public folder in the Laravel project location.

```
<VirtualHost *:80>
	DocumentRoot "C:\Users\nayke\sites\nbw_site\public"
	ServerName nbw.site
</VirtualHost>
```

**Step 2.** Edit `C:\Windows\System32\drivers\etc\hosts` **MUST open in notepad as administrator**

```

127.0.0.1 localhost
127.0.0.1 naykel.site
127.0.0.1 fol.site
127.0.0.1 nbw.site
127.0.0.1 zcc.site
```

## SSL Configuration

https://stackoverflow.com/questions/64800565/how-to-create-valid-ssl-in-localhost-for-xampp

#### Configure `httpd-vhosts.conf`

```bash
<VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs"
    ServerName site.test
    ServerAlias *.site.test
    SSLEngine on
    SSLCertificateFile "crt/site.test/server.crt"
    SSLCertificateKeyFile "crt/site.test/server.key"
</VirtualHost>
 ```

```bash
<VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
    SSLEngine on
    SSLCertificateFile "conf/ssl.crt/server.crt"
    SSLCertificateKeyFile "conf/ssl.key/server.key"
    <Directory "C:/xampp/htdocs/">
        Options All
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
 ```
#### Make SSL Keys

#### Configure `httpd.conf`

```bash
# Virtual hosts
Include conf/extra/httpd-vhosts.conf
```
