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

### Control Only


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
