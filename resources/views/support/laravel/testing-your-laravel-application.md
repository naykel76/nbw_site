# Testing Your Laravel Application

- [Testing Types](#testing-types)
- [Testing Structure](#testing-structure)
    - [Directory Structure](#directory-structure)
- [Page Tests](#page-tests)
    - [Page Response Tests](#page-response-tests)
    - [Page Content Tests](#page-content-tests)
- [Controller Tests](#controller-tests)
    - [Page vs Controller Tests](#page-vs-controller-tests)
- [Testing Emails](#testing-emails)
    - [`sends email to ...`](#sends-email-to-)
    - [`contains the expected content`](#contains-the-expected-content)
- [Troubleshooting](#troubleshooting)
    - [Authentication Required for Protected Routes](#authentication-required-for-protected-routes)
- [FAQ's](#faqs)
    - [What is the difference between `assertSee` and `assertSeeText`?](#what-is-the-difference-between-assertsee-and-assertseetext)

<p class="lead">This article explains <strong>What</strong> and
<strong>How</strong> to test in Laravel using Pest PHP. It outlines
common testing methods, recommended practices, and a structural guide to help
ensure your application works as intended.</p>

## Testing Types

Laravel supports two main types of tests:

- **Feature Tests** (`tests/Feature/`) - Test complete features from a user's
  perspective, including HTTP requests, database interactions, and view
  rendering
- **Unit Tests** (`tests/Unit/`) - Test individual classes, methods, or
  functions in isolation


## Testing Structure

Without a consistent structure, tests can quickly become difficult to manage. A
good strategy is to mirror the Laravel directory structure, grouping tests by
functionality (e.g. Livewire components, models, pages). This helps maintain
clarity and makes it easier to find tests related to specific features.

### Directory Structure

```bash +torchlight-bash

tests/
├── Feature/
│   ├── Auth/
│   ├── Checkout/
│   ├── Http/
│   │   └── Controllers/
│   │   │   ├── CourseControllerTest.php
│   │   │   └── ShowHomePageControllerTest.php
│   ├── Livewire/                     
│   │   ├── CartSummaryTest.php
│   │   └── CourseManagerTest.php
│   ├── Models/                       
│   │   ├── CourseTest.php
│   ├── Pages/                        
│   │   ├── CourseShowPageTest.php
│   │   └── HomePageTest.php
└── Unit/
    ├── Helpers/
    └── Services/
```


## Page Tests

Page tests focus on the full HTTP response cycle: loading the page, rendering
views, showing components, and handling redirects. Avoid testing business logic
here, as business logic should be tested in their respective service, model, or
controller tests where that logic actually lives.


### Page Response Tests 

```php +torchlight-php
it('gives back a successful response for home page', function () {
    get(route('home'))->assertOk();
});
```

### Page Content Tests

These tests focus on the visible content of the page, such as text, images, and
links. They don’t cover business logic or backend processing.

```php +torchlight-php
it('passes expected data to the checkout view', function () {
    get(route('checkout'))
        ->assertViewHas('pageTitle')
        ->assertViewHas('total');
});
```




## Controller Tests

<!-- i think this needs review and tidy up -->
### Page vs Controller Tests

To avoid confusion and duplication, be clear about the intent of each test type:

* **PageHomeTest** Tests the behaviour and output of the home page from the
  user’s perspective. Covers:

  * Page loads successfully
  * Correct content is shown
  * Expected links or buttons are present
  * HTTP response status is 200

* **ShowHomePageControllerTest** Tests the controller logic directly from a
  developer perspective. Covers:

  * Correct view is returned
  * Required data is passed to the view
  * Edge cases and errors are handled appropriately

**Recommendation:** In most cases, writing tests named after the page or feature
(like `HomePageTest`) is preferred over naming tests after the controller, since
the controller is often just part of the full feature.

Use controller-level tests only when there’s logic in the controller worth
isolating.



<!-- 
```bash +torchlight-bash
tests/
├── Feature/
│   ├── Auth/                         # Authentication feature tests
│   │   ├── LoginPageTest.php
│   │   └── RegisterPageTest.php
│   ├── Checkout/                     # Checkout and payment-related pages
│   │   ├── CheckoutPageTest.php
│   │   └── PaymentSuccessPageTest.php
│   ├── Http/
│   │   ├── Controllers/              # Controller logic tests (optional)
│   │   │   ├── CourseControllerTest.php
│   │   │   └── ShowHomePageControllerTest.php
│   ├── Livewire/                     # Livewire component tests
│   │   ├── CartSummaryTest.php
│   │   └── CourseManagerTest.php
│   ├── Models/                       # Feature-level model tests (e.g. scopes, accessors)
│   │   ├── CourseTest.php
│   │   └── UserTest.php
│   ├── Pages/                        # Page and route tests (user perspective)
│   │   ├── AboutPageTest.php
│   │   ├── ContactPageTest.php
│   │   ├── CourseListPageTest.php
│   │   ├── CourseShowPageTest.php
│   │   └── HomePageTest.php
└── Unit/
    ├── Helpers/                      # Helper function tests
    │   └── SlugHelperTest.php
    └── Services/                     # Service class tests
        ├── CourseSyncServiceTest.php
        └── PaymentServiceTest.php
``` -->

review---------










## Testing Emails

```html +parse
<x-gt-alert type="info">
When testing email functionality, always call <code>Mail::fake()</code> at the start of
your test. This ensures that no real emails are sent during the test run.
</x-gt-alert>
```

### `sends email to ...`

```php +torchlight-php
it('sends email to ...', function () {
    // Arrange
    Mail::fake();
    $user = User::factory()->create();

    // Act
    $this->get(route('send-newsletter-email'));

    // Assert
    Mail::assertSent(NewsLetter::class);
});
```


### `contains the expected content`

```php +torchlight-php
it('contains the expected content', function () {
    // Arrange
    $product = Product::factory()->make();

   // Act
    $mail = new PaymentSuccessfulMail($product);

    // Assert
    expect($mail)
        ->assertHasSubject('Your payment was successful')
        ->assertSeeInHtml($product->title);
});
```


<!-- 
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
``` -->

<!-- ### Testing Role-Based Access Control (Spatie Permissions)

To test role-based access control, simply create a role and assign it to a user. 

```php +torchlight-php
use Spatie\Permission\Models\Role;

it('allows admin users to access the admin dashboard', function () {
    Role::create(['name' => 'admin']);
    $admin = User::factory()->create()->assignRole('admin');

    actingAs($admin)->get(route('admin.dashboard'))->assertOk();
});
``` -->

## Troubleshooting

### Authentication Required for Protected Routes

When testing protected routes (like admin pages), you'll often encounter
authentication failures. The test below will fail because the route requires
authentication:

```php +torchlight-php
// This will fail - no authenticated user
it('displays the component on the page for authenticated users', function () {
    get(route('admin.courses.index'))
        ->assertSeeLivewire(AdminCourseTable::class);
});
```

To resolve this, you need to simulate an authenticated user in your test.

```php +torchlight-php
// This will pass - simulating an authenticated admin user
it('displays the component on the page for authenticated users', function () {
    loginAsAdmin();
    get(route('admin.courses.index'))
        ->assertSeeLivewire(AdminCourseTable::class);
});
```

## FAQ's

### <question>What is the difference between `assertSee` and `assertSeeText`?</question>

- `assertSee` **includes** HTML in the search.  
- `assertSeeText` **ignores** HTML and checks only plain text.
  
```php +torchlight-php
$response->assertSee('<h1>Heading</h1>'); // Passes
$response->assertSeeText('<h1>Heading</h1>'); // Fails
```

