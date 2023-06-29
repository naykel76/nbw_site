# ChoicesJS
<!-- TOC -->

- [Useful customisation options](#useful-customisation-options)

<!-- /TOC -->


[ChoicesJS documentation](https://github.com/Choices-js/Choices)

<div class="frm-row">
    <label for="">Select Multiple Items</label>
    <select x-data x-init="function () { choices($el)}" multiple>
        <option value="1">Football</option>
        <option value="2">Basketball</option>
        <option value="3">Tennis</option>
        <option value="4">Soccer</option>
        <option value="5">Baseball</option>
        <option value="6">Golf</option>
        <option value="7">Swimming</option>
        <option value="8">Volleyball</option>
    </select>
</div>

<div class="frm-row">
    <label for="">Select Single Item</label>
    <select x-data x-init="function () { choices($el)}">
        <option value="1">Football</option>
        <option value="2">Basketball</option>
        <option value="3">Tennis</option>
        <option value="4">Soccer</option>
        <option value="5">Baseball</option>
        <option value="6">Golf</option>
        <option value="7">Swimming</option>
        <option value="8">Volleyball</option>
    </select>
</div>

<a id="markdown-useful-customisation-options" name="useful-customisation-options"></a>

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
</script>
