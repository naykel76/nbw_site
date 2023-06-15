# Xampp Cheat Sheet

<!-- TOC -->

- [Generate a self-signed certificate for testing purposes](#generate-a-self-signed-certificate-for-testing-purposes)
- [Change htdocs location](#change-htdocs-location)
- [How to Setup a Virtual Host](#how-to-setup-a-virtual-host)
- [SSL Configuration](#ssl-configuration)
        - [Configure `httpd-vhosts.conf`](#configure-httpd-vhostsconf)
        - [Make SSL Keys](#make-ssl-keys)
        - [Configure `httpd.conf`](#configure-httpdconf)

<!-- /TOC -->


<a id="markdown-generate-a-self-signed-certificate-for-testing-purposes" name="generate-a-self-signed-certificate-for-testing-purposes"></a>

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

<a id="markdown-change-htdocs-location" name="change-htdocs-location"></a>

## Change htdocs location


1. Go to `C:\xampp\apache\conf\httpd.conf`
2. Open `httpd.conf`
3. Find tag : `DocumentRoot "C:/xampp/htdocs"`
4. Edit tag to : `DocumentRoot "C:/xampp/htdocs/my/new/location"`
5. Now find tag and change it to `< Directory "C:/xampp/htdocs/my/new/location" >`
6. Restart Your Apache


<a id="markdown-how-to-setup-a-virtual-host" name="how-to-setup-a-virtual-host"></a>

## How to Setup a Virtual Host

https://www.youtube.com/watch?v=H3uRXvwXz1o&index=2&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-

A virtual host allows a URL to be typed directly into the address bar when developing locally instead of using `localhost` or `127.0.0.1`.

**DO NOT** use .dev because google does not like it!

**Step 1.** Edit `C:\xampp\apache\conf\extra\vhost.conf` to create virtual host entry to point to the public folder in the Laravel project location.

```
<VirtualHost *:80>
	DocumentRoot "C:\path\to\htdocs"
	ServerName localhost
</VirtualHost>

<VirtualHost *:80>
	DocumentRoot "C:\path\to\htdocs\SITEROOT\public"
	ServerName mysite.test
</VirtualHost>
```

**Step 2.** Edit `C:\Windows\System32\drivers\etc\hosts` **MUST open in notepad as administrator**

```
127.0.0.1 localhost
127.0.0.1 mysite.test
```

<a id="markdown-ssl-configuration" name="ssl-configuration"></a>

## SSL Configuration

https://stackoverflow.com/questions/64800565/how-to-create-valid-ssl-in-localhost-for-xampp

<a id="markdown-configure-httpd-vhostsconf" name="configure-httpd-vhostsconf"></a>

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
<a id="markdown-make-ssl-keys" name="make-ssl-keys"></a>

#### Make SSL Keys

<a id="markdown-configure-httpdconf" name="configure-httpdconf"></a>

#### Configure `httpd.conf`

```bash
# Virtual hosts
Include conf/extra/httpd-vhosts.conf
```
