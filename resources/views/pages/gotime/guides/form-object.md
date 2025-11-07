# Gotime: Form Object Guide

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Quick Checklist](#quick-checklist)
- [Initial Setup](#initial-setup)
    - [Form Object Class](#form-object-class)
- [Troubleshooting: Livewire Forms and Custom Casts](#troubleshooting-livewire-forms-and-custom-casts)
- [The Problem](#the-problem)
- [Root Causes](#root-causes)
    - [1. Property Type Declaration (Most Common)](#1-property-type-declaration-most-common)
    - [2. Livewire Bypasses Eloquent Casts](#2-livewire-bypasses-eloquent-casts)
- [Solutions](#solutions)
    - [Solution 1: Fix Property Type Declaration (Recommended)](#solution-1-fix-property-type-declaration-recommended)
    - [Solution 2: Manually Format in `init()` Method](#solution-2-manually-format-in-init-method)


## Introduction

> This document references custom VS Code snippets like `gtlc:form-class` and
> `gtlc:form-object` that generate boilerplate code for common patterns. These
> are not available by default but can be added as custom snippets to speed up
> development.

## Prerequisites

Requires the `Gotime` package to be installed and configured. Assumes a basic
understanding of Livewire and Laravel.

## Quick Checklist

1. Create the Livewire form object (`php artisan livewire:form WidgetFormObject`)
2. Add the form object, including the required traits, properties, and the
    `init` method to initialise the form model (`gtlc:form-object`)
<!-- 3. Initialise the form object with a model instance
4. Bind the form to the view with `wire:model="form.property"`
5. Add form inputs and submit/cancel buttons
6. Test both create and edit functionality
7. Use the form object in a Livewire component
8. Handle form submission and validation
9. Implement any additional methods for custom logic
10. Test the form in both create and edit scenarios -->

## Initial Setup

From the command line:

```bash +torchlight-bash
php artisan livewire:form WidgetFormObject
```

### Form Object Class

Once created, update the form object class to include the required traits and
properties, then add the `init` method to initialise the form model.

```php +code
namespace App\Livewire\Forms;

use App\Models\Widget;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class WidgetFormObject extends Form
{
    use Crudable, Formable;

    #[Validate('required|string|max: 255')]
    public string $title;

    public function init(Widget $model): void
    {
        $this->editing = $model;
        $this->setFormProperties($this->editing);
    }
}
```

Add any additional properties and validation rules as needed. 

<!-- i dont think i need this, maybe just refer to trait docs? -->
<!-- The `init` method initialises the form object with a model instance, setting the
`editing` property and binding the form properties to the model attributes. -->


<!-- 
## Initialising Form Object
### Route-based Initialisation (via route model binding)
### Event-Driven Initialisation
#### Listening for Events
#### Dispatching Events
### Setting Default Values
#### Method 1: Pass Defaults Directly
#### Method 2: Use the `initialData` Property
## FAQs -->

<!-- 



## Step 3: 



```html +parse
<x-gt-alert type="warning">
The <code>editing</code> attribute, defined in the <code>Formable</code> trait, represents the
form's initial or persisted state as a model instance. This attribute does not update to reflect
changes made to the model after the form has been edited. It only mirrors the model state when
initially set or after the form has been saved, not during the editing process.
</x-gt-alert>
```

## Step 4: Add the `createNewModel` Method

This method creates a new model instance, often used when initialising the form for a new record.

```php +code
public function createNewModel(array $data = []): Post
{
    return Post::make(array_merge([
        'created_at' => now(),
    ], $data));
}
```
 -->



## Troubleshooting: Livewire Forms and Custom Casts

## The Problem
A common issue with Livewire and custom casts where the cast works correctly in
tables but displays incorrect values in Livewire forms.

**Symptoms:**
- Cast works in tables: shows `149.99` ✅
- Same data in Livewire forms: shows `14999` or `149` ❌
- Database contains correct values: `14999` for $149.99

## Root Causes

### 1. Property Type Declaration (Most Common)
```php +code
// ❌ WRONG - Forces integer conversion, truncating decimals
#[Validate('integer|min:0')]
public int $price = 0;  // 149.99 becomes 149

// ✅ CORRECT - Preserves decimal values
#[Validate('numeric|min:0')]
public float $price = 0.0;

// ✅ ALSO CORRECT - For form inputs (strings)
#[Validate('numeric|min:0')]
public string $price = '0.00';
```

### 2. Livewire Bypasses Eloquent Casts
Livewire doesn't automatically apply casts when binding properties directly to
model attributes.

**What happens:**
- **In tables**: `$model->price` triggers the cast's `get()` method ✅
- **In Livewire**: Direct property assignment bypasses casting ❌
  
## Solutions

### Solution 1: Fix Property Type Declaration (Recommended)
```php +code
#[Validate('numeric|min:0')]
public float $price = 0.0;

public function init(Product $model): void
{
    $this->editing = $model;

    // forces cast to run and handles null values
    $this->price = $model->price ?? 0.0; // Now works correctly!
}
```

### Solution 2: Manually Format in `init()` Method
```php +code
public function init(Product $model): void
{
    $this->editing = $model;
    $this->price = number_format($model->price, 2, '.', '');
}
```


