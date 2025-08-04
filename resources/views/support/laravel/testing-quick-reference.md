# Laravel Testing Quick Reference

- [Testing Types](#testing-types)
- [Running Tests](#running-tests)
- [Route Methods](#route-methods)
- [Writing Tests](#writing-tests)
    - [Grouping Tests with `describe()`](#grouping-tests-with-describe)
- [Testing Dates](#testing-dates)
    - [Check that a date is set](#check-that-a-date-is-set)
    - [Check if a date is in the future or past](#check-if-a-date-is-in-the-future-or-past)
    - [Check for a specific date (ignoring time)](#check-for-a-specific-date-ignoring-time)
    - [Check if a date is within a range (e.g. within next 7 days)](#check-if-a-date-is-within-a-range-eg-within-next-7-days)
    - [Q. How do I test dates that have been cast in the model?](#q-how-do-i-test-dates-that-have-been-cast-in-the-model)
- [Additional Resources](#additional-resources)


<p class="lead">This quick reference provides a concise overview of testing in Laravel, focusing on the structure, types of tests, and common commands.</p>

## Testing Types

Laravel supports two main types of tests:

- **Feature Tests** (`tests/Feature/`) – Test complete features from a user's
  perspective, including HTTP requests, database interactions, and view
  rendering.
- **Unit Tests** (`tests/Unit/`) – Test individual classes, methods, or
  functions in isolation.

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

## Testing Dates

### Check that a date is set
```php +torchlight-php
expect($event->start_date)->toBeInstanceOf(Carbon\Carbon::class);
expect($event->start_date)->not->toBeNull();
```

### Check if a date is in the future or past
```php +torchlight-php
expect($event->start_date->isFuture())->toBeTrue();
expect($event->start_date->isPast())->toBeTrue();
```

### Check for a specific date (ignoring time)
```php +torchlight-php
expect($event->start_date->toDateString())->toEqual('2025-07-21');
```

### Check if a date is within a range (e.g. within next 7 days)
```php +torchlight-php
expect($event->start_date)->toBeBetween(now(), now()->addDays(7));
```

### Q. How do I test dates that have been cast in the model?

<!-- The test is retunting a carbon instance but the date is cast to a string with a
specific format -->



## Additional Resources


- <a href="https://github.com/laracasts/laravelcasts/tree/main/tests"
  target="blank">Laracasts Course Source Code</a>

- <a href="https://github.com/pinkary-project/pinkary.com" target="blank">Pinkary</a>

- <a href="https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application"
  target="blank">Christoph Rumpel - Everything You Can Test In Your Laravel Application</a>
- <a href="https://christoph-rumpel.com/2021/4/how-I-test-livewire-components"
  target="blank">Christoph Rumpel - How I Test Livewire Components</a>
- <a href="https://laravel.com/docs/11.x/http-tests#testing-views"
  target="blank">https://laravel.com/docs/11.x/http-tests#testing-views</a>
- <a href="https://pestphp.com/docs/writing-tests"
  target="blank">https://pestphp.com/docs/writing-tests</a>
- <a href="https://github.com/christophrumpel/what-you-can-test-in-laravel/tree/main/tests" target="blank">Git Repo Example</a>
