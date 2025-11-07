# Select

- [Control Group](#control-group)
    - [Multi-Select](#multi-select)
    - [Error Handling](#error-handling)
- [FAQ's](#faqs)
    - [How do I bind to a Livewire property?](#how-do-i-bind-to-a-livewire-property)
    - [How do I define Livewire validation rules?](#how-do-i-define-livewire-validation-rules)



It is best not to type hint when using the select, otherwise it many not work as
expected when the values is `null` instead of `""` empty string.

---

## Control Group

```html +torchlight-blade
@verbatim<x-gt-select wire:model="country" :options="$countries" />@endverbatim
```

```html +parse
<div class="maxw-sm">
    <livewire:gotime.components.select variant="control-group" />
</div>
```

---

### Multi-Select

Add the `multiple` attribute to the select element to allow multiple options to
be selected.

Hold down the `Ctrl` key to select multiple options.

```html +parse
<div class="maxw-sm">
    <livewire:gotime.components.select variant="control-group-multi-select" />
</div>
```

```html +torchlight-blade
@verbatim<x-gt-select wire:model="country" :options="$countries" multiple />@endverbatim
```

### Error Handling

```html +parse
<div class="maxw-sm">
    <livewire:gotime.components.select variant="control-group-with-error" />
</div>
```

## FAQ's

### <question>How do I bind to a Livewire property?</question>

When using the `select` component with Livewire form objects, you can bind the
select element to a property on the form object using the `wire:model`
attribute. There is no magic here, just standard Livewire binding.

```php +code
public $countries = [ 'AU' => 'Australia', 'CA' => 'Canada', 'NZ' => 'New Zealand' ];
public $country = 'NZ';

@verbatim<x-gt-select wire:model="form.country" label="country" :options="$countries" />@endverbatim
```

```html +parse
<x-gt-alert type="warning">
    When binding to a Livewire property, ensure that you initialise the property with an empty string.
    Otherwise, the placeholder will be disregarded, and the first option will be automatically selected.
</x-gt-alert>
```


### <question>How do I define Livewire validation rules?</question>

```php +code
#[Validate]
public string $department = '';

protected function rules()
{
    return [
        'department' => 'in:' . implode(',', array_keys(Product::DEPARTMENTS)),
    ];
}
```
