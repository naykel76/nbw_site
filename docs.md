# Cart 

## Cart Service

The `CartService` is responsible for managing cart items in the session. It uses the `CartInterface`
to define the necessary methods for cart item management. The `CartInterface` is bound to the
`CartService` as a singleton in the service provider.

The `cart` helper function will return an instance of the `CartService` class. You can use this
function to access the service methods.

## ProductItem (Laravel Component)

<!-- this is a laravel component for simplicity -->

The `ProductItem` component is responsible for displaying a single product in the product list, or
on a product detail page. It will display the product name, price, and an add to cart button. This
may vary slightly depending on the context.

The `ProductItem` component will receive a `product` prop that contains the product data. This data will
be used to display the product information and pass the product to the `AddToCartButton` component.

## Add to Cart Button (Livewire Component)

The `AddToCartButton` is a Livewire component that is displayed on any page or component where there
is a need to add a product to the cart. 

When the button is clicked, it will call the `addToCart` method, passing the `product` as an
argument. The `addToCart` method uses the `cart` helper function to call the `add` method, which
adds the product to the cart in the session.

When the button is clicked, if the `cart` array does not exist in the session, a new cart will be
created and the product will be added to it.

(TBC) If the product is already in the cart, it will increment the quantity by 1.

## Cart (Livewire Component)

The `Cart` component is responsible for displaying the cart items in the session. It will display
the total number of items in the cart, the total price of the cart, and a checkout button.

If the cart is empty, it will display a message saying the cart is empty.

The `Cart` component will have:

*  a `clear` method that will remove the cart and all items from the session.
*  a `remove` method that will remove a specific item from the cart.
*  a `total` method that will calculate the total price of the cart.
*  a `count` method that will calculate the total number of items in the cart.
*  a `checkout` method that will redirect the user to the checkout page.

The cart component will update the cart items when the `updatedCart` event is dispatched.

All prices will be fetched from the `products` table in the database each time the cart is updated.
This is to ensure that the prices are up-to-date.

### Cart Data Structure

The cart data structure is an array that contains the cart items, the total price of the cart, and
the total number of items in the cart.

The price and total are stored as floats, and will be converted to an integer before persisting to

```php
[
    'items' => [
        '5' => [
            'name' => 'Product 1',
            'price' => 10.00,
            'quantity' => 1,
        ],
        '9' => [
            'name' => 'Product 2',
            'price' => 20.00,
            'quantity' => 2,
        ],
    ]
    'total' => 50.00,
    'count' => 3,
]
```


## Events

When a product is added, removed, or cleared from the cart, the `updatedCart` event is dispatched.
The `cart` component listens for this event and will rehydrate the `cart` component data
accordingly.


