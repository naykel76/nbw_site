# Implementing Contracts for Cleaner Code

implementing contracts for cleaner code

- [1. Define the Contract (Interface)](#1-define-the-contract-interface)
- [2. Create Service Class (Concrete Implementation)](#2-create-service-class-concrete-implementation)
- [3. Bind the Contract to the Concrete Implementation](#3-bind-the-contract-to-the-concrete-implementation)
- [Use the interface in your controller](#use-the-interface-in-your-controller)
  - [Inject the interface directly into the controller's constructor](#inject-the-interface-directly-into-the-controllers-constructor)
  - [Use a facade to access the underlying implementation](#use-a-facade-to-access-the-underlying-implementation)
  - [Create a helper function to access the underlying implementation](#create-a-helper-function-to-access-the-underlying-implementation)

## 1. Define the Contract (Interface)

First, define the contract by creating an interface that defines the methods that a class must
implement. This interface will serve as a blueprint for the class that will provide the
functionality.

```php +code
// app/Contracts/CartInterface.php
namespace App\Contracts;

interface CartInterface {
    public function add(int $id, int $qty): void;
    public function remove(int $id): void;
    public function clear(): void;
}
```

```html +parse
<x-alert type="info">
By defining an interface, you can ensure that any class implementing it adheres to a specific
contract, promoting consistency and modularity in your codebase.
</x-alert>
```

## 2. Create Service Class (Concrete Implementation)

Next, create a concrete class that implements the contract interface. This class will provide the
actual implementation for the methods declared in the contract. Place these classes in an
appropriate directory, such as `app/Services`.

```php +code
// app/Services/CartService.php
namespace App\Services;

use App\Contracts\CartInterface;

class CartService implements CartInterface
{
    public function add(int $id, int $qty): void
    {
        // Implementation to add an item to the cart
    }

    public function remove(int $id): void
    {
        // Implementation to remove an item from the cart
    }

    public function clear(): void
    {
        // Implementation to clear the cart
    }
}
```

## 3. Bind the Contract to the Concrete Implementation

To use a contract, you need to bind it to a specific concrete class in the Laravel service
container. This tells Laravel which class to use when resolving the interface.

You can do this in the `AppServiceProvider`. Open `AppServiceProvider.php` and add the binding in
the `register` method.

```html +parse
<x-alert type="info">
Laravel's service container allows you to bind an interface to a given implementation. For example,
you can bind the <code>CartInterface</code> to the <code>CartService</code> class, enabling you to
use the interface in your controller without worrying about the underlying implementation.
<a href="https://laravel.com/docs/11.x/container#binding-interfaces-to-implementations"
target="blank">Laravel Docs</a>
</x-alert>
```

```php +code
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CartInterface;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider {
    public function register() {
        // Bind the interface as a singleton to the service
        $this->app->bind(CartInterface::class, CartService::class);
    }
}
```

In this example, we bind the `CartInterface` to the `CartService` class using the `singleton` method.
This means that Laravel will only create a single instance of the `CartService` class and share it
across the application whenever the `CartInterface` is requested.

```html +parse
<x-alert type="info">
By registering the `CartService` as a singleton, means that all parts of your application will share the same cart instance.
</x-alert>
```

The interface is now bound to the concrete implementation, and you can use the interface in your code
without worrying about the underlying implementation. 

## Use the interface in your controller

Now, you can use the contract in your controllers, services, or other parts of your application.
Laravel’s dependency injection container will automatically resolve the appropriate concrete class
when you type-hint the contract interface:


There are several ways to use the interface in your controller.

### Inject the interface directly into the controller's constructor

```php +code
// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Contracts\CartInterface;

class CartController extends Controller {

    public function __construct(protected CartInterface $cart) { }

    public function add(int $id, int $qty) {
        $this->cart->add($id, $qty);
    }

    public function remove(int $id) {
        $this->cart->remove($id);
    }

    public function clearCart() {
        $this->cart->clear();
    }
}
```

In this example, the `CartController` class injects the `CartInterface` into its constructor. Laravel
will automatically resolve the interface and provide an instance of the `CartService` class, which
implements the interface.

### Use a facade to access the underlying implementation

Creating a facade is another way to make the singleton instance of `CartService` globally accessible.
This approach can be useful when you need to access the cart functionality from anywhere in your
application without having to inject the interface manually.

```php +code
// app/Facades/CartFacade.php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CartFacade extends Facade {
    protected static function getFacadeAccessor() {
        return 'cart';
    }
}
```

```php +code
// app/Providers/AppServiceProvider.php
namespace App\Providers;

use App\Contracts\CartInterface;
use App\Services\CartService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('cart', function ($app) {
            return $app->make(CartService::class);
        });
    }
}
```


### Create a helper function to access the underlying implementation

Creating a helper function instead of a facade is another way to make the singleton instance of
`CartService` globally accessible. This approach can be simpler and more straightforward for some
use cases.

```php +code
// app\Helpers\CartHelper.php
namespace App\Helpers;

use App\Contracts\CartInterface;
use Illuminate\Support\Facades\App;

function cart(): CartInterface {
    // Resolve the CartInterface from the service container
    return App::make(CartInterface::class);
}
```