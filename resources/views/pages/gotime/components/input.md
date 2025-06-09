# Input

- [Overview](#overview)
- [Basic Usage](#basic-usage)
    - [Control Group](#control-group)
    - [Control Only](#control-only)

## Overview

The `input` component is a flexible and reusable element for building form
fields. It supports configurable labels, help text, error messages, and slots
for layout control.



## Basic Usage

----------

### Control Group

```html +parse
<div class="grid cols-2">
    <livewire:gotime.components.input variant="control-group" />
    <livewire:gotime.components.input variant="control-group-with-error" />
</div>
```

----------

### Control Only

```html +parse
<div class="grid cols-2">
    <livewire:gotime.components.input variant="control-only" />
    <livewire:gotime.components.input variant="control-only-with-error" />
</div>
```




----------

```html +parse
<div class="grid cols-2">
    <livewire:gotime.components.input variant="control-group" />
    <livewire:gotime.components.input variant="control-group-with-error" />
</div>
```

In all of these examples, I am using for, but in reality, you can use `for` or
`wire:model` to bind the input to a property in your Livewire component.

This allows us to cater for both Laravel and Livewire usage.

```html +parse
<div class="grid cols-2">
    <x-gt-input.password for="password" label="Password" />
</div>
```







