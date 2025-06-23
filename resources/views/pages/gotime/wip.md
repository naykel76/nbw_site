# Laravel Datetime Picker with Livewire and Alpine.js using Flatpickr

- [Vanilla Choices.js Example](#vanilla-choicesjs-example)
- [Creating a Datepicker](#creating-a-datepicker)
- [Adding Livewire Integration and Two-Way Binding](#adding-livewire-integration-and-two-way-binding)
- [Separating the Alpine Script from the HTML](#separating-the-alpine-script-from-the-html)
- [Additional Resources](#additional-resources)
- [TL:DR](#tldr)
    - [Pikaday vs Flatpickr with Livewire](#pikaday-vs-flatpickr-with-livewire)

## Vanilla Choices.js Example

```html +parse-and-code
<select id="example-select" multiple>
    <option value="AU">Australia</option>
    <option value="CA">Canada</option>
    <option value="NZ">New Zealand</option>
    <option value="UK">United Kingdom</option>
    <option value="US">United States</option>
</select>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    const element = document.getElementById('example-select');
    const choices = new Choices(element, {
        removeItemButton: true,
        searchEnabled: true,
        placeholderValue: 'Select an option...',
        shouldSort: true,
    });
    choices.setChoiceByValue(['AU', 'NZ']); // Select multiple options
    choices.setChoiceByValue(['US']); // Select another option
</script>
```
