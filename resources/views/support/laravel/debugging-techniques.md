# Laravel - Debugging Techniques

## Dumping Variables in Blade

```html +parse-code
<x-torchlight-code language="blade">
    <pre>@{{ json_encode($properties, JSON_PRETTY_PRINT) }}</pre>
</x-torchlight-code>
```

### Selected Form Values

```php +code
@php
    use Illuminate\Support\Arr;
    $only = Arr::only($form->toArray(), ['name', 'code']);
    $except = Arr::except($form->toArray(), ['editing', 'tmpUpload']);
@endphp
<pre>{{ json_encode($only, JSON_PRETTY_PRINT) }}</pre>
<pre>{{ json_encode($except, JSON_PRETTY_PRINT) }}</pre>
```

## Send Error to Log

@php
    // Debug: Check if $for is an array before using it
    if (is_array($for)) {
        \Log::error('Control-checkbox component received array for $for', [
            'for_value' => $for,
            'label' => $label ?? 'not set'
        ]);
        throw new Exception('The $for variable in control-checkbox is an array: ' . json_encode($for));
    }
@endphp