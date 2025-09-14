# Filterable Trait

- [Overview](#overview)
- [Installation](#installation)
- [Properties](#properties)
    - [`$filters` (array)](#filters-array)
    - [`$filterOptions` (array)](#filteroptions-array)
- [Methods](#methods)
    - [`setFilter(string $key, mixed $value): void`](#setfilterstring-key-mixed-value-void)
    - [`clearFilter(string $key, mixed $value = null): void`](#clearfilterstring-key-mixed-value--null-void)
    - [`clearAllFilters(): void`](#clearallfilters-void)
    - [`applyFilters($query): Builder`](#applyfiltersquery-builder)
    - [`getFilterMode(string $key): string`](#getfiltermodestring-key-string)
    - [`getFilterLabel(string $key): string`](#getfilterlabelstring-key-string)
    - [`getDisplayValue(string $key, mixed $value): string`](#getdisplayvaluestring-key-mixed-value-string)
- [Usage Examples](#usage-examples)
    - [`setFilter`](#setfilter)
        - [Direct in Blade](#direct-in-blade)
        - [Component Method](#component-method)
    - [`applyFilters`](#applyfilters)
- [Filter Management](#filter-management)
    - [Single vs Multi-Value Filters](#single-vs-multi-value-filters)
    - [Clearing Filters](#clearing-filters)
        - [Clear Entire Filter](#clear-entire-filter)
        - [Clear Specific Filter Value](#clear-specific-filter-value)
        - [Clear All Filters](#clear-all-filters)
- [More Examples](#more-examples)
    - [Looping Through and Add Filter Buttons](#looping-through-and-add-filter-buttons)
- [need to go through and check](#need-to-go-through-and-check)
- [More Examples](#more-examples-1)
    - [Looping Through and Add Filter Buttons](#looping-through-and-add-filter-buttons-1)
    - [Displaying Active Filters](#displaying-active-filters)
- [Filter Configuration](#filter-configuration)
    - [Filter Modes](#filter-modes)
    - [Display Labels and Values](#display-labels-and-values)

## Overview

The `Filterable` trait provides a flexible filtering system for Laravel models,
allowing you to build dynamic queries with single and multi-value filters. It
intelligently handles filter state management and automatically applies the
appropriate SQL clauses.

## Installation

Add the trait to your Livewire component:

```php +torchlight-php
@verbatim
namespace App\Livewire;

use Livewire\Component;
use Naykel\Gotime\Traits\Filterable;
use App\Models\Widget;

class WidgetIndex extends Component
{
use Filterable;

// Your component methods...
}
@endverbatim
```

## Properties

### `$filters` (array)

Stores all active filters with their values.

**Structure:**
- Single value: `['column_name' => 'single_value']`
- Multiple values: `['column_name' => ['value1', 'value2']]`

**Example:**
```php +torchlight-php
$this->filters = [
    'status' => 'active',
    'category_id' => [1, 2, 3]
];
```

### `$filterOptions` (array)

Optional configuration for filter behavior, labels, and display values.

**Structure:**
```php +torchlight-php
public array $filterOptions = [
    'column_name' => [
        'mode' => 'single|multi',           // Optional: defaults to 'single'
        'label' => 'Human Readable Label',  // Optional: defaults to column name
        'displayValues' => [                // Optional: value => display mapping
            'key1' => 'Display Value 1',
            'key2' => 'Display Value 2'
        ]
    ]
];
```

**Example:**
```php +torchlight-php
public array $filterOptions = [
    'status' => [
        'mode' => 'multi',
        'label' => 'Status',
        'displayValues' => [
            1 => 'Active',
            0 => 'Inactive'
        ]
    ],
    'department' => [
        'label' => 'Department',
        // 'displayValues' => Product::DEPARTMENTS,
        'displayValues' => [
            'GAD' => 'Gadgets',
            'WID' => 'Widgets',
            'DOO' => 'Doohickeys'
        ]
    ]
];
```

## Methods

### `setFilter(string $key, mixed $value): void`

Sets or adds a filter value for the specified column. Behavior depends on the filter mode configuration.

**Parameters:**
- `$key` (string): The database column name to filter by
- `$value` (mixed): The value to filter by

**Behavior:**
- **Single mode (default)**: Always replaces the existing value
- **Multi mode**: Adds to existing values, avoiding duplicates
- **Empty values**: Clears the filter (preserves `0` and `false`)

### `clearFilter(string $key, mixed $value = null): void`

Removes filters or specific filter values.

**Parameters:**
- `$key` (string): The filter key to clear
- `$value` (mixed, optional): If provided, removes only this specific value from array filters

**Behavior:**
- Without `$value`: Removes entire filter key
- With `$value`: Removes specific value from array filters only

### `clearAllFilters(): void`

Resets all filters to an empty state.

**Note:** Uncomment `$this->resetPage()` in the method if using pagination to return to the first page.

### `applyFilters($query): Builder`

Applies all active filters to the provided query builder.

**Parameters:**
- `$query`: Laravel Query Builder or Eloquent Builder instance

**Returns:** Modified Builder instance

**Behavior:**
- Single values: Uses `WHERE column = value`
- Array values: Uses `WHERE column IN (value1, value2, ...)`
- Skips null and empty string values
- Allows falsy values like `0` and `false`

### `getFilterMode(string $key): string`

Returns the filter mode for a given key.

**Parameters:**
- `$key` (string): The filter key

**Returns:** `'single'` (default) or `'multi'`

### `getFilterLabel(string $key): string`

Returns the display label for a filter key.

**Parameters:**
- `$key` (string): The filter key

**Returns:** Configured label or the key itself if no label is set

### `getDisplayValue(string $key, mixed $value): string`

Returns the display value for a filter key/value pair.

**Parameters:**
- `$key` (string): The filter key
- `$value` (mixed): The filter value

**Returns:** Configured display value or the value as a string

## Usage Examples

### `setFilter` 

#### Direct in Blade

```html +torchlight-blade
@verbatim
<!-- individual filter buttons -->
<button wire:click="setFilter('country', 'AU')" class="btn">Australia</button>
<button wire:click="setFilter('country', 'CA')" class="btn">Canada</button>
<button wire:click="setFilter('country', 'UK')" class="btn">United Kingdom</button>
<button wire:click="setFilter('is_active', 1)" class="btn">Active</button>
@endverbatim
```

```html +torchlight-blade
<!-- Dropdown -->
@verbatim
<select wire:change="setFilter('country', $event.target.value)">
<option value="">All Countries</option>
@foreach(\App\Models\Widget::COUNTRIES as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
@endforeach
</select>
@endverbatim
```

#### Component Method

In your component, you can create specific methods for common filters:

```php +torchlight-php
public function filterByCountry($country): void
{
$this->setFilter('country', $country);
}

public function filterByStatus($status): void
{
$this->setFilter('is_active', $status);
}
```

Then in your Blade template call the method and pass the value:

```html +torchlight-blade
<button wire:click="filterByCountry('AU')" class="btn">Australia</button>
<button wire:click="filterByStatus(1)" class="btn">Active</button>
```

### `applyFilters`

Use the `applyFilters()` method in your data retrieval methods:

In this example we are using the `prepareData` method from the `Renderable`
trait, but you can use it anywhere you are building a query.

```php
protected function prepareData()
{
$query = $this->modelClass::query();
$query = $this->applyFilters($query);

return ['items' => $query->paginate($this->perPage)];
}
```

## Filter Management

### Single vs Multi-Value Filters

The trait automatically handles the transition between single and multi-value
filters:

```php +torchlight-php
// First click: sets single value
$this->setFilter('country', 'AU');
// $filters = ['country' => 'AU']

// Second click with different value: converts to array
$this->setFilter('country', 'CA');
// $filters = ['country' => ['AU', 'CA']]

// Third click with existing value: no change (avoids duplicates)
$this->setFilter('country', 'CA');
// $filters = ['country' => ['AU', 'CA']] (unchanged)
```

### Clearing Filters


#### Clear Entire Filter

```php +torchlight-php
// Remove all values for the 'country' filter
$this->clearFilter('country');
```

```html +torchlight-blade
<!-- Direct in Blade -->
<button wire:click="clearFilter('country')" class="btn">Clear Countries</button>
```

#### Clear Specific Filter Value

For multi-value filters (arrays), you can remove just one value:

```php +torchlight-php
// Remove only 'AU' from the country filter
$this->clearFilter('country', 'AU');
```

```html +torchlight-blade
<!-- Direct in Blade -->
<button wire:click="clearFilter('country', 'AU')" class="btn">Remove Australia</button>
```

#### Clear All Filters

```php +torchlight-php
// Clear all active filters
$this->clearAllFilters();
```

```html +torchlight-blade
<button wire:click="clearAllFilters" class="btn btn-secondary">Clear All Filters</button>
```


## More Examples

### Looping Through and Add Filter Buttons

```html +torchlight-blade
@verbatim
@foreach (\App\Models\Product::DEPARTMENTS as $key => $value)
<x-gt-button wire:click="setFilter('department', '{{ $key }}')" text="{{ $value }}" />
@endforeach
@endverbatim
```

```html +torchlight-blade
@verbatim
<!-- manually create filter buttons -->
<x-gt-button wire:click="setFilter('department', 'GAD')" text="Gadgets" />
<x-gt-button wire:click="setFilter('department', 'WID')" text="Widgets" />
<x-gt-button wire:click="setFilter('department', 'DOO')" text="Doohickeys" />
@endverbatim
```

<!-- not sure what these are -->
```html +torchlight-blade
@verbatim
{{-- Single select clears automatically when "All" is selected --}}
<select wire:change="setFilter('department', $event.target.value)">
<option value="">All Departments</option>
{{-- ... --}}
</select>

{{-- Multi checkboxes add/remove individual values --}}
@foreach ($departments as $key => $value)
<input type="checkbox" wire:click="setFilter('department', '{{ $key }}')">
@endforeach

{{-- Clear buttons work for both single and array filters --}}
<button wire:click="clearFilter('{{ $key }}', '{{ $singleValue }}')">×</button>
@endverbatim
```


??????????
```html
<!-- Show active filters with individual remove buttons -->
@if(isset($this->filters['country']))
<div class="active-filters">
    @foreach((array)$this->filters['country'] as $country)
        <span class="filter-tag">
            {{ $country }}
            <button wire:click="clearFilter('country', '{{ $country }}')" class="remove">×</button>
        </span>
    @endforeach
</div>
@endif
```

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
## need to go through and check



## More Examples

### Looping Through and Add Filter Buttons

```html +torchlight-blade
@verbatim
@foreach (\App\Models\Product::DEPARTMENTS as $key => $value)
    <button wire:click="setFilter('department', '{{ $key }}')" class="btn">
        {{ $value }}
    </button>
@endforeach
@endverbatim
```

```html +torchlight-blade
@verbatim
<!-- Manually create filter buttons -->
<button wire:click="setFilter('department', 'GAD')" class="btn">Gadgets</button>
<button wire:click="setFilter('department', 'WID')" class="btn">Widgets</button>
<button wire:click="setFilter('department', 'DOO')" class="btn">Doohickeys</button>
@endverbatim
```

### Displaying Active Filters

Show users what filters are currently active with individual remove buttons:

```html +torchlight-blade
@verbatim
@if(!empty($this->filters))
    <div class="active-filters">
        <h4>Active Filters:</h4>
        @foreach($this->filters as $key => $value)
            <div class="filter-group">
                <strong>{{ $this->getFilterLabel($key) }}:</strong>
                @if(is_array($value))
                    @foreach($value as $val)
                        <span class="filter-tag">
                            {{ $this->getDisplayValue($key, $val) }}
                            <button wire:click="clearFilter('{{ $key }}', '{{ $val }}')" class="remove">×</button>
                        </span>
                    @endforeach
                @else
                    <span class="filter-tag">
                        {{ $this->getDisplayValue($key, $value) }}
                        <button wire:click="clearFilter('{{ $key }}')" class="remove">×</button>
                    </span>
                @endif
            </div>
        @endforeach
        
        <button wire:click="clearAllFilters" class="btn btn-link">Clear All</button>
    </div>
@endif
@endverbatim
```

**Advanced filter UI with checkboxes:**
```html +torchlight-blade
@verbatim
<div class="filter-section">
    <h4>{{ $this->getFilterLabel('categories') }}</h4>
    @foreach($categories as $id => $name)
        @php
            $isChecked = isset($this->filters['categories']) && 
                        in_array($id, (array)$this->filters['categories']);
        @endphp
        
        <label class="checkbox-label">
            <input 
                type="checkbox" 
                wire:click="setFilter('categories', {{ $id }})"
                {{ $isChecked ? 'checked' : '' }}
            >
            {{ $name }}
        </label>
    @endforeach
</div>
@endverbatim
```


## Filter Configuration

### Filter Modes

Configure how filters behave when multiple values are set:

```php +torchlight-php
public array $filterOptions = [
    'status' => ['mode' => 'single'],    // Replaces existing value
    'category' => ['mode' => 'multi'],   // Adds to existing values
];
```

**Single Mode (Default):**
- Each `setFilter()` call replaces the previous value
- Useful for dropdowns, radio buttons, or mutually exclusive filters

**Multi Mode:**
- Each `setFilter()` call adds to existing values (no duplicates)
- Useful for checkboxes or tag-style filters

### Display Labels and Values

Improve the user experience with human-readable labels and values:

```php +torchlight-php
public array $filterOptions = [
    'is_published' => [
        'label' => 'Publication Status',
        'displayValues' => [
            1 => 'Published',
            0 => 'Draft'
        ]
    ]
];
```

**Usage in templates:**
```html +torchlight-blade
@verbatim
<h3>{{ $this->getFilterLabel('is_published') }}</h3>
@if(isset($this->filters['is_published']))
    Current: {{ $this->getDisplayValue('is_published', $this->filters['is_published']) }}
@endif
@endverbatim
```