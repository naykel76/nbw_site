# Datepicker

## TLDR

```html +parse
<x-gt-alert type="danger">
<p>The date picker will fail if the format is incorrect. The date format is based on the
`gotime.date_format` config value. You do not need to set the date format in the date
picker component as long as it is set in the config file.</p>
<p>In the future, this may need to be set directly in the date picker component.</p>
</x-gt-alert>
```

```html +parse

<x-gotime::input.controls.pikaday for="firstname" >
    <x-slot:trailingAddon>Date</x-slot:trailingAddon>
</x-gotime::v2.input.controls.input >

<hr>
<x-gotime::v2.input.controls.input >
    <x-slot name="label">Date</x-slot>
    <x-slot name="help-text">Select a date</x-slot>
</x-gotime::v2.input.controls.input>
```

```html +parse
<x-gotime::input.controls.flatpickr />
```


```html +parse

<div class="dark">Config Date Format : {{ config('gotime.date_format') }}</div>


```

## TLDR

- The date picker expects a string or ... to be passed to it.

- Set your preferred date format in the `Gotime` config file.
- Use the `Gotime

- Convert the date to the desired format using the `Date` cast.



- The string should be in the format `Y-m-d` or `Y-m-d H:i:s`.

- The date picker will display the date in the format `Y-m-d`.

- The date picker will return the date in the format `Y-m-d`.

- The date picker will return the date in the format `Y-m-d H:i:s`.

- The date picker will return the date in the format `Y-m-d H:i:s`.

<!-- use Carbon\Carbon;

$carbonDate = Carbon::now();  // Get the current date and time
$formattedDate = $carbonDate->format('Y-m-d');  // Format it as a string

// Pass the formatted date to Flatpickr in your JavaScript:
flatpickr("#datepicker", {
  defaultDate: "{{ $formattedDate }}"  // Pass the string to Flatpickr
}); -->



```js
flatpickr("#datepicker", {
  dateFormat: "Y-m-d",  // Format of the input
  defaultDate: "2025-02-10"  // String format
});
```




## Usage


| Attribute     | Available | Comments |
| :------------ | :-------: | :------: |
| `for`         |     ❌     |          |
| `wire:model`  |     ✅     |          |
| `value`       |           |          |
| `class`       |           |          |
| `controlOnly` |           |          |
| `label`       |           | optional |
| `help-text`   |           |          |
| `rowClass`    |           |          |
|               |           |          |





<!-- 
Basic Usage
Setting the Selected Value
Multi-Select Options
Techniques
Using with Livewire Form Objects
Additional Options (optional, if applicable)
Events (optional, if applicable)
Validation (optional, if applicable)
Styling and Customisation (optional, if applicable)
Best Practices (optional, if applicable)
 -->


