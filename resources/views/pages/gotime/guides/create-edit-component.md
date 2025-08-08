# Gotime: Create and Edit Components

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Quick Checklist](#quick-checklist)
- [Creating the Component and Initial Setup](#creating-the-component-and-initial-setup)
    - [Required Properties and Traits](#required-properties-and-traits)
- [Initialising the Form](#initialising-the-form)
    - [Route-based Initialisation (e.g. via route model binding)](#route-based-initialisation-eg-via-route-model-binding)
    - [Event-driven initialization (**REVIEW**)](#event-driven-initialization-review)
    - [Parent component data (**REVIEW**)](#parent-component-data-review)
    - [Setting Default Values](#setting-default-values)
        - [Method 1: Pass Defaults Directly](#method-1-pass-defaults-directly)
        - [Method 2: Use the `initialData` Property](#method-2-use-the-initialdata-property)
- [Adding the Form to the View](#adding-the-form-to-the-view)
- [FAQs](#faqs)

## Introduction

This guide shows how to build Livewire components for creating and editing
records using Gotime form objects. It covers component setup, form
initialisation, setting default values, and binding the form to your view. You
will learn how to structure a component that handles both create and edit
scenarios efficiently.

```html +parse
<x-gt-alert type="warning">
This document references custom VS Code snippets like
<code>gtlc:form-class</code> and <code>gtlc:form-object</code> that generate
boilerplate code for common patterns. These are not available by default but can
be added as custom snippets to speed up development.
</x-gt-alert>
```

## Prerequisites

Requires the `Gotime` package to be installed and configured in your
application. This guide assumes you have a basic understanding of Livewire and
Laravel.

## Quick Checklist

1. Create the Livewire component (`php artisan livewire:make CreateEditPost`)
2. Add the form object, traits, and properties (`gtlc:form-class`)
3. Initialise the form object with a model instance
4. Bind the form to the view with `wire:model="form.property"`
5. Add form inputs and submit/cancel buttons
6. Test both create and edit functionality

## Creating the Component and Initial Setup

From the command line, run:

```bash +torchlight-bash
php artisan livewire:make CreateEditPost
```

### Required Properties and Traits

Add the form object and model class properties to your component:

```php +torchlight-php
use WithFormActions;

public PostFormObject $form;
protected string $modelClass = Post::class;
```

- `WithFormActions` trait acts as a bridge between the Livewire component and a
  Livewire form object
- `$form` is the form object that handles the form logic
- `$modelClass` is the primary model resource for CRUD operations

## Initialising the Form

Form objects must be initialised by calling `init()` and passing a model 
instance. This instance can be a new model (for creating) or an existing one 
(for editing). The initialisation approach depends on your component's context 
and how it receives data.

### Route-based Initialisation (e.g. via route model binding)

When using route model binding, the model instance is passed to the `mount()`
method. You can initialise the form with this model directly:

**Note**: To handle both create and edit scenarios, you can make the model
parameter optional and provide a fallback for when no model is passed. In this
case we will create a new model instance using the `createNewModel()` method.

```php +torchlight-php
public function mount(?Post $post)
{
    $model = $post ?? $this->form->createNewModel();
    $this->form->init($model);
}
```

### Event-driven initialization (**REVIEW**)

For modals or dynamic components, initialize via Livewire events:

```php +torchlight-php
#[On('openCreateModal')]
public function initializeCreate(): void
{
    $model = $this->form->createNewModel(['user_id' => auth()->id()]);
    $this->form->init($model);
}

#[On('openEditModal')]
public function initializeEdit(int $postId): void
{
    $post = Post::findOrFail($postId);
    $this->form->init($post);
}
```

### Parent component data (**REVIEW**)

When receiving data from a parent component:

```php +torchlight-php
public function mount(?array $postData = null, ?int $postId = null)
{
    if ($postId) {
        $model = Post::find($postId);
    } else {
        $defaults = array_merge(['status' => 'draft'], $postData ?? []);
        $model = $this->form->createNewModel($defaults);
    }
    
    $this->form->init($model);
}
```

### Setting Default Values

The `createNewModel()` method generates a new model instance for your form. It
accepts an optional array of default attributes and is provided by the
`WithFormActions` trait.

There are two main ways to set defaults when creating a new model:

#### Method 1: Pass Defaults Directly

Specify defaults inline when creating the model:

```php +torchlight-php
$model = $this->form->createNewModel(['published_at' => now()]);
```

#### Method 2: Use the `initialData` Property

Set defaults on the component that the form object will merge when creating a
new model:

```php +torchlight-php
public function mount(?Post $post)
{
    $this->initialData = ['status' => now()];
    $model = $post ?? $this->form->createNewModel();
    $this->form->init($model);
}
```

## Adding the Form to the View

<!-- this will need to include the different ways to initialise -->
<!-- for -->

Bind inputs to the form object with `wire:model="form.property"` and handle
submit/cancel:

```html +torchlight-blade
@verbatim
<form wire:submit="save">
    <x-gt-input wire:model="form.title" label="Title" />
    <x-gt-textarea wire:model="form.content" label="Content" />
    <div class="tar">
        <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
        <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
    </div>
</form>
@endverbatim
```





## FAQs

<question>Why use the `$modelClass` property?</question>

The `$modelClass` property tells the `WithFormActions` trait which Eloquent model
to use for CRUD operations. This avoids hard-coding the model type, making your
component more maintainable and reusable.

<question>When Should I Use the `initialData` Property?</question>

Use `initialData` when default values depend on user context, route parameters,
or other dynamic data that isn't known at compile time.












<pre class="mermaid light">
sequenceDiagram
    actor User
    participant M as mount()
    participant model as Model
    participant form as FormObject
    participant R as render()

    User->>M: Clicks 'Create' button
    activate M
    M->>M: Calls mount(Model)
    alt Model not found
        M->>model: Create new Model
    end
    activate model
    model-->>M: Return Model
    deactivate model
    M->>form: Calls setModel(Model)
    activate form
    form-->>M: Model set
    deactivate form
    M->>M: Calls setPageTitle()
    M->>R: Calls render()
    activate R
    R-->>User: Display form with Model details
    deactivate R
    deactivate M
</pre>