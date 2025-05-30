# Installation

<p class="lead">Payment management package for Naykel Laravel applications.</p>

- [Install the package](#install-the-package)
- [Finalising The Installation](#finalising-the-installation)
  - [Seed The Payment Platforms](#seed-the-payment-platforms)
  - [Configure Payment Platform Credentials (API Keys)](#configure-payment-platform-credentials-api-keys)
- [Publish the config files](#publish-the-config-files)
- [Publish the layouts (TBD)](#publish-the-layouts-tbd)
- [Routes](#routes)

## Install the package

To get started, install Payit using the Composer package manager:

```bash
composer require naykel/payit
```

<!-- there is currently no installer -->
<!-- 
Next, install Payit resources by executing the the `payit:install` command:

```bash
php artisan payit:install
``` 
-->

## Finalising The Installation

After installing Payit, you should migrate your database and seed the payment platforms:

```bash
php artisan migrate
```

### Seed The Payment Platforms

```bash
# add seeder to project
$this->call(\Naykel\Payit\Database\Seeders\PaymentPlatformSeeder::class);
# seed from command line
php artisan db:seed --class=Naykel\\Payit\\Database\\Seeders\\PaymentPlatformSeeder
```

### Configure Payment Platform Credentials (API Keys)

Add the platform credentials to your `.env` file.

```
PAYPAL_BASE_URI=https://api-m.sandbox.paypal.com
PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_CLIENT_SECRET=your_paypal_client_secret

STRIPE_BASE_URI=https://api.stripe.com
STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret
```

## Publish the config files

When the package is registered, config files are merged, but for users needing additional
configuration options, the `naykel.php` config file can be published using the artisan command
provided below:

    php artisan vendor:publish --tag=payit-config


## Publish the layouts (TBD)


<!-- Payit works out of the box without requiring you to publish layouts.  However, if you wish to
customise the default layouts, you can publish the layout files and partials.  -->

<!-- **Note:** you can revert to the default layouts anytime, simply by deleting any of the published files.

Publish only the main `app` layout and partials; 

    php artisan vendor:publish --tag=payit-app-layouts

Publish all layouts and partials:

    php artisan vendor:publish --tag=payit-all-layouts 


    <!-- 

 --> 

 ## Routes

| Verb   | URI                 | Route Name          |
| :----- | :------------------ | ------------------- |
| `GET`  | `payment/approval`  | `payment.approval`  |
| `GET`  | `payment/cancelled` | `payment.cancelled` |
| `GET`  | `payment/confirmed` | `payment.confirmed` |
| `POST` | `payment/pay`       | `payment.pay`       |