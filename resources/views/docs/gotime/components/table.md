# Table

A simple table component with a few options to customise the component to suit your app
needs. 

The table header and the table body.

- you are free to use standard HTML table elements or individual table components 
- Includes a loading state
- The table header is optional
- The table body is required
- Both `tbody` and `thead` use attribute so you can add classes to the elements
- Minimal styling is included, but you can add your own classes to the table element

```
<table class="bdr">
    @isset($thead)
        <thead class="bg-gray-100">
            {{ $thead }}
        </thead>
    @endisset
    <tbody wire:loading.class="opacity-05" class="divide-y">
        {{ $tbody }}
    </tbody>
</table>
```


## Table Head

### Things To Know

- Table headings will be converted to upper case unless the `txt-lower` or
  `txt-capitalize` utility class is used.

- **Without the sortable Attribute**: When the `sortable` attribute is not used, the table
  header alignment follows your CSS styles. You can apply any alignment styles as needed.

- **With the sortable Attribute**: When the `sortable` attribute is used, the component
  handles the header alignment, centering the text by default. You can change the
  alignment by adding the `alignLeft`, `alignRight`, or `alignCenter` attributes.

## Examples

### Header Text Case Examples

```html +parse
<table>
    <thead>
        <tr>
            <x-gt-table.th class="bg-sky-200">Default Case</x-gt-table.th>
            <x-gt-table.th class="bg-sky-300 txt-lower">Lower Case</x-gt-table.th>
            <x-gt-table.th class="bg-sky-200 txt-capitalize">Title Case</x-gt-table.th>
        </tr>
    </thead>
</table>
```

### Header Alignment Examples (sortable)

```html +parse
<table>
    <thead>
        <tr>
            <x-gt-table.th class="bg-purple-200" sortable alignLeft>Align Left (Default)</x-gt-table.th>
            <x-gt-table.th class="bg-purple-300" sortable alignCenter>Align Center</x-gt-table.th>
            <x-gt-table.th class="bg-purple-200" sortable alignRight>Align Right</x-gt-table.th>
        </tr>
    </thead>
</table>
```
