# JABB of the Carolinas: PHP rebuild for LAMP

Plain PHP 8.1+ (no framework, no Composer), Apache 2.4, MariaDB/MySQL.
Content lives in `app/data.php`; templates are in `public/` and `app/`.

```
public/        <- Apache DocumentRoot (only this folder is web-visible)
app/           bootstrap, helpers, layout, content data, SVG partial
sql/schema.sql contact_messages table
config.sample.php  -> copy to config.php
```

## Install on Ubuntu/Debian

```bash
sudo apt update
sudo apt install apache2 mariadb-server php libapache2-mod-php php-mysql php-mbstring
sudo a2enmod rewrite headers expires

sudo mkdir -p /var/www/jabb && sudo cp -r . /var/www/jabb
sudo chown -R www-data:www-data /var/www/jabb
```

Database:

```bash
sudo mysql < /var/www/jabb/sql/schema.sql
sudo mysql -e "CREATE USER 'jabb'@'localhost' IDENTIFIED BY 'a-long-random-password';
               GRANT INSERT, SELECT ON jabb.contact_messages TO 'jabb'@'localhost';"
cp /var/www/jabb/config.sample.php /var/www/jabb/config.php   # then edit it
```

Virtual host (`/etc/apache2/sites-available/jabb.conf`):

```apache
<VirtualHost *:80>
    ServerName example.com
    DocumentRoot /var/www/jabb/public
    <Directory /var/www/jabb/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

```bash
sudo a2ensite jabb && sudo systemctl reload apache2
sudo apt install certbot python3-certbot-apache && sudo certbot --apache   # HTTPS
```

## Things to set before launch

- `config.php`: `site_url` (canonical/OG tags), DB credentials, `mail_from`.
- Contact form uses PHP `mail()`. The server needs an MTA (postfix or msmtp) and
  SPF/DKIM for the `mail_from` domain, or messages land in spam. Every message is also
  saved to `contact_messages`, so nothing is lost if mail fails.
- Logo: drop `logo.png` into `public/assets/img/`. Until then a text wordmark shows.
- Fonts load from Google Fonts. To self-host, download Bricolage Grotesque and Public
  Sans into `public/assets/` and replace the `<link>` in `app/layout.php`.
- Label/SDS/OMRI/trial PDFs link to JABB's current hosted files. Copy them into
  `public/docs/` and update `JABB_DOCS` links in `app/data.php` if you want to host them.

## Security notes

Prepared statements (PDO), output escaped with `e()`, CSRF token, honeypot, minimum
fill time, 3 messages/hour per session, header-injection stripping, DB user limited to
INSERT/SELECT, `Options -Indexes`, `config.php` outside the web root.

## Routes

`/`, `/about`, `/products`, `/products/{slug}`, `/crops`, `/faqs`, `/contact`.
Pretty URLs come from `public/.htaccess` (needs `mod_rewrite` and `AllowOverride All`).
