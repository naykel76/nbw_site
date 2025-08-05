This is a check list to set up XAMPP for Laravel development with virtual hosts.

## Update HTDocs Path - `C:\xampp\apache\conf\httpd.conf`

find, `C:/xampp/htdocs` and replace with `C:\Users\natha\sites`

## Add a Virtual Hosts `C:\xampp\apache\conf\extra\httpd-vhosts.conf`

<VirtualHost *:80>
	DocumentRoot "C:\Users\natha\sites\nbw_site\public"
	ServerName nbw.site
</VirtualHost>

<VirtualHost *:80>
	DocumentRoot "C:\Users\natha\sites\fol_site\public"
	ServerName fol.site
</VirtualHost>

<VirtualHost *:80>
	DocumentRoot "C:\Users\natha\sites\zcc_site\public"
	ServerName zcc.site
</VirtualHost>

## PHP Configuration `C:\xampp\php\php.ini`

```bash +torchlight-bash
# Enable PHP Extensions
extension=intl
extension=sqlite3
```

```bash +torchlight-bash
# Increase upload limits
post_max_size=500M
upload_max_filesize=500M
```

## MySQL Configuration `C:\xampp\mysql\bin\my.ini`


```bash +torchlight-bash
# Increase max_allowed_packet
max_allowed_packet=48M
```


