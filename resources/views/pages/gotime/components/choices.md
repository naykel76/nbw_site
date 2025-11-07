# Choices

<!-- 
<x-gt-choices wire:model="selectedTags" for="selectedTags" label="Select Tags" placeholder="Please Select...">
    @foreach($tags as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</x-gt-choices>

<x-gt-markdown class="-ml-7">
    @verbatim
        ```
        <x-gt-choices wire:model="selectedTags" for="selectedTags" placeholder="Please Select...">
            @foreach($tags as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </x-gt-choices>
    @endverbatim
</x-gt-markdown> -->





### Control Group

```html +parse
<livewire:gotime.components.choices variant="control-group" />
<hr>
<livewire:gotime.components.choices variant="control-group-disabled" />
<hr>
<livewire:gotime.components.choices variant="control-group-with-error" />
<hr>
<x-gt-input for="" placeholder="Normal input for reference" />

```

----------
### Frequently Asked Questions

#### How do I set the selected values?
You can set the selected values by binding the component to a variable (e.g.,
`wire:model="selectedTags"`) and assigning the desired values to that variable
in your backend or JavaScript.

How do I validate the selected values?
<!-- You can validate the selected values by using Livewire validation rules in your Livewire
component. For example, you can use `validate(['selectedTags' => 'required'])` to ensure that at least one tag is selected. -->

#### How do I update the selected values?
Update the bound variable (such as `selectedTags`) in your backend or via
Livewire/Alpine.js. The component will automatically reflect the changes.

#### How do I set the placeholder?
Use the `placeholder` attribute on the component, for example:  
`<x-gt-choices placeholder="Please Select..." />`



### Frequently Asked Questions

#### How do I set the selected values?

Bind the component to a Livewire property using `wire:model="selectedValues"`
and set that property in your Livewire component or Form Object. The selected
options will reflect the values of that property.

If using a form object, add a validation rule like this:

```php +code
#[Validate('nullable|array')]
public array $tags = [];
```


#### How do I update the selected values?

Update the Livewire property bound to the component. The UI will automatically
update to reflect the new values.

#### How do I set the placeholder?

Pass the `placeholder` attribute to the component, for example: `<x-form.choices
placeholder="Please select..." />`

#### Can I use multiple selections?

Yes, pass the `multiple` attribute to the component. The bound Livewire property
should be an array.

#### How do I provide options to the component?

Pass an array of options with `value` and `label` keys via the `:options`
attribute, e.g.: `:options="[ ['value' => '1', 'label' => 'One'], ['value' =>
'2', 'label' => 'Two'] ]"`

#### Does the component support Livewire validation error messages?

Yes, since the underlying select is standard HTML, you can show validation
errors as usual with `@error('selectedValues') <span>{{ $message }}</span>
@enderror`.







<!-- 


## Useful customisation options

```js
noChoicesText: 'No choices to choose from',
noResultsText: 'No results found',

shouldSort: false, // default true
shouldSortItems: true, // default false
```

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>

    // window.choices assigns a new function named choices to the window
    // object, making it accessible globally. The function takes an element
    // parameter, which represents the HTML element on which the "Choices"
    // library will be initialized.
    window.choices = (element) => {
        // This line creates a new instance of the "Choices" library, passing
        // the specified element as the first argument. The second argument is
        // an object containing various configuration options for the
        // "Choices" library.
        return new Choices(element, {
            maxItemCount: -1,
            placeholder: true,
            placeholderValue: 'please select...',
            removeItemButton: true,


            // noResultsText: 'not found...',
            // items: [],
            // choices: [],
            // renderChoiceLimit: -1,
            // maxItemCount: -1,
            // addItems: true,
            // addItemFilter: null,
            // removeItems: true,
            // removeItemButton: false,
            // editItems: false,
            // allowHTML: true,
            // duplicateItemsAllowed: true,
            // delimiter: ',',
            // paste: true,
            // searchEnabled: true,
            // searchChoices: true,
            // searchFloor: 1,
            // searchResultLimit: 4,
            // searchFields: ['label', 'value'],
            // position: 'auto',
            // resetScrollPosition: true,
            // sorter: () => {...},
            // searchPlaceholderValue: null,
            // prependValue: null,
            // appendValue: null,
            // renderSelectedChoices: 'auto',
            // itemSelectText: 'Press to select',
            // uniqueItemText: 'Only unique values can be added',
            // customAddItemText: 'Only values matching specific conditions can be added',
        });
    }
</script> -->
