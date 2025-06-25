# Renderable
- [Overview](#overview)
- [Passing Data to the View](#passing-data-to-the-view)
- [Define the Layout](#define-the-layout)
- [Define the View](#define-the-view)
- [Override the Render Method](#override-the-render-method)
- [Example](#example)

## Overview

The `Renderable` trait simplifies rendering views and layouts in Livewire components. It
automatically resolves view names, handles layout integration, and passes data to views,
reducing the need for manual definitions and boilerplate code.

To use the `Renderable` trait, include it in your Livewire component class:

```php +torchlight-php

use Naykel\Gotime\Traits\Renderable;

class MyComponent
{
    use Renderable;
}
```

## Passing Data to the View

The `Renderable` trait automatically uses the `prepareData` method (if it exists) to pass
data to the view. You can define this method to prepare any data required by your view.

For example:

```php +torchlight-php
protected function prepareData(): array
{
    return ['items' => $this->modelClass::all()];
}
```

If the `prepareData` method is not defined, the component will still render, but without
additional data.

## Define the Layout

The `Renderable` trait will apply a layout automatically.

By default, the layout is determined by the `livewire_layout` configuration value in the
`naykel.php` config file:

```bash
'livewire_layout' => env('NK_LIVEWIRE_LAYOUT', 'app'),
```

To set a custom layout for a specific component, you can define the `$layout` property in
your component class:

```php +torchlight-php  
protected $layout = 'admin';
```

If the `$layout` property is not set, the layout from the configuration will be applied.

## Define the View

By default, the `Renderable` trait will automatically resolve the view name based on the
class name through the `ComponentRegistry`. However, you can also specify a custom view
name.

To define a custom view name, use the `$view` property in your component class:

```php +torchlight-php
protected $view = 'custom.view.name';
```

Alternatively, if you do not specify a view, the trait will resolve it for you.

## Override the Render Method

The `Renderable` trait provides a default `render` method. If you need to customize the
render behavior, you can override the `render` method in your component class, but this
will override the trait's `render` method, not Livewire's default one.

```php +torchlight-php
public function render(): View
{
    // Custom render logic
}
```

## Example

Here’s an example that demonstrates how to use the trait with a custom view and the
`prepareData` method:

```php +torchlight-php
use Naykel\Gotime\Traits\Renderable;

class MyComponent
{
    use Renderable;

    protected $view = 'custom.view.name';

    protected function prepareData()
    {
        return ['items' => $this->modelClass::all()];
    }
}
```

This setup will automatically render the specified view, apply the layout, and pass any
necessary data.

