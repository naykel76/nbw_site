
# Laravel Packages

<!-- MarkdownTOC -->

- [Loading Resources](#loading-resources)
- [Register Package Components](#register-package-components)
    - [Blade Component](#blade-component)
    - [Livewire Component](#livewire-component)
- [Seeding From Package](#seeding-from-package)
- [Livewire Trouble Shooting](#livewire-trouble-shooting)
    - [Error: Unable to find component](#error-unable-to-find-component)
- [How To's](#how-tos)
        - [How do I copy and rename a stub?](#how-do-i-copy-and-rename-a-stub)

<!-- /MarkdownTOC -->

<a id="loading-resources"></a>
## Loading Resources

```php
$this->loadRoutesFrom(__DIR__.'/routes/web.php');
$this->loadMigrationsFrom(__DIR__.'/database/migrations');
$this->loadViewsFrom(__DIR__.'/resources/views', 'package');
```


<a id="register-package-components"></a>
## Register Package Components

<a id="blade-component"></a>
### Blade Component

```php
namespace MyPackage;

use MyPackage\View\Components\Alert;

class MyPackageServiceProvider extends ServiceProvider{
    public function boot() {
        // 'my-package- is a prefix and can be left off
        Blade::component('my-package-alert', Alert::class);
    }
}
```
<a id="livewire-component"></a>
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



<a id="seeding-from-package"></a>
## Seeding From Package

```bash
# include seeder in project
$this->call(\Naykel\Payit\Database\Seeders\PaymentPlatformSeeder::class);
# seed from command line
php artisan db:seed --class=Naykel\\Payit\\Database\\Seeders\\PaymentPlatformSeeder
```





<a id="livewire-trouble-shooting"></a>
## Livewire Trouble Shooting


<a id="error-unable-to-find-component"></a>
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


## How To's

#### How do I copy and rename a stub?
