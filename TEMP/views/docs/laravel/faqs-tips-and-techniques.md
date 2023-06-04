

##  How can I create a dropdown with options defined in the model?


Add an array of values in `model.php`

```php
const STATUSES = [
    'success' => 'Success',
    'failed' => 'Failed',
    'processing' => 'Processing',
];
```

Display options in a view

```html
<x-gt-select wire:model.defer="editing.layout" for="editing.layout" label="Layout" placeholder="Please Select...">
    @foreach (App\Models\Model::STATUSES as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</x-gt-select>
```

In a Livewire component you can validate that the value exists in the list.

```php
'editing.status' => 'required|in:'.collect(Model::STATUSES)->keys()->implode(',')
```




