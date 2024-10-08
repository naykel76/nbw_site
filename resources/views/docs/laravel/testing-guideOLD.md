# All Things Testing

A list of all the things I like to test in my applications.


- [Test a Route or URL](#test-a-route-or-url)
  - [Test a route or url in a Livewire component](#test-a-route-or-url-in-a-livewire-component)
- [Testing Views](#testing-views)
- [Page Tests](#page-tests)
- [Page Response Tests (Status)](#page-response-tests-status)
- [Page Response Tests (Text)](#page-response-tests-text)
- [Page Response Tests (View)](#page-response-tests-view)
- [Testing Actions](#testing-actions)
- [Page Content Tests](#page-content-tests)
- [Resource Tests](#resource-tests)
  - [Index Tests](#index-tests)
  - [Show Tests](#show-tests)
- [Model Response Tests](#model-response-tests)
- [Database Seeder Tests](#database-seeder-tests)
- [Livewire Component Tests](#livewire-component-tests)
- [Additional Resources](#additional-resources)



## Test a Route or URL

```php
it('shows the home page', function () {
    $this->get(route('home'))->assertOk();
});
```

Test a Route or URL with a parameter

```php
it('has a link to the product details page', function () {
    $product = Product::factory()->create();
    $this->get(route('products.show', $product))->assertOk();
});
```

### Test a route or url in a Livewire component

```php
it('has a link to the checkout page', function () {
    Livewire::test(ShoppingCart::class)
        ->assertSee(route('checkout'));
});
```



---
---
---
---
---
---
---
---
---
---
---



## Testing Views

https://laravel.com/docs/11.x/http-tests#testing-views

Rendering Blade and Components


## Page Tests

This is a high-level test that checks if the courses page is working as expected. It checks if the
courses are displayed on the page and if the course-item component is rendered.

```php
it('shows courses overview (index)', function () {
    // Arrange
    $firstCourse = Course::factory()->published()->create();
    $secondCourse = Course::factory()->released()->create();

    // Act & Assert
    $this->get(route('courses.index'))
        ->assertOk()
        ->assertSeeText([
            $firstCourse->title, $firstCourse->price, $firstCourse->code,
            $secondCourse->title, $secondCourse->price, $secondCourse->code,
        ]);
});
```


---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---
---



1. Page response test
2. Includes necessary components
3. Route or URL exists
4. User is authenticated

```php
->assertSee(route('products.show', $product)); // assert that you see the route or url
```

<!-- assert that you see the route or url -->

Only test if the livewire component is includes, not the content of the component.

## Page Response Tests (Status)

Makes sure a page responds with the correct HTTP status code, primarily a 200 response.

```php
it('gives successful response for home page', function () {
    // Act & Assert
    $this->get(route('page.home'))->assertOk();
});
```

```php
test('gives successful response for product details page', function () {
    $product = Product::factory()->create();
    $this->get(route('products.show', $product))->assertOk();
});
```

## Page Response Tests (Text)

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

## Page Response Tests (View)

<a href="https://laravel.com/docs/master/http-tests#response-assertions" target="blank">Response Assertions Docs</a>

```php
it('returns correct view', function() {
    $this->get('/courses')
        ->assertOk()
        ->assertViewIs('courses.index')
        ->assertViewHas('courses');
});
```

```php 
it('shows the home page', function () {
    $this->get(route('home'))->assertViewIs('home');
});
```

```php

## Authenticated Page Tests

```php
it('shows the dashboard when authenticated', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('dashboard'))->assertOk();
});
```





## Testing Actions

```php
->call('addToCart', 487, 1) ????
->call('deletePost', $postId);                                 
```







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



## Additional Resources

- <a href="https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application" target="blank">https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application</a>
