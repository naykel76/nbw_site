# Laravel Datetime Picker with Livewire and Alpine.js using Flatpickr

- [Overview](#overview)
- [Adding Flatpickr](#adding-flatpickr)
    - [Install via npm](#install-via-npm)
    - [Use the CDN](#use-the-cdn)
- [Creating a Datepicker](#creating-a-datepicker)
- [Adding Livewire integration and two-way binding](#adding-livewire-integration-and-two-way-binding)
- [Separating the Alpine Script from the HTML](#separating-the-alpine-script-from-the-html)
- [Additional Resources](#additional-resources)
- [TL:DR](#tldr)
    - [Pikaday vs Flatpickr with Livewire](#pikaday-vs-flatpickr-with-livewire)

## Overview

How to create a datepicker in Laravel with Livewire and Alpine.js using Flatpickr.

## Adding Flatpickr

### Install via npm

```bash +torchlight-bash
npm install flatpickr
```

```js +torchlight-js
import flatpickr from "flatpickr"; 
import "flatpickr/dist/flatpickr.css";
```

### Use the CDN

```php +code
@verbatim
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endverbatim
```

## Creating a Datepicker 

To add a datepicker, create an input field and initialise Flatpickr using Alpine.js:

```html +torchlight-html
<input type="text" x-data x-ref="datePickerInput"
    x-init="flatpickr($refs.datePickerInput, { dateFormat: 'd-m-Y' })" />
```

**Explanation**:

- `x-data`: Enables Alpine.js reactivity.
- `x-init`: Initialises Flatpickr when the component loads.
- `x-ref="datePickerInput"`: This creates a reference to the input field, which is used by
  Flatpickr to initialize the datepicker on that specific element.

## Adding Livewire integration and two-way binding

By default, Flatpickr updates the input field when a date is selected, but this
does not automatically keep the Livewire property in sync. This results in
**one-way binding**: Flatpickr controls the input, but changes from Livewire or
manual edits may not update Flatpickr.

To achieve **two-way binding**—so that both Flatpickr and Livewire stay in sync:

- Adding `wire:model` to the input field binds it to a Livewire property, but
    Flatpickr does not trigger a native change event when a date is picked. As a
    result, Livewire does not update immediately.
- To update the Livewire property as soon as a date is selected, you need to
    manually dispatch an input event from Flatpickr’s `onChange` callback.
- If you do not dispatch this event, you can use `wire:model.blur` as a
    workaround. This will update the Livewire property when the input loses focus,
    which is suitable if you only need the value after the user finishes editing.

In summary, for immediate updates, dispatch an input event on date selection.
Otherwise, use `wire:model.blur` to update Livewire when the field loses focus.

```html +torchlight-html
<input type="text" x-data x-ref="datePickerInput" wire:model.blur="selectedDate"
        x-init="flatpickr($refs.datePickerInput, { dateFormat: 'd-m-Y' })" />
```

## Separating the Alpine Script from the HTML

You can either initialise Flatpickr directly within the HTML or modularise the Alpine.js
script for better organisation.

**Important:** When separating the script, update the `x-data` attribute to specify the
Alpine.js component name (`datepicker` in this case). This ensures that the component is
correctly linked to the script and initialised when the page loads.

```html +torchlight-html
<input x-data="datepicker" x-ref="datePickerInput" type="text">
```

```php +code
@verbatim
@pushOnce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('datepicker', () => ({
                init() {
                    // Initialise Flatpickr instance
                    flatpickr(this.$refs.datePickerInput, {
                        dateFormat: 'd-m-Y'
                    });
                }
            }));
        });
    </script>
@endPushOnce
@endverbatim
```

**Note**: When separating the script from the HTML, there is no need to use x-init as the
init() method will be automatically called when the component is initialized


## Additional Resources

- <a href="(https://flatpickr.js.org/events/#hooks" target="blank">Flatpickr Hooks</a>


## TL:DR

Here os a pikaday example;

```html +torchlight-html
@once
    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    @endpush
@endonce

<input x-data wire:model.blur="selectedDate" x-ref="datepicker"
    x-init="new Pikaday({ field: $refs.datepicker, format: 'DD-MM-YYYY' })"
    x-on:change="$dispatch('input', $el.value)"
    type="text" />
```

Flatpickr Inline Example;

```html +torchlight-html
<input type="text" x-data wire:model="selectedDate" x-ref="datePickerInput"
    x-init="flatpickr($refs.datePickerInput, {
        dateFormat: 'd-m-Y',
        onChange: (selectedDates, dateStr) => $dispatch('input', dateStr)
    })">
```

### Pikaday vs Flatpickr with Livewire

**Pikaday**

- Uses its own formatting system (e.g., `'DD-MM-YYYY'` instead of `'d-m-Y'`).
- Updates the input field directly, triggering a native change event that Livewire detects
  meaning it Works immediately when selecting a date.
- No extra event dispatching is required.

**Flatpickr**

- Uses JavaScript-style formatting (e.g., `'d-m-Y'`).
- Does not trigger a native change event when selecting a date.
- Requires manually dispatching an event for Livewire to update immediately.



```html +torchlight-html
<input x-data wire:model.blur="selectedDate" x-ref="datepicker"
    x-init="new Pikaday({ field: $refs.datepicker, format: 'DD-MM-YYYY' })"
    x-on:change="$dispatch('input', $el.value)"
    type="text" />
```
