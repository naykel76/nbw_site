# Livewire Testing

<!-- https://laracasts.com/series/pest-driven-laravel/episodes/17 -->

## Component Existence Tests

You can test if a Livewire component is present on a page using the `assertSeeLivewire` method.

You can test by using the component class name,

```php
it('includes the shopping cart', function () {
    $this->get(route('home'))
        ->assertSeeLivewire(ShoppingCart::class);
});
```

or by using the component tag name.

```php
it('includes the shopping cart', function () {
    $this->get(route('home'))
        ->assertSeeLivewire('cart.shopping-cart');
});
```

### Trouble Shooting

#### Smoke Test is Failing

The test is failing because even though the component is included on the page, it is not being
rendered because there are no courses to display.

The solution is to create a course before the test.

```php
it('shows the add to cart component', function () {
    Course::factory()->create(); // Create a course
    $this->get(route('courses.index'))
        ->assertSeeLivewire(AddToCartButton::class);
});
```
