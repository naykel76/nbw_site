## Pikaday Datepicker Component

```html +parse
<livewire:gotime.components.pikaday />
```

```html
<x-gt-pikaday wire:model.blur="created_at" autocomplete="off" />
```

1. `x-data="{ pikaday: null }"`: This sets up a new Alpine.js component with a single piece of
   data: `pikaday`, which is initially `null`. This will be used to store the Pikaday instance.

2. `x-ref="datepicker"`: This creates a reference to the input element, which can be accessed
   later using `$refs.datepicker`.

3. `x-init="$nextTick(() => pikaday = new Pikaday({ field: $refs.datepicker, format: 'DD-MM-YYYY'
   }))"`: This initialises the Pikaday instance. The `$nextTick` function is used to delay the
   initialization until after the DOM has been updated. This is necessary because the component
   might not be in the DOM when the Alpine.js component is first initialised. Inside the
   `$nextTick` function, a new Pikaday instance is created with the input element as the field and
   'DD-MM-YYYY' as the date format. The Pikaday instance is stored in `pikaday`.

4. `x-on:change="$dispatch('input', $el.value)"`: This sets up an event listener for the change
   event on the input element. When the input value changes (i.e., when a date is picked), it
   dispatches an 'input' event with the new value. This can be used to handle the date selection
   in a parent component.

5. `@pushOnce('head')` and `@pushOnce('scripts')`: These Blade directives are used to include the
   Pikaday CSS and JavaScript files in the page. The `pushOnce` directive ensures that the files
   are only included once, even if the component is used multiple times.

In summary, this code sets up an Alpine.js component that initialises a Pikaday datepicker when
the component is inserted into the DOM. The datepicker is associated with the input element, and
when a date is picked, an 'input' event is dispatched with the new date.
