# Installation

- [Install the package](#install-the-package)
- [Publish the config files](#publish-the-config-files)
- [Publish the layouts](#publish-the-layouts)

## Install the package

To get started, install Gotime using the Composer package manager:

    composer require naykel/gotime

Next, install Gotime resources by executing the the `gotime:install` command:

    php artisan gotime:install

## Publish the config files

When the package is registered, config files are merged, but for users needing additional
configuration options, the `naykel.php` config file can be published using the artisan command
provided below:

    php artisan vendor:publish --tag=gotime-config

## Publish the layouts

Gotime works out of the box without requiring you to publish layouts.  However, if you wish to
customize the default layouts, you can publish the layout files and partials. 

**Note:** you can revert to the default layouts anytime, simply by deleting any of the published files.

Publish only the main `app` layout and partials; 

    php artisan vendor:publish --tag=gotime-app-layouts

Publish all layouts and partials:

    php artisan vendor:publish --tag=gotime-all-layouts