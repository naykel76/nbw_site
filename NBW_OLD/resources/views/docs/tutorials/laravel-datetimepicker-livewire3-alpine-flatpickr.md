# Laravel Datetime Picker with Livewire and Alpine.js using Flatpickr

- [Overview](#overview)
- [Adding Flatpickr](#adding-flatpickr)
    - [Option 1: Install via npm](#option-1-install-via-npm)
    - [Option 2: Use the CDN](#option-2-use-the-cdn)
- [Creating a Datepicker](#creating-a-datepicker)
- [Adding Livewire Integration and Two-Way Binding](#adding-livewire-integration-and-two-way-binding)
- [Separating the Alpine Script from the HTML](#separating-the-alpine-script-from-the-html)
- [Additional Resources](#additional-resources)
- [TL:DR](#tldr)
    - [Pikaday vs Flatpickr with Livewire](#pikaday-vs-flatpickr-with-livewire)

<!-- When using Pikaday, setting the year does not work as expected. You must pick the date
AFTER setting the year.  -->

## Overview

This tutorial demonstrates how to create a datepicker in a Laravel application using  
Livewire and Alpine.js with the Flatpickr library.

## Adding Flatpickr  

You can install Flatpickr using npm or include it via a CDN in your Blade file.

### Option 1: Install via npm

Run the following command to install Flatpickr:  

```bash
npm install flatpickr
```

Then, import it in your JavaScript file:

```js
import flatpickr from "flatpickr"; 
import "flatpickr/dist/flatpickr.css";
```

### Option 2: Use the CDN

If you prefer not to install it via npm, you can include the CDN directly in your Blade file:

```html
@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @endpush
@endonce
```

Using the CDN is a quick way to get started, but installing it via npm allows better
version control and customization.

## Creating a Datepicker 

To add a datepicker, create an input field and initialise Flatpickr using Alpine.js:

```html
<input type="text" x-data x-ref="datePickerInput"
    x-init="flatpickr($refs.datePickerInput, { dateFormat: 'd-m-Y' })" />

<!-- or alternatively, you can wrap in a surrounding div -->
<div x-data x-init="flatpickr($refs.datePickerInput, { dateFormat: 'd-m-Y' })">
    <input type="text" x-ref="datePickerInput" />
</div>
```

**Note**: You can use either a div wrapper or a single input element directly. Both
methods are valid, and you can choose the one that best suits your future components or
app structure.

**Explanation**:

- `x-data`: Enables Alpine.js reactivity.
- `x-init`: Initialises Flatpickr when the component loads.
- `x-ref="datePickerInput"`: This creates a reference to the input field, which is used by
  Flatpickr to initialize the datepicker on that specific element.

So far, the datepicker works, but it does not sync with Livewire state. Flatpickr updates
the input field when a date is selected, but changes to the input field (e.g., manual
edits) do not update Flatpickr. This means we have **one-way binding** where Flatpickr
controls the input but does not react to external changes.

Next, we'll integrate Livewire to enable **two-way binding**, ensuring that Livewire state
stays in sync with Flatpickr.

## Adding Livewire Integration and Two-Way Binding

- Simply adding `wire:model` to the input field will bind it to a Livewire property. 
- This does not work like a regular input field because Flatpickr does not trigger a native
  change event when selecting a date and therefore does not update the Livewire property.

  
- To update the Livewire property immediately, you need to manually dispatch an event when
  a date is selected.
- This is not working so as a workaround, you can use `wire:model.blur` to update the
  Livewire property when the input field loses focus.

```html
<input type="text" x-data x-ref="datePickerInput" wire:model.blur="selectedDate"
        x-init="flatpickr($refs.datePickerInput, { dateFormat: 'd-m-Y' })" />
```

**Explanation**:

- `wire:model.blur="selectedDate"`: Binds the input field to the `selectedDate` Livewire
  property and updates it when the input field loses focus.


1. Adding wire:model to the input field to bind it to a Livewire property. (displaying the date)

You can simply add `wire:model.blur` to update the Livewire property when the input field
loses focus which is not a problem if you are using it to select a date and then submit
the form. But if you are displaying the date live, then it is a problem.


## Separating the Alpine Script from the HTML

You can either initialise Flatpickr directly within the HTML or modularise the Alpine.js
script for better organisation.

**Important:** When separating the script, update the `x-data` attribute to specify the
Alpine.js component name (`datepicker` in this case). This ensures that the component is
correctly linked to the script and initialised when the page loads.

```html
<input x-data="datepicker" x-ref="datePickerInput" type="text">

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
```

**Note**: When separating the script from the HTML, there is no need to use x-init as the
init() method will be automatically called when the component is initialized


## Additional Resources

- <a href="(https://flatpickr.js.org/events/#hooks" target="blank">Flatpickr Hooks</a>


## TL:DR

Here os a pikaday example;

```html
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

```html
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



```html
<input x-data wire:model.blur="selectedDate" x-ref="datepicker"
    x-init="new Pikaday({ field: $refs.datepicker, format: 'DD-MM-YYYY' })"
    x-on:change="$dispatch('input', $el.value)"
    type="text" />
```
