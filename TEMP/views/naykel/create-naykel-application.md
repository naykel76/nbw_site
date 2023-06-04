
# Naykel Laravel Application

<!-- TOC -->

- [Introduction](#introduction)
- [Install Gotime Package](#install-gotime-package)
- [Install Authit Package](#install-authit-package)
    - [Publish Optional Assets](#publish-optional-assets)
    - [Add the Admin Routes](#add-the-admin-routes)
- [Install Contactit Package](#install-contactit-package)
    - [Publish Optional Assets](#publish-optional-assets)
- [Install Devit Package](#install-devit-package)
- [Package Quick Reference](#package-quick-reference)
    - [Livewire](#livewire)

<!-- /TOC -->


IMPORTANT TO DEAL WITH

- need to add admin.user-account page or copy on install
- Call to undefined method App\Models\User::avatarUrl() on account when no avatar set up in model. (add exists check)

<a id="markdown-introduction" name="introduction"></a>

## Introduction

This is a quick reference guide to create and configure a new NayKel Laravel Applications, for details information refer to the relevant package documentation.


```php
composer create-project --prefer-dist laravel/laravel my_project
composer require barryvdh/laravel-debugbar --dev
```

<a id="markdown-install-gotime-package" name="install-gotime-package"></a>

## Install Gotime Package

```php
composer require naykel/gotime
php artisan gotime:install
npm install && npm run dev
```

Publish Optional Assets
```php
php artisan vendor:publish --tag=gotime-config
php artisan vendor:publish --tag=gotime-views
```

---

<a id="markdown-install-authit-package" name="install-authit-package"></a>

## Install Authit Package

```php
composer require naykel/authit
```

Next, run the  `authit:install` command to copy over necessary and perform necessary updates including:

```php
php artisan authit:install
```

**NOTE:** The `authit:install` command <ins>does not</ins> add the `avatarUrl` method to the user model. <br> [Click here for more information.](http://naykel.site/docs/authit/installation#user-avatar)

<a id="markdown-publish-optional-assets" name="publish-optional-assets"></a>

### Publish Optional Assets

```bash
# publish all
php artisan vendor:publish --provider="Naykel\Authit\AuthitServiceProvider"
php artisan vendor:publish --tag=authit-views   # views only
php artisan vendor:publish --tag=authit-seeders # seeders only
```

```bash
# seed default package permissions (super, admin)
$this->call(\Naykel\Authit\Database\Seeders\RolesPermissionsSeeder::class);
# optionally seed user
$this->call(\Naykel\Authit\Database\Seeders\UsersSeeder::class);
```

<a id="markdown-add-the-admin-routes" name="add-the-admin-routes"></a>

### Add the Admin Routes

```php
Route::middleware(['role:super|admin', 'auth'])->prefix('admin')->name('admin')->group(function () {
    Route::view('/', 'gotime::admin.dashboard'); // admin dashboard
    Route::view('/account', 'admin.user-account')->name('.account'); // livewire component
});
```

<a id="markdown-install-contactit-package" name="install-contactit-package"></a>

## Install Contactit Package

```php
composer require naykel/contactit
```

<a id="markdown-publish-optional-assets" name="publish-optional-assets"></a>

### Publish Optional Assets

```php
php artisan vendor:publish --tag=contactit-views
```

<a id="markdown-install-devit-package" name="install-devit-package"></a>

## Install Devit Package

```bash
composer require naykel/devit --dev
```

<a id="markdown-package-quick-reference" name="package-quick-reference"></a>

## Package Quick Reference

<a id="markdown-livewire" name="livewire"></a>

### Livewire

```php
// Publishing The Config File
php artisan livewire:publish --config
// Publishing Frontend JS Assets
php artisan livewire:publish --assets

```

'layout' => 'layouts.app',




