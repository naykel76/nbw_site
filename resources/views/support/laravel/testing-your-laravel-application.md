# What To Test

- [Page Tests](#page-tests)
    - [`shows the correct information on the page`](#shows-the-correct-information-on-the-page)
- [Testing Emails](#testing-emails)
    - [`sends email to ...`](#sends-email-to-)
- [Troubleshooting](#troubleshooting)
    - [Authentication Required for Protected Routes](#authentication-required-for-protected-routes)
- [FAQ's](#faqs)
    - [What is the difference between `assertSee` and `assertSeeText`?](#what-is-the-difference-between-assertsee-and-assertseetext)
- [Livewire](#livewire)

<!-- FIX ME -->
<!-- <p class="lead">This article explains <strong>What</strong> and <strong>How</strong> to test in Laravel using Pest PHP. It outlines common testing methods, recommended practices, and a structural guide to help ensure your application works as intended.</p> -->

To understand the test types refer to the  Testing Directory Structure and Best Practices .....

Explains the differtn types and blabla

## Page Tests

Page tests (also known as **feature tests**, **HTTP tests**, or **browser-style
tests**) verify the application's behavior from the user's perspective by
simulating full HTTP requests and checking the resulting responses. These tests
cover aspects such as page loading, view rendering, component visibility, and
redirects. Avoid testing business logic in page tests; instead, keep those
checks in dedicated service, model, or controller tests.

<!-- When running page tests, should I always assertOk after setting the route? Or just rely on a single page response test -->

### `shows the correct information on the page`

```php +torchlight-php
it('shows the correct information on the course details page', function () {
    // Arrange
    $course = Course::factory()->make();

    // Act & Assert
    $this->get(route('courses.show', $course))
        ->assertOk() 
            ->assertSeeText([
                $course->title,
                $course->code,
            ]);
});
```


<!-- displays all -->

<!-- it('enrols the user in all courses from a program in the cart', function () {
    $setup = mockSuccessfulPaymentSetup(numPrograms: 1, numCourses: 0);

    $user = $setup['user'];
    $program = $setup['programs'][0];
    $programCourseCount = $program->courses->count();

    get(route('payment.success'));

    $order = Order::wherePaymentId('txn_123')->first();

    $totalStudentCourses = StudentCourse::where('user_id', $user->id)
        ->whereOrderId($order->id)
        ->count();

    expect($order)->not->toBeNull();
    expect($totalStudentCourses)->toEqual($programCourseCount);
}); -->

<!-- ### Page Response Tests 


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
``` -->










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


## Livewire

* Keep your Livewire component tests focused on component behavior such as
  sorting, filtering, data updates, state changes, and validation. Avoid testing
  user roles or authentication within these tests; handle those concerns in your
  route or feature tests.

<!-- 
it('allows admin to access', function () {
    $admin = loginAsAdmin();
    Livewire::actingAs($admin)
        ->test(AdminScheduledEventsDashboard::class)
        ->assertStatus(200);
});

it('denies non-admin access', function () {
    $user = loginAsUser();
    Livewire::actingAs($user)
        ->test(AdminScheduledEventsDashboard::class)
        ->assertForbidden(); 
}); -->
