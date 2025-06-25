# Select

- [Basic Usage](#basic-usage)
    - [Control Group](#control-group)
    - [Control Only](#control-only)
- [REVIEW](#review)
- [Setting the selected value](#setting-the-selected-value)
- [Multi-select Options](#multi-select-options)
- [Techniques](#techniques)
    - [Using with Livewire Form Objects](#using-with-livewire-form-objects)


## Basic Usage

----------

### Control Group

```html +parse
<div class="grid cols-2">
    <livewire:gotime.components.select variant="control-group" />
    <livewire:gotime.components.select variant="control-group-with-error" />
</div>
```

```html
@verbatim
<x-gt-select wire:model="country" :options="$countries" />
@endverbatim
```

----------

### Control Only

```html +parse
<div class="grid cols-2">
    <livewire:gotime.components.select variant="control-only" />
    <livewire:gotime.components.select variant="control-only-with-error" />
</div>
```

```html +torchlight-blade
@verbatim
<x-gotime::v2.input.controls.select wire:model="country" :options="$countries" />
@endverbatim
```

----------

## REVIEW

You can specify select options in two ways. 

The first is by passing an `options` array of key-value pairs, where each key is
the option's value and each value is the display text. 

When `setting wire:model`, there is no need to specify the `for` attribute, as the
component will automatically bind to the specified property.


Alternatively you can iterate over the options directly within the component view.

```html
<x-gt-select for="size">
    @foreach($sizes as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</x-gt-select>
```

```html +parse
<x-gt-alert type="warning">
    When binding to a Livewire property, ensure that you initialise the property with an empty string.
    Otherwise, the placeholder will be disregarded, and the first option will be automatically selected.
</x-gt-alert>
```

## Setting the selected value

```html +parse
<livewire:gotime.components.select />
```

```php +torchlight-php
public $countries = [ 'AU' => 'Australia', 'CA' => 'Canada', 'NZ' => 'New Zealand' ];
public $country = 'NZ'; 

<x-gt-select wire:model="country" label="country" :options="$countries" />
```

## Multi-select Options

Add the `multiple` attribute to the select element to allow multiple options to be selected.

Hold down the `Ctrl` key to select multiple options.

```html +parse
<livewire:gotime.components.select multiple/>
```

```html
<x-gt-select wire:model="country" label="country" :options="$countries" multiple />
```

## Techniques

### Using with Livewire Form Objects

When using the `select` component with Livewire form objects, you can bind the select
element to a property on the form object using the `wire:model` attribute.

```html +parse
<livewire:gotime.components.select />
```

```php +torchlight-php
public $countries = [ 'AU' => 'Australia', 'CA' => 'Canada', 'NZ' => 'New Zealand' ];
public $country = 'NZ';

<x-gt-select wire:model="form.country" label="country" :options="$countries" />
```

```php +torchlight-php
<x-gt-select wire:model="form.type" label="Event Type" 
    :options="$this->modelClass::EVENT_TYPES"/>
```