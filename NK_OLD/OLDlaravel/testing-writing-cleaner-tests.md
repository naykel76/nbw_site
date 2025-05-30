# Writing Cleaner Tests 

<p class="lead">
These are some tips to help you write cleaner and more maintainable tests in Laravel,
focusing on reusability and simplicity. By applying these practices, you can reduce
repetition and keep your test suite organised.
</p>


- [Reusable Method to Authenticate Users Before Running Tests (Acting As)](#reusable-method-to-authenticate-users-before-running-tests-acting-as)
- [Testing Role-Based Access Control (Spatie Permissions)](#testing-role-based-access-control-spatie-permissions)
- [Debugging Techniques](#debugging-techniques)

## Reusable Method to Authenticate Users Before Running Tests (Acting As)

Create a reusable method to authenticate users before running tests. This method will
create a new user if none is provided and return the authenticated user.

```php
function loginAsUser($user = null): User
{
    $user = $user ?? User::factory()->create();
    actingAs($user);
    return $user;
}
```

You can now use this method in your tests to authenticate users.

```php
it('shows the dashboard when authenticated', function () {
    loginAsUser();
    get(route('dashboard'))->assertOk();
});
```

## Testing Role-Based Access Control (Spatie Permissions)

When testing role-based access control, create a role and assign it to a user. This will
help you test different scenarios based on the user's role.

```php
use App\Models\User;
use Spatie\Permission\Models\Role;

it('allows admin users to access the admin dashboard', function () {
    // Create an "admin" role
    $role = Role::create(['name' => 'admin']);

    // Create a user and assign the "admin" role
    $admin = User::factory()->create();
    $admin->assignRole($role);

    // Authenticate the user
    actingAs($admin);

    // Test the admin dashboard route
    get(route('admin.dashboard'))->assertOk();
});
```



## Debugging Techniques

When writing tests, you may encounter issues that require debugging. Here are some techniques to help you troubleshoot common problems:

My simple test was failing and i had no idea why.

```php
it('shows the checkout when authenticated', function () {
    $user = User::factory()->create();

    $this->actingAs($user);
    get(route('checkout'))->assertOk();
});
```

I added some debugging statements to identify the issue.

```php
it('shows the checkout when authenticated', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    // Debugging: Check if the user is authenticated
    $this->assertTrue(auth()->check());

    // Debugging: Check the user's ID
    $this->assertEquals($user->id, auth()->id());

    // Debugging: Check the response status and content
    $response = get(route('checkout'));
    $response->dump(); // Dump the response for debugging

    $response->assertOk();
});
```

In this case it turned out that middleware was blocking the request because the user did
not have a valid profile. I had to update the test to include a valid profile for the
user.

```php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(EnsureValidProfile::class)->group(function () {
        Route::get('checkout', [CheckoutController::class, 'show'])
            ->name('checkout');
    });
});
```

The solution it to either create a valid profile for the user or mock the `hasProfile()`
method that is used in the `EnsureValidProfile` middleware to return true for the test.



<!-- By adding a valid profile to the user, the test passed successfully.

```php
it('shows the checkout when authenticated', function () {
    $user = User::factory()->create();
    $user->profile()->create(['name' => 'John Doe']);

    $this->actingAs($user);
    get(route('checkout'))->assertOk();
});
``` -->