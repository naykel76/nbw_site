# Laravel and Livewire Pest Testing

- [Testing Structure](#testing-structure)
    - [Testing Checklist](#testing-checklist)
- [Defining Tests](#defining-tests)
- [Running Tests](#running-tests)
- [Laravel Assertions](#laravel-assertions)
- [Testing Requests \& Responses](#testing-requests--responses)
    - [Testing Page Content](#testing-page-content)
    - [`denies access to unauthorised users`](#denies-access-to-unauthorised-users)
    - [`redirects unauthenticated users to login`](#redirects-unauthenticated-users-to-login)
    - [Testing Role-Based Access Control (Spatie Permissions)](#testing-role-based-access-control-spatie-permissions)
- [Additional Resources](#additional-resources)
- [FAQ's](#faqs)
    - [What is the difference between `assertSee` and `assertSeeText`?](#what-is-the-difference-between-assertsee-and-assertseetext)

## Testing Structure

Tests can become unmanageable without a clear structure. Similar to the Laravel directory
structure, tests should be grouped by functionality (e.g., Livewire components, models,
pages) and further organised by specific concerns.

- **Simple features** (e.g., an About page) can have all tests in a single file, such as
  `PageResponseTest.php`.
- **Complex features** should use subdirectories. For example, within the `Pages`
  directory, create a `Product` directory for product-related tests.

Example directory structure:

```bash
tests/
└── Feature/
    ├── Livewire/                     # Livewire component tests
    │   ├── ProductManagerTest.php     
    │   └── UserProfileTest.php        
    ├── Models/                        # Model-related tests
    │   ├── ModelProductTest.php       
    │   └── ModelUserTest.php          
    ├── Pages/                         # Page and route tests
    │   ├── Product/                    
    │   │   ├── PageProductDetailsTest.php
    │   │   └── PageProductTest.php    
    │   └── PageUserProfileTest.php    
└── Unit/                               
```

### Testing Checklist

This checklist ensures comprehensive test coverage for a Laravel and Livewire application.


- ▢ **Test the page response** – Ensure the correct HTTP status (200, 404, etc.) and
  that the page loads as expected.  
- ▢ **Test access control**  
    - ▢ **Authenticated users can access protected areas** – Confirm that users with
      valid login credentials can access restricted pages (e.g., admin dashboard, user
      profile).  
    - ▢ **Unauthenticated users are denied access** – Verify that users who are not
      logged in are redirected to the login page or denied access.  
    - ▢ **Users with insufficient permissions are denied access** – Check that users
      without the required permissions are blocked from accessing certain areas.  


<!-- 
- ▢ **Form validation** – Required fields, correct input types, error messages.
- ▢ **Database interactions** – Ensure data is saved, updated, and deleted correctly.
- ▢ **Edge cases** – Handle empty or invalid inputs gracefully.
- ▢ **UI component behaviour** – Ensure buttons, forms, and links function properly.
- ▢ **Session handling** – Verify login persistence and session expiration.
- ▢ **Redirects** – Ensure correct redirection after actions (e.g., login, form submission).
- ▢ **Role-based permissions** – Confirm user roles access only their designated areas.
- ▢ **Performance checks** – Validate acceptable page load times. -->


## Defining Tests

Use the `it` or `test` function to define a test.

```php +torchlight-php
it('returns a successful response', function () {
    // test code here
});
```

```php +torchlight-php
test('something is accessible', function () {
    // test code here
});
```

You can use the `describe` function to group related tests together. This does not affect
the test results but can help to organise tests, especially when there are many of them in
the same file.

```php +torchlight-php
describe('group of tests', function () {
    // group tests here
});
```

## Running Tests

<a href="https://pestphp.com/docs/cli-api-reference" target="blank">PEST CLI API Reference</a>

| Command                      | Alias          | Action                        |
| :--------------------------- | :------------- | :---------------------------- |
| `php artisan test`           | `pt`           | Run all tests                 |
| `php artisan test --compact` | `pt --compact` | Run all tests in compact mode |
| `php artisan test --filter`  | `pt --filter`  | Run specific tests            |

Additional options:

- `--bail` – Stop execution on first failure.
- `--todos` – Output a list of pending tests.
- `--retry` – Rerun failing tests first.
- `--exclude-testsuite <name>` – Exclude specific test suites.
- `--group <name>` – Run only tests from specified group.
- `--exclude-group <name>` – Exclude specific test groups.
- `--test-suffix <suffix>` – Run tests in files with specific suffixes.
  
## Laravel Assertions

Refer to <a href="https://laravel.com/docs/master/http-tests#response-assertions"
target="blank">Response Assertions Docs</a>

```php +torchlight-php
->assertSee(route('products.show', $product));
```

## Testing Requests & Responses



### Testing Page Content

<!-- list of items -->
<!-- displays item overview -->
<!-- displays item details -->
```php +torchlight-php
it('displays the product name', function () {
    $product = Product::factory()->create();
    get(route('products.show', $product))->assertSee($product->name);
});
```


```php +torchlight-php

## Access Control

Access control tests may not be strictly necessary when using middleware to protect  
routes. Laravel’s authentication and authorization middleware automatically redirects  
unauthenticated users to the login page and denies access to unauthorised users.  
Instead of testing these behaviours on every route, you only need to ensure that  
middleware is applied correctly.

### `allows authorised users to access some-page`

This is the one test I suggest you write for each protected page. It ensures that  
authenticated users can access the page.

```php +torchlight-php
it('allows authorised users to access some-page', function () {
    $user = User::factory()->create();
    actingAs($user)->get(route('some-page'))->assertOk();
});
```

The following tests however, are generally unnecessary when using middleware to protect
routes, as Laravel already enforces these behaviours.

### `denies access to unauthorised users`
```php +torchlight-php
it('denies access to unauthorised users', function () {
    $user = User::factory()->create();
    actingAs($user)->get(route('my-page'))->assertForbidden();
});
```

### `redirects unauthenticated users to login`
```php +torchlight-php
it('redirects unauthenticated users to login', function () {
    get(route('my-page'))->assertRedirect(route('login'));
});
```



### Testing Role-Based Access Control (Spatie Permissions)

To test role-based access control, simply create a role and assign it to a user. 

```php +torchlight-php
use Spatie\Permission\Models\Role;

it('allows admin users to access the admin dashboard', function () {
    Role::create(['name' => 'admin']);
    $admin = User::factory()->create()->assignRole('admin');

    actingAs($admin)->get(route('admin.dashboard'))->assertOk();
});
```


## Additional Resources

- <a href="https://christoph-rumpel.com/2023/3/everything-you-can-test-in-your-laravel-application"
  target="blank">Christoph Rumpel - Everything You Can Test In Your Laravel Application</a>
- <a href="https://christoph-rumpel.com/2021/4/how-I-test-livewire-components"
  target="blank">Christoph Rumpel - How I Test Livewire Components</a>
- <a href="https://laravel.com/docs/11.x/http-tests#testing-views"
  target="blank">https://laravel.com/docs/11.x/http-tests#testing-views</a>
- <a href="https://pestphp.com/docs/writing-tests"
  target="blank">https://pestphp.com/docs/writing-tests</a>

## FAQ's

### <question>What is the difference between `assertSee` and `assertSeeText`?</question>

- `assertSee` **includes** HTML in the search.  
- `assertSeeText` **ignores** HTML and checks only plain text.
  
```php +torchlight-php
$response->assertSee('<h1>Heading</h1>'); // Passes
$response->assertSeeText('<h1>Heading</h1>'); // Fails
```
