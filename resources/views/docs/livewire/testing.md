# Livewire Testing

- [Livewire Assertions](#livewire-assertions)
- [Quick Reference](#quick-reference)
    - [`successfully renders the MyComponent component` (smoke test)](#successfully-renders-the-mycomponent-component-smoke-test)
    - [`renders the MyComponent component with data`](#renders-the-mycomponent-component-with-data)
- [Component Existence Tests](#component-existence-tests)
- [Trouble Shooting](#trouble-shooting)
    - [**`assertSeeLivewire()` Not Finding a Component**](#assertseelivewire-not-finding-a-component)
- [Additional Resources](#additional-resources)

## Livewire Assertions 

- `assertSeeLivewire()` verifies that the Livewire component is present on the page.
- `assertDontSeeLivewire()` verifies that the Livewire component is not present on the page.

## Quick Reference 

### `successfully renders the MyComponent component` (smoke test)

This is a smoke test to ensure that the component renders without errors. By itself, this
test does not provide much value. It only confirms that the component is present on the
page and did not break.

```php
it('successfully renders the MyComponent component', function () {
    Livewire::test(MyComponent::class)->assertOk();
});
```

### `renders the MyComponent component with data`

<!-- contains the AdminScheduledEventManager livewire component -->

## Component Existence Tests

```php
it('includes the shopping cart', function () {
    get(route('home'))
        ->assertSeeLivewire(ShoppingCart::class);
});
```



## Trouble Shooting

### **`assertSeeLivewire()` Not Finding a Component**  

If `assertSeeLivewire()` fails unexpectedly, the issue is likely due to an incorrect name,
often caused by a missing namespace, or missing layout in the event of a full-page
Livewire component.  

For example, if you have a Livewire component named `CreateProduct` in the `App\Livewire\Product` namespace;  

```php
namespace App\Livewire\Product;

class CreateProduct extends Component
```

The test should be:  

```php
assertSeeLivewire('product.create-product');

or

assertSeeLivewire(CreateProduct::class);
```

And, if it is a full-page Livewire component, the test will likely fail if the component
isn’t rendered as part of a layout or the page view. To resolve this, make sure the
default layout is available or define a layout in the component class. 

For example, use the `#[Layout]` attribute to specify the layout in the component class:

```php
#[Layout('components.layouts.app')]
public function render() {
    return view('livewire.product.admin-product-manager');
}
```

## Additional Resources

- <a href="https://laracasts.com/series/pest-driven-laravel/episodes/17"
  target="blank">https://laracasts.com/series/pest-driven-laravel/episodes/17</a>
