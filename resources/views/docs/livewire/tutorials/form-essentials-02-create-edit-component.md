# Livewire Form Essentials - CreateEdit Component

<!-- TOC -->

- [Introduction](#introduction)
- [Create the Livewire component](#create-the-livewire-component)
- [Define the component properties and import the form object](#define-the-component-properties-and-import-the-form-object)
- [Component Methods](#component-methods)
    - [`mount` (set the form object model instance)](#mount-set-the-form-object-model-instance)
    - [`create` ()](#create-)
    - [`edit` (calls the form object 'edit' method to set)](#edit-calls-the-form-object-edit-method-to-set)
    - [`save` (calls the form object 'save' method to save or create a new record)](#save-calls-the-form-object-save-method-to-save-or-create-a-new-record)
- [Things worth noting](#things-worth-noting)
- [`create` (set an empty model instance)](#create-set-an-empty-model-instance)
- [Additional resources and source code](#additional-resources-and-source-code)
- [Trouble shooting](#trouble-shooting)

<!-- /TOC -->
<a id="markdown-introduction" name="introduction"></a>

## Introduction

In this example, we will walk through the steps of creating a Livewire component for creating and
editing a course. This component will use a form object to handle the form data and validation.

<a id="markdown-create-the-livewire-component" name="create-the-livewire-component"></a>

## Create the Livewire component

```bash
php artisan make:livewire Course/CreateEdit
```

<a id="markdown-define-the-component-properties-and-import-the-form-object" name="define-the-component-properties-and-import-the-form-object"></a>

## Define the component properties and import the form object

```php
<?php

namespace App\Livewire\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Livewire\Component;

class CreateEdit extends Component{

    public CourseForm $form;

}
```

<a id="markdown-component-methods" name="component-methods"></a>

## Component Methods

<a id="markdown-mount-set-the-form-object-model-instance" name="mount-set-the-form-object-model-instance"></a>

### `mount` (set the form object model instance)

```php
public function mount() {
    $course = Course::first();
    $this->form->setModel($course);
}
```

### `create` ()


<a id="markdown-edit-calls-the-form-object-edit-method" name="edit-calls-the-form-object-edit-method"></a>

### `edit` (calls the form object 'edit' method to set)

```php
public function edit(int $id){
    $this->form->edit($id);
}
```

<!--
- `resetErrorBag()` clears any previous error messages when you are editing a model and the form
  has validation errors. If you don't clear the error bag, the error messages will persist.
- #[On] attribute is used to listen for the `edit` event to be dispatched from the `Table`
  component when the user clicks the edit button.

Make sure you import the `On` attribute.

```php
use Livewire\Attributes\On;

#[On('edit')]
public function edit(int $id){
    $this->resetErrorBag();
    $this->setModel(Course::findOrFail($id));
}
``` -->

<a id="markdown-save-calls-the-form-object-save-method-to-save-or-create-a-new-record" name="save-calls-the-form-object-save-method-to-save-or-create-a-new-record"></a>

### `save` (calls the form object 'save' method to save or create a new record)

- `dispatch` the `notify` event with a message.

```php
public function save(){
    $this->form->update();
    $this->dispatch('notify', ('Saved!'));
}
```

<a id="markdown-things-worth-noting" name="things-worth-noting"></a>

## Things worth noting

Use a `submit` button to submit the form when the enter key is pressed, or add `.prevent` to the
`wire:click` directive to prevent the form from submitting when the enter key is pressed.

```html
<form wire:submit="save">
    ...
    <button type="submit" class="btn primary">Save</button>
</form>
```
```html
<form wire:submit.prevent="save">
    ...
    <button type="submit" class="btn primary">Save</button>
</form>
```


-
-
-
-
-
## `create` (set an empty model instance)

There is no create method in this example. This is handled in the `CreateEdit` component.

```php
$this->form->setModel(new Course);
```

-
-
-
-
-
-
-
-
-


<a id="markdown-additional-resources-and-source-code" name="additional-resources-and-source-code"></a>

## Additional resources and source code

- <a href="https://github.com/naykel76/dev_crud/commit/712004bf7fb840a29acf4362790499097a345df6" target="blank">Initial setup</a>

If you are dispatching events from the parent component to the child component, then it's best to
encapsulate the modal in the child component. This is because the child component is already aware
of the action and can easily handle the modal state.

- `#[On('add')]` and `#[On('edit')]` are used to trigger the `add` and `edit` methods when the
  corresponding events are dispatched from the parent component.

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble shooting

When using the `dispatchTo` method to invoke a method in a child component make
sure you use `kebab-case` for the component name. Also make sure
you wrap any parameters in culey braces `{}`. For example:

```php
$dispatchTo('child-component', 'method', { id: 427 })

$dispatchTo('user-create-edit', 'edit', {id: {{ $user->id }}})
```
