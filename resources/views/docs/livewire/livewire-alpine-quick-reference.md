# Livewire Alpine Quick Reference

## Sharing state using `$wire.entangle`

Livewire's entangle creates a two-way data binding between a Livewire property and Alpine data.


```html
<div x-data="{ open: $wire.entangle('showDropdown') }">
    <button x-on:click="open = false">Close</button>
    <div x-show="open"></div>
</div>
```

### Dynamic Entanglement

`$wire.entangle` expects a string property name, so it will not work with `$attributes->wire('model')`.

The solution is to go back tu using the `@entangle` directive.

<div x-data="{ open: @entangle($attributes->wire('model')) }">
    <button x-on:click="open = false">Close</button>
    <div x-show="open"></div>
</div>