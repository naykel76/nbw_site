# WithFormActions Trait

- [Introduction](#introduction)
- [Properties](#properties)
    - [`modelClass`](#modelclass)

## Introduction

The `WithFormActions` trait acts as a bridge between the Livewire component and a Livewire
form object, which uses the `Formable` and `Crudable` traits.

While `Formable` and `Crudable` handle the form's internal logic—such as managing form
properties, creating, editing, and saving models—`WithFormActions` provides helper methods
in the Livewire component that interact with these form actions. This trait streamlines
tasks like creating, editing, saving, and deleting models, as well as handling modal
dialogs and form initialisation.

By integrating these traits, `WithFormActions` allows the Livewire component to easily
leverage the form object’s functionality, enabling more maintainable and concise code.

## Properties

### `modelClass`

When using the `WithFormActions` trait in your component class, define the primary
model resource via the `modelClass` property.

This centralises model references, allowing the trait to handle model binding and CRUD
operations, resulting in cleaner, more maintainable code and reducing errors.

```php +code
use App\Models\Model;

protected string $modelClass = Model::class;
```