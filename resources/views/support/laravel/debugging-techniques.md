# Laravel - Debugging Techniques

## Dumping Variables in Blade

```html +parse-code
<x-torchlight-code language="blade">
    <pre>@{{ json_encode($properties, JSON_PRETTY_PRINT) }}</pre>
</x-torchlight-code>
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