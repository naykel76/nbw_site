# Routes

- [Resource Routes](#resource-routes)
  - [Define a Resource Route](#define-a-resource-route)
  - [Limit the Routes Created by a Resource Controller (Only)](#limit-the-routes-created-by-a-resource-controller-only)
  - [Exclude Resource Routes (Except)](#exclude-resource-routes-except)
  - [Assign Custom Names to Resource Routes](#assign-custom-names-to-resource-routes)
- [Redirect Route](#redirect-route)
- [Define a Route With Optional Parameters](#define-a-route-with-optional-parameters)
- [Prefix and Namespace](#prefix-and-namespace)
- [Middleware Groups](#middleware-groups)
- [Route Existence](#route-existence)
  - [Check If a Route Exists](#check-if-a-route-exists)
- [Route-Based Conditional Checks](#route-based-conditional-checks)
  - [Check the Current Route Name](#check-the-current-route-name)
  - [Example: Conditional Content in Blade](#example-conditional-content-in-blade)
  - [Example: Active State in Navigation Menus](#example-active-state-in-navigation-menus)

## Resource Routes

### Define a Resource Route

```php +torchlight-php
Route::resource('posts', PostController::class);
```

### Limit the Routes Created by a Resource Controller (Only)

```php +torchlight-php
Route::resource('posts', PostController::class)->only(['index', 'show']);
```

### Exclude Resource Routes (Except)

```php +torchlight-php
Route::resource('posts', PostController::class)->except(['destroy', 'update']);
```

### Assign Custom Names to Resource Routes

```php +torchlight-php
Route::resource('posts', PostController::class)->names([
    'create' => 'posts.build'
]);
```

## Redirect Route

```php +torchlight-php
Route::redirect('/', 'dashboard');
```

## Define a Route With Optional Parameters

```php +torchlight-php
Route::get('user/{name?}', UserController::class);
```

## Prefix and Namespace

Group routes with a common prefix and name:

```php +torchlight-php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users');
});
```

## Middleware Groups

```php +torchlight-php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});
```

## Route Existence

### Check If a Route Exists

``` php
Route::has('users.edit')
```

## Route-Based Conditional Checks

### Check the Current Route Name

Use `request()->routeIs()` to check if the current route matches a specific name. This is useful for
applying conditional logic in Blade templates, controllers, or global configurations.

### Example: Conditional Content in Blade

```html +torchlight-html
@if (request()->routeIs('admin.course.show'))
    <p>You are viewing the admin course page.</p>
@endif
```

### Example: Active State in Navigation Menus

```html +torchlight-html
<li class="{{ request()->routeIs('admin.course.show') ? 'active' : '' }}">
    <a href="{{ route('admin.course.show', $course) }}">View Course</a>
</li>
```