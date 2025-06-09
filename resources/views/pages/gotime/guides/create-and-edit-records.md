# Create and Edit Records

- [Introduction](#introduction)
- [Initialising the Form](#initialising-the-form)
    - [Add the Form Property](#add-the-form-property)
    - [Create a New Model Instance](#create-a-new-model-instance)
    - [Use an Existing Model](#use-an-existing-model)
- [Setting Default Values](#setting-default-values)
    - [Method 1: Pass Defaults Directly](#method-1-pass-defaults-directly)
    - [Method 2: Use the `initialData` Property](#method-2-use-the-initialdata-property)
- [Adding the Form to the View](#adding-the-form-to-the-view)
- [FAQs](#faqs)

## Introduction

This guide explains how to create and edit records using Livewire components
with form objects. It covers how to initialise form data, set default values,
and bind the form to the view. You can apply these patterns in modals, inline
forms, or standalone pages.

## Initialising the Form

Form objects must be initialised by calling `init()` and passing a model
instance. This instance can be a new model (for creating) or an existing one
(for editing).

### Add the Form Property

```
public PostFormObject $form;
```

### Create a New Model Instance

Use `createNewModel()` to generate a new model instance, optionally passing
default attributes:

```php +torchlight-php
public function mount()
{
    $model = $this->form->createNewModel(['status' => 'active']);
    $this->form->init($model);
}
```

### Use an Existing Model

If the component receives a model (e.g. via route model binding), initialise the
form with it:

```php +torchlight-php
public function mount(Post $post)
{
    $this->form->init($post);
}
```

Or provide a fallback for optional models:

```php +torchlight-php
public function mount(?Post $post)
{
    $model = $post ?? $this->form->createNewModel(['status' => 'active']);
    $this->form->init($model);
}
```

## Setting Default Values

There are two main ways to set defaults when creating a new model:

### Method 1: Pass Defaults Directly

Specify defaults inline when creating the model:

```php +torchlight-php
$model = $this->form->createNewModel(['status' => 'active']);
```

### Method 2: Use the `initialData` Property

Set defaults on the component that the form object will merge when creating a
new model:

```php +torchlight-php
public function mount()
{
    $this->initialData = ['status' => 'active'];
    $model = $this->form->createNewModel();
    $this->form->init($model);
}
```

Use this when defaults depend on context or external inputs.

## Adding the Form to the View

Bind inputs to the form object with `wire:model="form.property"` and handle
submit/cancel:

```html +torchlight-blade
@verbatim
<form wire:submit="save">
    <x-gt-input wire:model="form.title" label="title" />
    <div class="tar">
        <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
        <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
    </div>
</form>
@endverbatim
```

## FAQs

<question>Why Use the `$modelClass` Property?</question>

The `$modelClass` property tells the `WithFormActions` trait which model to act
on for create, update, or delete operations.
