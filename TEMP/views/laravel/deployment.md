# Laravel cPanel with SSH Deployment

<!-- MarkdownTOC -->

- [Before Deploying to Live Server](#before-deploying-to-live-server)
    - [Build Production and Update, and Push Repository](#build-production-and-update-and-push-repository)
- [Installation](#installation)
- [Create and Configure Environment File](#create-and-configure-environment-file)
    - [Copy Files and Update Permissions](#copy-files-and-update-permissions)
- [Create the Symlink](#create-the-symlink)
- [Clean up and Optimize](#clean-up-and-optimize)
        - [Trouble Shooting](#trouble-shooting)
- [Trouble Shooting](#trouble-shooting-1)
        - [Error: Vite manifest not found at:](#error-vite-manifest-not-found-at)

<!-- /MarkdownTOC -->

https://laravel.com/docs/8.x/deployment

<a id="before-deploying-to-live-server"></a>
## Before Deploying to Live Server

These steps appear in the process order.

<a id="build-production-and-update-and-push-repository"></a>
### Build Production and Update, and Push Repository

    npm run production

<a id="installation"></a>
## Installation

```bash
# Clone Repo
git clone git@github.com:naykel76/nk_lms.git nk_lms
# Composer Install and Optimize Autoloader
composer install --optimize-autoloader --no-dev
```

<a id="create-and-configure-environment-file"></a>
## Create and Configure Environment File

```bash
# Copy the `.env.example` file to `.env`
cp .env.example .env
# Generate the application key
php artisan key:generate
```


<a id="copy-files-and-update-permissions"></a>
### Copy Files and Update Permissions

```bash
# copy public files
cp -a public/. ~/public_html/
# update permissions
chmod 755 ~/public_html
chmod 644 ~/public_html/index.php
chmod -R 775 storage
```

In the `public/index.php` file, update the auto loader and bootstrap path to

```bash
require __DIR__ . '/../your_site/vendor/autoload.php;
$app = require_once __DIR__ . '/../your_site/bootstrap/app.php';
```

<a id="create-the-symlink"></a>
## Create the Symlink

Create the symlink with laravel `php artisan storage:link` then move to public_html folder


<a id="clean-up-and-optimize"></a>
## Clean up and Optimize

    composer install --optimize-autoloader --no-dev
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache




<a id="trouble-shooting"></a>
#### Trouble Shooting



https://github.com/spatie/laravel-permission/issues/1689

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);
    }
}

```

## Trouble Shooting

If something is not correct when deployed make sure the .env file has the correct naykel keys, especially the layout!


#### Error: Vite manifest not found at:

As this error states the `manifest.json` is missing. On a new install this is likely caused because the build folder is included in the `.gitignore` file. To fix you can install npm and run `npm run build` or remove `/public/build` from the `.gitignore` file.
