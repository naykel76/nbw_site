# Gotime: Form Object Guide

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Quick Checklist](#quick-checklist)
- [Initial Setup](#initial-setup)
    - [Form Object Class](#form-object-class)


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

```php +torchlight-php
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

```php +torchlight-php
public function createNewModel(array $data = []): Post
{
    return Post::make(array_merge([
        'created_at' => now(),
    ], $data));
}
```
 -->

