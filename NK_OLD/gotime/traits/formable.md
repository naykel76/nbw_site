# Formable

- [Introduction](#introduction)
- [Properties](#properties)
  - [`editing`](#editing)
- [Methods](#methods)
  - [`setFormProperties(Model $model): void`](#setformpropertiesmodel-model-void)
- [Spit Balling](#spit-balling)
  - [Ways to initialise form properties when creating a new model](#ways-to-initialise-form-properties-when-creating-a-new-model)

## Introduction


The `Formable` trait provides functionality to manage form properties for a given model in a
Livewire form object. It is designed to handle common form tasks such as setting form properties,
including the model being edited.

## Properties

### `editing`

The `editing` property represents the model being edited or a new instance being created. 

```html +parse
<x-gt-alert type="warning">
    This property only reflects the model's state when initially set or after saving the form. It does
    not update to reflect changes made during form editing.
</x-gt-alert>
```

## Methods

### `setFormProperties(Model $model): void`

The `setFormProperties` method is used in the form object's `init` method to populate the form
fields with the model's data. This method accepts the `model` parameter passed to the `init` method
and sets the form properties to the corresponding values if the property exists in the form object.

It is important to note that this method will only set values for properties where the values are set
in the model which can be a problem when creating a new model as the properties will not be set. The
solution is initialise required properties when creating a new `Model`.

## Spit Balling

### Ways to initialise form properties when creating a new model

Creating a model using a factory can be a good way to initialise the form properties. This is 
especially useful when creating a new model as the properties will be set.

To override the default factory state, you can pass an array of attributes to the factory method
like any other factory.


```html +parse
<x-gt-alert type="danger" title="IMPORTANT">
This method will only set values for properties where the values are set in the model. This is a
problem when creating a new model as the properties will not be set. The solution is to create a
factory state and initialise all the fields with public properties.

Alternatively, you can manually set the form properties in the form object's `init` method.
</x-gt-alert>
```

adding `createNewModel` method and setting default values in form object is a good way to initialise
the form properties because it eliminates the need to manually set the properties in the component
mount method making it re-usable.

You can override the default values by passing in an array of attributes to the `createNewModel`

```php
public function createNewModel(array $data = []): ToDo
{
    $model = ToDo::factory()->make(array_merge([
        'name' => '',
        // this is a temporary solution to set the user_id
        'user_id' => User::first()->id,
    ], $data));

    return $model;
}
```