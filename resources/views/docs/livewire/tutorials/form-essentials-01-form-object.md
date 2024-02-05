# Livewire Form Essentials - Form Object


<!-- TOC -->

- [Introduction](#introduction)
- [Create the form object](#create-the-form-object)
- [Define the form object properties and validation rules](#define-the-form-object-properties-and-validation-rules)
- [`setModel` (set the model instance and initialise properties)](#setmodel-set-the-model-instance-and-initialise-properties)
- [`create` (refer to CreateEdit component)](#create-refer-to-createedit-component)
- [`edit` (refer to CreateEdit component)](#edit-refer-to-createedit-component)
- [`update` (validate the form object properties and persist changes)](#update-validate-the-form-object-properties-and-persist-changes)
- [Things worth noting](#things-worth-noting)

<!-- /TOC -->
<a id="markdown-introduction" name="introduction"></a>

## Introduction

In this example, we will walk through the steps of creating a Livewire form object for creating
and editing a course.

<div class="bx info flex va-c">
    <svg class="icon wh-3 fs0 mr"><use xlink:href="/svg/naykel-ui.svg#question-mark-circlermation-circle"></use></svg>
    <div>User feedback such as notifications are handled in the Livewire component, not the form object.</div>
</div>

The following example does not show the full form object properties that are used in the example,
but it should give you an idea of how to define the properties.

Checkout the [repo](https://github.com/naykel76/dev_crud/commit/eb497bd6080b747fc4bab6bcee4d36f1d4f917ff#diff-68baa51dd9de7b37358d6f72bb277577f4d7092437d6dc25874d2cdf3f21dc55) for the full code.

<a id="markdown-create-the-form-object" name="create-the-form-object"></a>

## Create the form object

```bash
php artisan make:form CourseForm
```

<a id="markdown-define-the-form-object-properties-and-validation-rules" name="define-the-form-object-properties-and-validation-rules"></a>

## Define the form object properties and validation rules

From Livewire 3, you can use the `Validate` attribute to validate the form object properties,
however you can still use the `rules()` method if you prefer. Importing the `Rule` object is only
necessary when dealing with custom or intricate validation rules.

```php
<?php

namespace App\Livewire\Forms;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CourseForm extends Form
{
    public Course $course;

    #[Validate('required|max:255')]
    public string $name;
     #[Validate('sometimes|regex:/^\d+(\.\d{2})?$/')]
    public float|string $price; // uses MoneyCast::class
    #[Validate('sometimes')]
    public string $description;
    public string $code;

    public function rules(){
        return [
            'code' => ['required', Rule::unique('courses')->ignore($this->course)],
        ];
    }
}
```

In the example above, you will notice `#[Validate('sometimes')]` is used for the `description`,
this forces the field to run through the validation process even through it is not required and
does not need to be validated.

This means the field will be in the `validated` data array, when you call the `validated()` method.


<a id="markdown-setmodel-set-the-model-instance-and-initialise-properties" name="setmodel-set-the-model-instance-and-initialise-properties"></a>

## `setModel` (set the model instance and initialise properties)

The `setModel` method is used to set the model instance for the form and initialise the form
object properties. If you are editing an existing record, the model instance is passed in via the
`mount` method in the `CreateEdit` component. This model instance would contain the data of the
record you are editing.

If you are creating a new record, there is no existing data, so you would need to pass in a new,
empty instance of the `model` to the `setModel` method.

If the `model` instance is null (as when creating a new record), accessing its properties would
cause an error. To avoid this, we use the  null coalescing operator (??) to set the properties to
an empty string.

```php
public function setModel(Course $course): void
{
    $this->course = $course;
    $this->name = $this->course->name ?? '';
    $this->code = $this->course->code ?? '';
    $this->price = sprintf("%.2f", $this->course->price);
}
```

<a id="markdown-create-refer-to-createedit-component" name="create-refer-to-createedit-component"></a>

## `create` (refer to CreateEdit component)

The `create` method is handled by by `CreateEdit` component.

<a id="markdown-edit-refer-to-createedit-component" name="edit-refer-to-createedit-component"></a>

## `edit` (refer to CreateEdit component)

The `edit` method is handled by by `CreateEdit` component.

<a id="markdown-update-validate-the-form-object-properties-and-persist-changes" name="update-validate-the-form-object-properties-and-persist-changes"></a>

## `update` (validate the form object properties and persist changes)

The `update` method is fired from the `CreateEdit` component when the user clicks the submit button.

```php
public function update(): void
{
    $this->validate();
    $this->course->name = $this->name;
    $this->course->code = $this->code;
    $this->course->price = $this->price;
    $this->course->description = $this->description;
    $this->course->status = $this->status;
    $this->course->save();
}
```

<a id="markdown-things-worth-noting" name="things-worth-noting"></a>

## Things worth noting

Here are some things worth noting that you will see throughout this example:

- The `price` field uses Gotime's `MoneyCast::class` to convert between dollars (float) and cents
  (int) when getting and setting the value, and the form object uses PHP's `number_format` method
  to format the value with two decimal places.
- The `published_at` field uses Gotime's `DateCast::class` to convert between a datetime string to
  a human readable date.
