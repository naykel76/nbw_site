# Create Edit Component

- [Introduction](#introduction)
- [TLDR (quick checklist)](#tldr-quick-checklist)
- [Step 1: Create the Component](#step-1-create-the-component)
- [Step 2: Component Class Initial Setup](#step-2-component-class-initial-setup)
- [Step 3: Initialise the Form Object](#step-3-initialise-the-form-object)
- [Adding the Form to the View](#adding-the-form-to-the-view)
- [FAQs](#faqs)


## Introduction

This guide shows how to build Livewire components for creating and editing
records using form objects. It explains how to initialize form data, set default
values, and structure a component that handles both create and edit
functionality.

## TLDR (quick checklist)

1. Add the form object, traits, and properties. (`gtlc:form-class`)
3. Initialize the form with a model instance in the `mount()` method
4. 
5. Bind the form to the view with `wire:model="form.property"`
6. Add form inputs and submit/cancel buttons
7. Test both create and edit functionality

## Step 1: Create the Component

From the command line, run:

```bash +torchlight-bash
php artisan livewire:make CreateEditComponent
```

## Step 2: Component Class Initial Setup

After creating the component, update the component class to include the required
traits and properties. 

<!-- incomplete WIP -->
```php
public PostFormObject $form;
protected string $modelClass = Post::class;
```

## Step 3: Initialise the Form Object

Call the form’s `init()` method in `mount` with a model instance. This supports both creating and editing records.

```php +torchlight-php
public function mount(?Post $post)
{
    $model = $post ?? $this->form->createNewModel(['published_at' => now()]);
    $this->form->init($model);
}
```

<!-- i am not sure this is necessary -->
<!-- 
### Setting Default Values

There are two main ways to set defaults when creating a new model:

#### Method 1: Pass Defaults Directly

Specify defaults inline when creating the model:

```php +torchlight-php
$model = $this->form->createNewModel(['status' => 'active']);
```

#### Method 2: Use the `initialData` Property

Set defaults on the component that the form object will merge when creating a
new model:

```php +torchlight-php
public function mount(?Post $post)
{
    $this->initialData = ['status' => 'active'];
    $model = $post ?? $this->form->createNewModel();
    $this->form->init($model);
}
``` -->

## Adding the Form to the View

Bind inputs to the form object with `wire:model="form.property"`.

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
