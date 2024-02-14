
# Laravel Packages

<!-- TOC -->

- [Configuration](#configuration)
    - [Publish Configuration](#publish-configuration)
    - [Merge Configuration](#merge-configuration)
- [Loading and Merging Resources](#loading-and-merging-resources)
- [Register Package Components](#register-package-components)
    - [Blade Component](#blade-component)
    - [Livewire Component](#livewire-component)
- [Seeding From Package](#seeding-from-package)
- [Livewire Trouble Shooting](#livewire-trouble-shooting)
    - [Error: Unable to find component](#error-unable-to-find-component)

<!-- /TOC -->


<a id="markdown-configuration" name="configuration"></a>

## Configuration

<a id="markdown-publish-configuration" name="publish-configuration"></a>

### Publish Configuration

```php
public function boot(): void
{
    $this->publishes([
        __DIR__.'/../config/naykel.php' => config_path('naykel.php'),
    ]);
}
```

<a id="markdown-merge-configuration" name="merge-configuration"></a>

### Merge Configuration

```php
public function register(): void
{
    $this->mergeConfigFrom( __DIR__ . '/config/naykel.php', 'naykel' );
}
```

<a id="markdown-loading-and-merging-resources" name="loading-and-merging-resources"></a>

## Loading and Merging Resources

Paths may vary depending on directory set up.

```php
public function boot(): void
{
    $this->mergeConfigFrom( __DIR__ . '/config/gotime.php', 'gotime' );
    $this->loadViewsFrom(__DIR__ . '/../resources/views', 'gotime');
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/routes.php');
}
```


<a id="markdown-register-package-components" name="register-package-components"></a>

## Register Package Components

<a id="markdown-blade-component" name="blade-component"></a>

### Blade Component

```php
namespace MyPackage;

use MyPackage\View\Components\Alert;

class MyPackageServiceProvider extends ServiceProvider{
    public function boot() {
        Blade::component('my-alert', Alert::class);
    }
}
```
<a id="markdown-livewire-component" name="livewire-component"></a>

### Livewire Component

Manually register components in the `boot` method of the package service provider using the `Livewire::component` method.

<div class="txt-red">Jet Stream registers in register method? Why?</div>

```php
use Livewire\Livewire;
use MyComponent\Http\Livewire\SomeComponent;

// livewire
public function boot() {
    Livewire::component('some-component', SomeComponent::class);
}

// jetstream
public function register(){
    $this->app->afterResolving(BladeCompiler::class, function () {
        Livewire::component('some-component', SomeComponent::class);
    });
}
```



<a id="markdown-seeding-from-package" name="seeding-from-package"></a>

## Seeding From Package

```bash
# include seeder in project
$this->call(\Naykel\naykel\Database\Seeders\PaymentPlatformSeeder::class);
# seed from command line
php artisan db:seed --class=Naykel\\naykel\\Database\\Seeders\\PaymentPlatformSeeder
```





<a id="markdown-livewire-trouble-shooting" name="livewire-trouble-shooting"></a>

## Livewire Trouble Shooting


<a id="markdown-error-unable-to-find-component" name="error-unable-to-find-component"></a>

### Error: Unable to find component

Make sure the component has been correctly added to the `boot` method of the `ServiceProvider`

```php
use Naykel\Pageit\Http\Livewire\PageTable;

$this->app->afterResolving(BladeCompiler::class, function () {
    Livewire::component('page-table', PageTable::class);
});
```

The component will not be found in the `boot` method when using `$this->app->afterResolving()`.

What is the difference???

```php
// This will work, but why?
public function register() {
    $this->app->afterResolving(BladeCompiler::class, function () {
        Livewire::component('page-table', PageTable::class);
        Livewire::component('page-edit-create', PageCreateEdit::class);
    });
}

// MUST NOT USE `$this->app->afterResolving()` in the boot method
public function boot() {
    Livewire::component('page-table', PageTable::class);
    Livewire::component('page-edit-create', PageCreateEdit::class);
}
```

