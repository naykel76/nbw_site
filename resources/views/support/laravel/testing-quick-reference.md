# Laravel Testing Quick Reference

- [Running Tests](#running-tests)
- [Route Methods](#route-methods)
- [Writing Tests](#writing-tests)
    - [Grouping Tests with `describe()`](#grouping-tests-with-describe)
- [Additional Resources](#additional-resources)


## Running Tests

<a href="https://pestphp.com/docs/cli-api-reference" target="blank">PEST CLI API Reference</a>

| Command                                | Alias          | Action                        |
| :------------------------------------- | :------------- | :---------------------------- |
| `php artisan test`                     | `pt`           | Run all tests                 |
| `php artisan test --compact`           | `pt --compact` | Run all tests in compact mode |
| `php artisan test --filter`            | `pt --filter`  | Run specific tests            |
| `php artisan test tests/Feature/Pages` |                | Run all tests in a folder     |

Additional options:

- `--bail` – Stop execution on first failure.
- `--todos` – Output a list of pending tests.
- `--retry` – Rerun failing tests first.
- `--exclude-testsuite <name>` – Exclude specific test suites.
- `--group <name>` – Run only tests from specified group.
- `--exclude-group <name>` – Exclude specific test groups.
- `--test-suffix <suffix>` – Run tests in files with specific suffixes.

That’s solid. Here's a slightly refined version for clarity and consistency:

---

## Route Methods

Use `get`, `post`, `put`, `patch`, and `delete` to test routes, matching the
HTTP verb defined in your `web.php`.

```php +torchlight-php
get(route(...));
post(route(...));
put(route(...));
patch(route(...));
delete(route(...));
```

## Writing Tests

### Grouping Tests with `describe()`

You can use the `describe()` function to group related tests together.

```php +torchlight-php
describe('process order and enrol', function () {
    it('redirects to dashboard after successful payment', function () {
        // Test logic here
    });

    it('clears payment and cart session data', function () {
        // Test logic here
    });
});
```

    ./vendor/bin/pest --filter "process order and enrol"


## Additional Resources

- <a href="https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application"
  target="blank">Christoph Rumpel - Everything You Can Test In Your Laravel Application</a>
- <a href="https://christoph-rumpel.com/2021/4/how-I-test-livewire-components"
  target="blank">Christoph Rumpel - How I Test Livewire Components</a>
- <a href="https://laravel.com/docs/11.x/http-tests#testing-views"
  target="blank">https://laravel.com/docs/11.x/http-tests#testing-views</a>
- <a href="https://pestphp.com/docs/writing-tests"
  target="blank">https://pestphp.com/docs/writing-tests</a>


<!-- 
## Mocking and Stubbing

Mocking and stubbing are essential for isolating tests and controlling
dependencies. Use the `mock` method to create a mock object.

```php +torchlight-php
$mock = Mockery::mock(SomeClass::class);
$mock->shouldReceive('someMethod') ->andReturn('mocked value');
```

- `shouldReceive('method')` tells the mock: "If this method is called, use the
  mock and return what I say."
- `andReturn(value)` specifies what value to return when the method is called.

## Example

```php
$mockCart = Mockery::mock(CartInterface::class);
$mockCart->shouldReceive('cartItems')->andReturn(collect([$course]));
$mockCart->shouldReceive('total')->andReturn(100);
app()->instance(CartInterface::class, $mockCart);
```

- `Mockery::mock(CartInterface::class)` creates a fake version of the
  CartInterface.
- `$mockCart->shouldReceive('cartItems')` means: If the code calls
  `$cart->cartItems()`, use this mock and return what I say.
- `->andReturn(collect([$course]))` means: When `cartItems()` is called, return
  a collection with your test course.
- `->shouldReceive('total')->andReturn(100)` means: When `total()` is called,
  return 100. -->
