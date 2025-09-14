# Formable Trait

- [Overview](#overview)
- [Properties](#properties)
    - [`$editing`](#editing)
- [Methods](#methods)
    - [`setFormProperties(Model $model): void`](#setformpropertiesmodel-model-void)
- [Usage](#usage)
- [Best Practices](#best-practices)
    - [Property Defaults](#property-defaults)
    - [Type Hints](#type-hints)

The `Formable` trait provides utilities for Livewire form objects to
automatically populate properties from Eloquent models with proper type casting.

## Overview

This trait simplifies the process of initialising form properties from model
data, handling type casting automatically based on property type hints. It's
particularly useful in Livewire 3 where model binding requires manual property
initialisation.

## Properties

### `$editing`

```php +torchlight-php
public ?Model $editing;
```

Holds a reference to the model being edited or created. This property:
- Reflects the model's state when initially set or after saving
- Does not auto-sync with form changes
- Can be `null` when creating new records

## Methods

### `setFormProperties(Model $model): void`

Automatically sets form properties from the given model's attributes, applying
type casting based on property type hints.

**Key points:**
- Only properties with matching model attributes are updated
- When creating a new model (with no attributes set), form properties retain
  their default values
- Always set default values on your form properties to ensure sensible fallbacks

**Parameters:**
- `$model` - The Eloquent model to copy attributes from

**Type casting:**
- Integer properties: Casts values to integers, empty strings become `null`
- Other types: Uses the model value directly, with empty string fallback for
  `null` values

## Usage

```php +torchlight-php
use Naykel\Gotime\Traits\Formable;
use Livewire\Form;

class ProductFormObject extends Form
{
    use Formable;

    public string $name = '';
    public string $description = '';
    public int $price = 0;
    public ?int $category_id = null;

    public function init(Product $product): void
    {
        $this->editing = $product;
        $this->setFormProperties($product);
    }
}
```

## Best Practices

### Property Defaults

Always set sensible defaults on form properties:

```php +torchlight-php
public string $name = '';           // ✅ Good
public ?string $description = null; // ✅ Good  
public int $price;                  // ❌ Bad - uninitialised
```

### Type Hints

Use type hints on all form properties for proper casting:

```php +torchlight-php
public string $title = '';    // ✅ Will be set directly
public int $count = 0;        // ✅ Will be cast to integer
public $untyped = '';         // ⚠️ No casting, fallback behavior
```
