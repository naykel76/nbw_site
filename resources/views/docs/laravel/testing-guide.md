# All Things Testing

A list of all the things I like to test in my applications.


- [Testing Page Response (Status)](#testing-page-response-status)
- [Testing Page Response (Text)](#testing-page-response-text)
- [Livewire Testing](#livewire-testing)
  - [Component Existence](#component-existence)
  - [Property Existence](#property-existence)
- [Testing Actions](#testing-actions)
- [Page Content Tests](#page-content-tests)
- [Resource Tests](#resource-tests)
  - [Index Tests](#index-tests)
  - [Show Tests](#show-tests)
- [Model Response Tests](#model-response-tests)
- [Database Seeder Tests](#database-seeder-tests)
- [Livewire Component Tests](#livewire-component-tests)


1. Page response test
2. Includes necessary components

Only test if the livewire component is includes, not the content of the component.

## Testing Page Response (Status)

Makes sure a page responds with the correct HTTP status code, primarily a 200 response.

```php
it('gives back a successful response for home page', function () {
    $this->get('/')->assertOk();
});
```

```php
test('gives successful response for product details page', function () {
    $product = Product::factory()->create();
    $this->get(route('products.show', $product))->assertOk();
});
```

## Testing Page Response (Text)

In this test, in addition to checking the status code, we also check if the page contains a specific
text.

```php
it('only shows active products', function () {
    $activeProduct = Product::factory()->active()->create();
    $notActiveProduct = Product::factory()->create();

    $this->get(route('products.index'))
        ->assertOk()
        ->assertSeeText($activeProduct->title)
        ->assertDontSeeText($notActiveProduct->title);
});
```

Here we are not only checking to see if the products index page shows the title of the active
product, but also that it does not show the title of the inactive product. 




## Livewire Testing

<!-- https://laracasts.com/series/pest-driven-laravel/episodes/17 -->

### Component Existence

You can test if a Livewire component is present on a page using the `assertSeeLivewire` method.

You can test by using the component class name,

```php
it('shows the add to cart component', function () {
    $this->get(route('products.index'))
        ->assertSeeLivewire(AddToCartButton::class);
});
```

or by using the component tag name.

```php
it('shows the add to cart component', function () {
    $this->get(route('home'))
        ->assertSeeLivewire('cart.add-to-cart-button');
});
```

### Property Existence

You can also test if a Livewire component has a specific property.

```php
// it('shows the add to cart component', function () {
//     $this->get(route('home'))
//         ->assertLivewire('cart.add-to-cart-button')
//         ->assertSet('product', $product);
// });
```

## Testing Actions

```php
->call('addToCart', 487, 1) ????
->call('deletePost', $postId);                                 
```


https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application





---
---
---
---


## Page Content Tests

Only test if the livewire component is included on a page, test the features of the component in the
Livewire component tests.

* includes SOME component


## Resource Tests

### Index Tests

These tests are for the index page of the resource. 

* shows products overview (index)
* only shows active products
  
### Show Tests

* correctly shows product details
* includes add to cart button

## Model Response Tests

* only returns SOME RECORDS for SOME query scope

## Database Seeder Tests



## Livewire Component Tests

Livewire component tests are for testing the features of the component, they are not for testing the
content of the page.

* includes SOME component






