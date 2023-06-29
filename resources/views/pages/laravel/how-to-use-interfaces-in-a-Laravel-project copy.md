# How To Use Interfaces In a Laravel Project

<!-- TOC -->

- [Define the interface](#define-the-interface)
- [Implement the interface](#implement-the-interface)
- [Binding the implementation](#binding-the-implementation)
- [Use the interface in your controller](#use-the-interface-in-your-controller)

<!-- /TOC -->

In this example, we'll explore how interfaces can be used to create a shopping cart. We'll
specifically focus on creating a `CartInterface` to handle cart functionalities.

<a id="markdown-define-the-interface" name="define-the-interface"></a>

## Define the interface

Start by creating an interface that outlines the methods that implementing classes should have.
```php
// app/Contracts/CartInterface.php

namespace App\Contracts;

interface CartInterface {
    public function addItem(int $id, int $qty): void;
    public function removeItem(int $id): void;
    public function updateQuantity(int $id, int $qty): void;
    public function getItems(): array;
    public function getTotal(): int;
}
```

<a id="markdown-implement-the-interface" name="implement-the-interface"></a>

## Implement the interface

Create a (service) class that implements the `CartInterface` and provides the necessary functionality. This
class will handle the operations related to the shopping cart.

```php
// app\Services\CartService.php

namespace App\Services;

use App\Contracts\CartInterface;

class CartService implements CartInterface
{
    public function addItem(int $id, int $qty): void
    {
        // Implementation to add an item to the cart
    }

    public function removeItem(int $id): void
    {
        // Implementation to remove an item from the cart
    }

    public function updateQuantity(int $id, int $qty): void
    {
        // Implementation to update the quantity of an item in the cart
    }

    public function getItems(): array
    {
        // Implementation to retrieve all items in the cart
    }

    public function getTotal(): int
    {
        // Implementation to calculate the total price of the items in the cart
    }
}

```

<a id="markdown-binding-the-implementation" name="binding-the-implementation"></a>

## Binding the implementation

In the `AppServiceProvider`, bind the `CartInterface` to the `CartService` implementation so that
Laravel knows which class to use when resolving the interface:

https://laravel.com/docs/10.x/container#binding-interfaces-to-implementations

```php
// app\Providers\AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CartInterface;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CartInterface::class, CartService::class);
    }
}
```

<a id="markdown-use-the-interface-in-your-controller" name="use-the-interface-in-your-controller"></a>

## Use the interface in your controller

To utilize the interface, inject it into the constructor of your controller using dependency
injection. This allows your controller or other classes to have access to the cart functionality.
For instance, you can create a `CartController` that makes use of the cart interface.

```php
// app\Http\Controllers\CartController.php

namespace App\Http\Controllers;

use App\Contracts\CartInterface;

class CartController extends Controller {

    public function __construct(protected CartInterface $cart)
    {
        $this->cart = $cart;
    }

    public function addItemToCart(int $id, int $qty): void
    {
        $this->cart->addItem($id, $qty);
        // Other logic
    }

    public function removeItemFromCart(int $id): void
    {
        $this->cart->removeItem($id);
        // Other logic
    }

    public function updateCartItemQuantity(int $id, int $qty): void
    {
        $this->cart->updateQuantity($id, $qty);
        // Other logic
    }

    public function getCartItems(): array
    {
        $items = $this->cart->getItems();
        // Other logic
        return $items;
    }

    public function getCartTotal(): float
    {
        $total = $this->cart->getTotal();
        // Other logic
        return $total;
    }
}
```
