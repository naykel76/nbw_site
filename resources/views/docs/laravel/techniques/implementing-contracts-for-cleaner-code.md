# Implementing Contracts for Cleaner Code

implementing contracts for cleaner code

- [Define the Contract (Interface)](#define-the-contract-interface)
- [Create Service Class (Concrete Implementation)](#create-service-class-concrete-implementation)
- [Binding the Contract to the Concrete Implementation](#binding-the-contract-to-the-concrete-implementation)
- [Use the interface in your controller](#use-the-interface-in-your-controller)
- [Digging Deeper](#digging-deeper)
  - [Facade or Helper Function](#facade-or-helper-function)
- [Problem Solving](#problem-solving)

## Define the Contract (Interface)

First, define the contract by creating an interface that defines the methods that a class must
implement. This interface will serve as a blueprint for the class that will provide the
functionality.

```php
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

## Create Service Class (Concrete Implementation)

Next, create a concrete class that implements the contract interface. This class will provide the
actual implementation for the methods declared in the contract. Place these classes in an
appropriate directory, such as `app/Services`.

```php
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

## Binding the Contract to the Concrete Implementation

To use a contract, you need to bind it to a specific concrete class in the Laravel service
container. This tells Laravel which class to use when resolving the interface. 

This can be done in the `AppServiceProvider`. Open `AppServiceProvider.php` and add the
binding in the `register` method.

```html +parse
<x-alert type="info">
Laravel's service container allows you to bind an interface to a given implementation. For example,
you can bind the <code>CartInterface</code> to the <code>CartService</code> class, enabling you to
use the interface in your controller without worrying about the underlying implementation.
<a href="https://laravel.com/docs/11.x/container#binding-interfaces-to-implementations"
target="blank">Laravel Docs</a>
</x-alert>
```

```php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CartInterface;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton(CartInterface::class, CartService::class);
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

## Use the interface in your controller

Now, you can use the contract in your controllers, services, or other parts of your application.
Laravel’s dependency injection container will automatically resolve the appropriate concrete class
when you type-hint the contract interface:

```php
namespace App\Http\Controllers;

use App\Contracts\CartInterface;

class CartController extends Controller {

    public function __construct(protected CartInterface $cart)
    {
        $this->cart = $cart;
    }

    public function addItemToCart(int $id, int $qty) {
        $this->cart->add($id, $qty);
    }

    public function removeItemFromCart(int $id) {
        $this->cart->remove($id);
    }

    public function clearCart() {
        $this->cart->clear();
    }
}
```

## Digging Deeper

### Facade or Helper Function

When using interfaces in Laravel, you can leverage Laravel's facade system or create helper
functions to access the underlying implementation without directly injecting the interface. This
allows you to access the cart functionality from anywhere in your application without having to
inject the interface manually.

**Using a Facade:**

```php
// app\Facades\Cart.php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Cart extends Facade {
    protected static function getFacadeAccessor() {
        return 'App\Contracts\CartInterface';
    }
}
```

Creating a helper function instead of a facade is another way to make the singleton instance of
`CartService` globally accessible. This approach can be simpler and more straightforward for some
use cases.

```php
// app\Helpers\CartHelper.php
namespace App\Helpers;

use App\Contracts\CartInterface;
use Illuminate\Support\Facades\App;

function cart(): CartInterface {
    return App::make(CartInterface::class);
}
```



## Problem Solving

Make sure you have implemented the `Interface` in the concrete class. 

Make sure you have implemented all the methods defined in the interface.