# Laravel Cheatsheet

## Check Existence

## Config and Environment

| Command                   | Action                               |
| :------------------------ | :----------------------------------- |
| `env('APP_NAME)`          | Retrieving Environment Configuration |
| `config('app.timezone');` | Accessing Configuration Values       |


### Determining The Current Environment

```php
\App::environment('local') ? dd('local') : dd('production');
```

```php
$environment = App::environment();

if (App::environment('local')) {
    // The environment is local
}

if (App::environment(['local', 'staging'])) {
    // The environment is either local OR staging...
}
```



<hr>

## Auth and User

| Command                                              | Action                                                             |
| :--------------------------------------------------- | :----------------------------------------------------------------- |
| `Auth::id()` or `Auth::user()->id`                   | get authorised user 'id'                                           |
| `Auth::user()`                                       | get authorised user via `Auth` facade (returns entire user object) |
| `$request->user()->attr`                             | returns value of the desired dB attribute                          |
| `if(Auth::check()) { }`                              | Check if user authenticated. True or False                         |
| `@if (Auth::user()->hasRole('supplier')) ... @endif` | Check if user has role in view                                     |


## Path Helper Functions


| Helper            | Output       |
| ----------------- | ------------ |
| `base_path()`     | `\`          |
| `app_path()`      | `\app`       |
| `config_path()`   | `\config`    |
| `database_path()` | `\database`  |
| `public_path()`   | `\public`    |
| `resource_path()` | `\resources` |
| `storage_path()`  | `\storage`   |




## How to Make Menu Item Active

```php
    // Exact url
    <li class="{{ (request()->is('admin/users')) ? 'active' : '' }}">
    // Starts with url
    <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}">  // admin/users/edit/5234
    // Matching route name (will match all route admin.users.edit)
    <li class="{{ (strpos(Route::currentRouteName(), 'admin.users') == 0) ? 'active' : '' }}">
    //
    routeIs('admin.cities*') ? 'active' : '' }}">
    routeIs('admin.cities.index') ? 'active' : '' }}>
    routeIs('admin.cities.create') ? 'active' : '' }}>
```
