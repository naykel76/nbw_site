# Laravel Cheatsheet
<!-- TOC -->

- [Installation and Configuration](#installation-and-configuration)
- [Maintenance Mode](#maintenance-mode)
- [Blade and Views](#blade-and-views)
    - [Determining If A View Exists](#determining-if-a-view-exists)
        - [Choose between local or package view](#choose-between-local-or-package-view)
- [Tips and Techniques](#tips-and-techniques)
    - [Validate option is 'in' a dropdown or simulate control](#validate-option-is-in-a-dropdown-or-simulate-control)

<!-- /TOC -->

<a id="markdown-installation-and-configuration" name="installation-and-configuration"></a>

## Installation and Configuration

```bash
composer create-project laravel/laravel example-app
```

<a id="markdown-maintenance-mode" name="maintenance-mode"></a>

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

<a id="markdown-blade-and-views" name="blade-and-views"></a>

## Blade and Views

<a id="markdown-determining-if-a-view-exists" name="determining-if-a-view-exists"></a>

### Determining If A View Exists

<a id="markdown-choose-between-local-or-package-view" name="choose-between-local-or-package-view"></a>

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


<a id="markdown-tips-and-techniques" name="tips-and-techniques"></a>

## Tips and Techniques

<a id="markdown-validate-option-is-in-a-dropdown-or-simulate-control" name="validate-option-is-in-a-dropdown-or-simulate-control"></a>

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

