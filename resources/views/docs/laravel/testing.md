# Laravel Pest Testing

- [Getting Started](#getting-started)
  - [Grouping Tests](#grouping-tests)
- [Resetting the Database](#resetting-the-database)
  - [Lazily Refresh Database](#lazily-refresh-database)
  - [In-Memory SQLite Database](#in-memory-sqlite-database)
- [Expectations](#expectations)
- [Examples](#examples)
  - [Page Response Tests](#page-response-tests)
- [FYI](#fyi)
- [Trouble Shooting](#trouble-shooting)
  - [False Positive with `assertSeeText`](#false-positive-with-assertseetext)


Authenticating a user before running tests.

```php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});
```

<!-- ## Getting Started

<div class="code-first-col"></div>

| Command             | Action     |
| :------------------ | :--------- |
| assertStatus('200') | assertOk() |

Use the `it` or `test` function to define a test.

```php
it('does some test', function () { });
test('some test', function () { });
```

### Grouping Tests

Use the describe function to group related tests together.

```php
describe('group of tests', function () {
    // group tests here
});
```

## Resetting the Database 

Add the `RefreshDatabase` trait to your test class to reset the database after each test.

```php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
```

You can make this trait available to all tests by adding it to the `Pest.php` configuration file.

```php
// tests/Pest.php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class)->in('Feature');
```

### Lazily Refresh Database

Not all tests require resetting the database. You can use the `LazilyRefreshDatabase` trait to reset
the database only when necessary. This way, the database will be reset only when there are
interactions with it rather than after each test.

```php
// tests/Pest.php
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);
```

### In-Memory SQLite Database

To run tests without affecting your actual database, you can use an in-memory SQLite database or a
dedicated testing database. In your `phpunit.xml` file, you can configure the environment to use an
in-memory SQLite database for testing.

```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

## Expectations

<a href="https://pestphp.com/docs/expectations" target="blank">Pest Expectation Documentation</a>



## Examples

### Page Response Tests

```php
it('gives successful response for home page', function () {
    $this->get(route('home'))->assertOk();
});
```

## FYI

Arrays need to be cast in the model to be able to use `assertSee` with them.

```php
protected $casts = [
    'array_column' => 'array',
];
```

## Trouble Shooting

### False Positive with `assertSeeText`

The `assertSeeText` method expects a single string or an array of strings to check for their presence in the response. The following test will give a false positive because we are passing two strings as separate arguments instead of an array.

```php
it('shows courses overview (index)', function () {
    Course::factory()->create(['title' => 'Course A']);
    $this->get(route('courses.index'))->assertSeeText('Course A', 'Course B');
});
```

There is no `thisDoesNotExist` column in the database, so the test should fail. Why is it passing?

```php
it('shows courses overview (index)', function () {
    $course = Course::factory()->create(['title' => 'Course A']);

    $this->get(route('courses.index'))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->code,
            $course->thisDoesNotExist,
        ]);
});
```

The test is passing because `assertSeeText` is checking if the specified text is present in the
response body, not if the columns exist in the database. Since the `thisDoesNotExist` column does
not exist in the Course model, it will be `null`. The `assertSeeText` method will then check for the
string representation of `null`, which is an empty string.

To fix this, you can use the `assertSee` method to check for the presence of the column values in the
response.

```php
it('shows courses overview (index)', function () {
    $course = Course::factory()->create(['title' => 'Course A']);

    $this->get(route('courses.index'))
        ->assertOk()
        ->assertSee($course->title)
        ->assertSee($course->code)
        ->assertSee($course->thisDoesNotExist);
});
```

Make sure to pass the `test` methods optional second argument (`params`) as an array.

```php
public static function test($name, $params = []) { }
```

```php
Livewire::test(AddToCartButton::class, [$product])
    ->call('addToCart');
``` -->