# Managing CRUD with Gotime and Livewire

- [Managing CRUD with Gotime and Livewire](#managing-crud-with-gotime-and-livewire)
    - [Understanding How the Form Model is Accessed](#understanding-how-the-form-model-is-accessed)
    - [Why Use the `$modelClass` Property?](#why-use-the-modelclass-property)
    - [When Using Route Model Binding or a Standalone Component](#when-using-route-model-binding-or-a-standalone-component)
      - [When Using Form and Action Buttons on the Same Page](#when-using-form-and-action-buttons-on-the-same-page)
    - [Setting Default Values](#setting-default-values)
      - [Method 1: Direct Model Instantiation (component)](#method-1-direct-model-instantiation-component)
      - [Method 3: Setting the initialData array](#method-3-setting-the-initialdata-array)
      - [Which Method to Use?](#which-method-to-use)
  - [Step 3: Add the Form to the View](#step-3-add-the-form-to-the-view)
  - [Action Buttons (TBD)](#action-buttons-tbd)
  - [TLDR](#tldr)

There are two primary approaches for implementing CRUD functionality in Livewire:

1. **Integrating CRUD into an Existing Component**  
   - This is ideal when you have an existing component (e.g., a table or list) and want to
     add form functionality for creating or editing records. The form is typically
     triggered via modals, inline forms, or similar methods.

2. **Creating a Standalone Component**  
   - This is used when the CRUD functionality is housed within a dedicated component,
     often displayed on its own page via a route. It's particularly useful when the form
     has more complex requirements or when the form is the main focus of the page.

### Understanding How the Form Model is Accessed

Regardless of the approach, how the form is accessed and displayed will influence how the
form object is initialized and how actions are triggered. Common scenarios include:

- **Form and Action Buttons on the Same Page**: 
  
    The form is integrated directly into the same component (e.g., a table or list), with
    action buttons such as "Edit" or "Delete" for each item. When these buttons are
    clicked, the form object is set to the corresponding model, and the form is displayed
    for editing or deletion. This form is typically shown in a modal.

- **When the Model is Passed Via Prop or Route Model Binding**:

  The form is part of a separate page or component, and the model is typically set when
  the component is rendered either through route model binding or passed as a prop. In
  this case, the form is displayed independently, and actions are triggered within the
  context of that specific component.


### Why Use the `$modelClass` Property?

The `$modelClass` property is used to specify the primary model that the component
interacts with. This is important because it tells the `WithFormActions` trait which model
to perform actions (such as create, update, or delete) on.



### When Using Route Model Binding or a Standalone Component

If the model is provided via route model binding or passed as a prop, you need to
manually initialise the form object in the `mount()` method by passing an existing
model or creating a new one.



#### When Using Form and Action Buttons on the Same Page

No additional initialisation code is needed unless you need to set default values. The
`WithFormActions` trait automatically initialises the form object when calling `create()`
or `edit()`.

### Setting Default Values

When creating a new model, you may need to set default values. This can be handled in
different ways, depending on how the form is initialised.  

There are multiple ways to set default values when creating a new model:

1. Directly in the model instantiation
2. Using form objects `createNewModel` method

#### Method 1: Direct Model Instantiation (component)

Set default values when creating the model:

```php
$model = new User(['role' => 'user']);
$this->form->init($model);
```




```php
// component's mount method
public function mount()
{
    $model = $this->form->createNewModel(['status' => 'active']);
    $this->form->init($model);
}
```  

#### Method 3: Setting the initialData array

When creating a new model, the `createNewModel` method will look for an `initialData`
array to set default values. This is useful when you want to set default values in a
centralized way.

If you need to dynamically set `initialData` values, you can create a method to set the
values and then call the `create` method.

```php
public function setInitialData(string $type)
{
    $this->initialData = ['type' => $type];
    $this->create();
}
```

```html
<x-gt-button wire:click="setInitialData('iblce_exam')" />
```

#### Which Method to Use?

All approaches achieve the same result—initialising a new model with default values.

- Use direct model instantiation when setting defaults inline within the component.
- Use `createNewModel()` when you want to centralise model creation logic inside the form
  object, keeping concerns separate and ensuring consistency.

## Step 3: Add the Form to the View 

With the form object initialized, the next step is to display the form fields for creating
or editing the model and bind them to the form object.

This step involves creating the form and adding the form fields. The process is the same
for both full-page and modal usage, with no difference in implementation. The only
distinction is how the form object’s initial state is set and how the form is displayed.

**NOTE**: The form fields are bound to the form object using the `wire:model` directive.
Ensure that the form object property is prefixed with `form.`.

```html
<form wire:submit="save">
    <x-gt-input wire:model="form.name" label="name" />
    <x-gt-input wire:model="form.email" label="email" />
    <div class="tar">
        <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
        <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
    </div>
</form>
```

## Action Buttons (TBD)

Action buttons trigger form actions like `create`, `edit`, `save`, and `delete` The
implementation of these buttons depends on the context in which the form is used.

Buttons can:

- Trigger routes
- Call methods within the component
- Dispatch events to other components



```html
<x-resource-action-button wire:click="edit({{ $question->id }})" action="edit" />
<x-resource-action-button wire:click="create" action="create" text="Add" />
```



<!-- <x-resource-action-link action="show" :slug="$course->slug" routePrefix="courses" target="_blank" />
<x-resource-action-link action="edit" :id="$course->id" :$routePrefix /> -->


## TLDR

- **Step 1**: Add the form to an existing or new component.
- **Step 2**: Add the `form` property and initialise the form object.
- **Step 3**: Add the form to the view.
- **Step 4**: Add action buttons to trigger form actions.
- Override `WithFormActions` methods as needed.

