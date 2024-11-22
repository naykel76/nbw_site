# Laravel Quick Reference

- [Debugging Techniques](#debugging-techniques)
  - [Dumping Variables](#dumping-variables)
- [Auth](#auth)
  - [Login Specific User](#login-specific-user)
- [Installation and Configuration](#installation-and-configuration)
- [Maintenance Mode](#maintenance-mode)
- [Blade and Views](#blade-and-views)
  - [Determining If A View Exists](#determining-if-a-view-exists)
    - [Choose between local or package view](#choose-between-local-or-package-view)
- [Tips and Techniques](#tips-and-techniques)
  - [Validate option is 'in' a dropdown or simulate control](#validate-option-is-in-a-dropdown-or-simulate-control)
- [Routes](#routes)
  - [Redirect](#redirect)

## Debugging Techniques

### Dumping Variables

```php
<pre>{{ json_encode($answers, JSON_PRETTY_PRINT) }}</pre>
```

## Auth 

### Login Specific User

```php
Auth::loginUsingId(1);
```


## Installation and Configuration

```bash
composer create-project laravel/laravel example-app
```

Alternatively you can install the Laravel installer and use it to create a new project:

```bash
composer global require laravel/installer
laravel new example-app
```

Tack on the --pest flag to use Pest as the testing framework:

```bash
composer create-project laravel/laravel example-app --pest
```


## Maintenance Mode

```bash
# Enable maintenance mode
php artisan down
# Disable maintenance mode
php artisan up
```

```bash
# Display a message when in maintenance mode
php artisan down --secret="apple" --render="errors::coming-soon"
# Bypassing Maintenance Mode
php artisan down --secret="apple"
# Pre-Rendering The Maintenance Mode View
php artisan down --render="errors::503"
# Redirect Maintenance Mode Requests
php artisan down --redirect=/
```


## Blade and Views


### Determining If A View Exists


#### Choose between local or package view

```php
// check local view
if (view()->exists("layouts.$this->layout")) {
    return view("layouts.$this->layout");
}

// if not exists, use package view
return view("package::layouts.$this->layout");
```

```php
$viewPath = view()->exists("layouts.$this->layout")
    ? "layouts.$this->layout"
    : "package::components.$this->layout";

return view($viewPath)->with(['data' => $data]);
```

```php
if (view()->exists('user.dashboard-layout')) {
    return view('user.dashboard-layout');
} else {
    return view('authit::user.dashboard-layout');
}
```



## Tips and Techniques


###   Validate option is 'in' a dropdown or simulate control

```php
const STATUSES = [
    'success' => 'Success',
    'failed' => 'Failed',
    'processing' => 'Processing',
];
```

```php
'status' => 'required|in:'.collect(Model::STATUSES)->keys()->implode(',')
```

```html
<x-gt-select wire:model.defer="editing.layout" for="editing.layout"
    label="Layout" placeholder="Please Select...">
    @foreach (App\Models\Model::STATUSES as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</x-gt-select>
```

## Routes

### Redirect

```php
Route::redirect('/here', '/there', 301);
```

```php
return redirect()->route('login');
```

```php
Route::get('/dashboard', function () {
    return redirect('/home/dashboard');
});
```