# Working with Facades and Helper Files

- [Facades](#facades)
  - [Creating a Custom Facade](#creating-a-custom-facade)
    - [Step 1: Create the underlying class](#step-1-create-the-underlying-class)
    - [Step 2: Register helper in AppServiceProvider](#step-2-register-helper-in-appserviceprovider)
    - [Step 3: Create a facade class](#step-3-create-a-facade-class)
    - [Step 4: Register facade in config/app.php](#step-4-register-facade-in-configappphp)
    - [Step 5: Using the facade](#step-5-using-the-facade)
- [Helper File](#helper-file)
  - [Creating a Helper File](#creating-a-helper-file)
    - [Step 1: Create a helper class](#step-1-create-a-helper-class)
    - [Step 2: Register helper in Composer autoload](#step-2-register-helper-in-composer-autoload)
    - [Step 3: Use the helper function in your code](#step-3-use-the-helper-function-in-your-code)
- [Quick Reference](#quick-reference)
- [Understanding Singleton Bindings in Laravel](#understanding-singleton-bindings-in-laravel)
- [Additional Resources](#additional-resources)

## Facades

Facades provide a static interface to classes that are available in the application's service
container. They allow you to access these classes without having to inject them into your classes
manually.

```html +torchlight-html +parse
<x-alert type="info">
In a Laravel application, a facade is a class that provides access to an object from the container.
</x-alert>
```

### Creating a Custom Facade

To create a facade in a Laravel project, you can create a new class that extends the `Facade` class
and define the `getFacadeAccessor` method to return the service container key of the class you want
to access.

#### Step 1: Create the underlying class

```php +code
namespace App\Helpers;

class StringHelpers {
    function toPath(string $input) {
        return str_replace('.', '/', ltrim($input, '/'));
    }
}
```

#### Step 2: Register helper in AppServiceProvider

```php +code
// app/Providers/AppServiceProvider.php
use App\Helpers\StringHelper;

public function register() {
    $this->app->bind('stringHelper', function() {
        return new StringHelpers();
    });
}
```

#### Step 3: Create a facade class

```php +code
// app/Facades/StringHelperFacade.php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class StringHelperFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'stringHelper';
    }
}
```

#### Step 4: Register facade in config/app.php

To register a facade in a Laravel project, you can add an entry to the `aliases` array in the
`config/app.php` configuration file. This entry should map the facade class to the facade name you
want to use in your application.

```php +code
'aliases' => [
    'StringHelper' => App\Facades\StringHelperFacade::class,
]
```

#### Step 5: Using the facade


Once you've created and registered a facade in your Laravel project, you can start using the facade
to access the underlying class.

```php +code
// app/Http/Controllers/ExampleController.php
use StringHelper;

class ExampleController extends Controller {
    public function index() {
        $path = StringHelper::toPath('app.Helpers.StringHelper');
        return view('example', ['path' => $path]);
    }
}
```

## Helper File

When working on a Laravel project, you may find yourself needing to create helper files to
encapsulate common functionality. Helper files can be used to group related functions together,
making them easier to manage and reuse throughout your application.

### Creating a Helper File

#### Step 1: Create a helper class

To create a helper file in a Laravel project, you can create a new PHP file in a directory of your
choice. It is a good practice to create a `Helpers` directory in the `app` directory to store your
helper files.

```php +code
// app/Helpers/StringHelper.php
function toPath(string $input) {
    return str_replace('.', '/', ltrim($input, '/'));
}
```

#### Step 2: Register helper in Composer autoload

To make the helper functions available throughout your application, you can register the helper file
in the `composer.json` file under the `autoload` section. This will ensure that the helper file is
loaded automatically when the application starts.

```json +torchlight-json
{
    "autoload": {
        "files": [
            "app/Helpers/StringHelper.php"
        ]
    }
}
```

After updating the `composer.json` file, you'll need to run the following command to regenerate the
Composer autoloader:

```bash +torchlight-bash
composer dump-autoload
```

#### Step 3: Use the helper function in your code

Once you've created and autoloaded a helper file in your Laravel project, you can start using the
helper functions in your application. Helper functions can be called from anywhere in your code,
making them a convenient way to encapsulate common functionality.

Here's an example of how you can use the `toPath` helper function in your Laravel application:

```php +code
class ExampleController extends Controller {
    public function index() {
        $path = toPath('app.Helpers.StringHelper');
        return view('example', ['path' => $path]);
    }
}
```

## Quick Reference

```php +code
// 1. The underlying class:
class StringHelpers {
    function toPath(string $input) { 
        // Implementation
    }
}

// 2. The facade class:
class StringFacade extends Facade {
	protected static function getFacadeAccessor(): string {
		return 'apples';
	}
}

// 3. Binding in the register method of AppServiceProvider:
$this->app->singleton('apples', function($app) {
	return $app->make(StringFacade::class);
});
```

## Understanding Singleton Bindings in Laravel

What is the difference in the following two ways of binding a class to the service container in
Laravel? 

```php +code
// Method 1 - Using the service container
$this->app->singleton('cart', function ($app) {
    return $app->make(CartService::class);
});

// Method 2 - Directly creating a new instance
$this->app->singleton('cart', function ($app) {
    return new CartService();
});
```

The first method uses the service container to resolve the `CartService` class, while the second
method directly creates a new instance of the `CartService` class. The first method is preferred
because it allows the service container to manage the dependencies of the `CartService` class and
resolve them automatically.

## Additional Resources

- [Laravel Facades Documentation](https://laravel.com/docs/11.x/facades)



