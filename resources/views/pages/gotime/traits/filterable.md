# Filterable Trait

- [Usage](#usage)
- [Methods](#methods)
    - [`setFilter(string $key, mixed $value): void`](#setfilterstring-key-mixed-value-void)
        - [Blade Usage](#blade-usage)
    - [`clearFilter(string $key, mixed $value = null): void`](#clearfilterstring-key-mixed-value--null-void)
    - [`clearAllFilters(): void`](#clearallfilters-void)
    - [`getActiveFilterLabel(string $key): string`](#getactivefilterlabelstring-key-string)
    - [`getActiveFilterValue(string $key, mixed $value): string`](#getactivefiltervaluestring-key-mixed-value-string)
- [Filter Configuration](#filter-configuration)
    - [`mode` (Single vs Multi-Value Per Column)](#mode-single-vs-multi-value-per-column)
    - [`label` and `displayValues` (UI Display)](#label-and-displayvalues-ui-display)
- [TL;DR](#tldr)
    - [Add Filtering to a Livewire Component](#add-filtering-to-a-livewire-component)

## Usage

To get started, see [TL:DR Add Filtering to a Livewire
Component](#add-filtering-to-a-livewire-component)

## Methods

* Methods can be accessed directly in Blade or from other methods in your
  component class.
* Usage and examples here are minimal; see [Examples](#examples) for more
  detail.

### `setFilter(string $key, mixed $value): void`

Sets a filter for the given column.

*Behavior depends on the configured filter mode (`single` or `multi-value`) —
see [Filter Configuration](#filter-configuration).*

**Parameters**

* `$key` (string): Database column name to filter (must match the column)
* `$value` (mixed): Value to filter by (string, number, boolean)

> **Important:** Multi-value mode applies **only to storing multiple selections
> for a single column**. You can still filter on multiple columns
> simultaneously; each column is independent in how values are stored. This
> distinction is purely internal and does not affect the UI.

#### Blade Usage

```html +code-blade
<button wire:click="setFilter('dbColumn', 'filterValue')">Display Text</button>
```

Refer to the [Examples](#examples) section for more details.

### `clearFilter(string $key, mixed $value = null): void`

Removes a filter or a specific value from a **multi-value column**.

**Parameters**

* `$key` (string): Filter column.
* `$value` (mixed, optional): If provided, removes only this value from a
  **multi-value column**.

**Behavior**

* No `$value`: Removes the entire column filter.
* With `$value`: Removes only the specified value from a multi-value column
  (single-value columns ignore this).

### `clearAllFilters(): void`

Resets all active filters.

```html +code-blade
<button wire:click="clearAllFilters" class="btn">Clear All Filters</button>
```

### `getActiveFilterLabel(string $key): string`

Returns a human-readable label for the column, **used only when displaying
active filters in the UI**.

**Note:** This method does **not** affect filtering logic. It simply maps
internal column names to something readable for users.

**Parameters**  
* `$key` (string): The filter column.

### `getActiveFilterValue(string $key, mixed $value): string`

Returns a human-readable value for a column/value pair, **used only when
displaying active filters in the UI**.

**Note:** This method does **not** affect filtering logic. It simply maps
internal values to something readable for users.

**Parameters**  
* `$key` (string): The filter column.
* `$value` (mixed): The value to display.

## Filter Configuration

You can configure filters in your Livewire component by defining the
`$filterOptions` property. This config controls both filtering behaviour and how
filters are displayed in the UI.

**Structure:**

```php +code
public array $filterOptions = [
    'column_name' => [
        'mode' => 'single|multi-value',    // Optional: default is 'single'
        'label' => 'Human Readable Label', // Optional: define active filter label
        'displayValues' => [               // Optional: define active filter values
            'key1' => 'Display Value 1',
            'key2' => 'Display Value 2'
        ]
    ]
];
```

### `mode` (Single vs Multi-Value Per Column)

* **Single (default)** – only one value per column. Each `setFilter()` call
  replaces the previous value.
* **Multi-value** – allows multiple values **for the same column**. Each
  `setFilter()` call adds a new value, avoiding duplicates.

> Multi-value applies **only to a single column**. You can still filter on
> multiple columns simultaneously; each column is independent in storing values.

### `label` and `displayValues` (UI Display)

Used **only for displaying active filters in the UI**.

* **`label`** – Human-readable name for the column. Shown when displaying active
  filters.
* **`displayValues`** – Maps internal values to user-friendly strings for
  display in the UI.

These settings **do not affect filtering logic**; they are purely for
presentation.

**Example Configuration:**

```php +code
public array $filterOptions = [
    'status' => [
        'label' => 'Status',
        'displayValues' => [
            1 => 'Active',
            0 => 'Inactive'
        ]
    ],
    'category' => [
        'mode' => 'multi-value',
    ]
];
```

## TL;DR

### Add Filtering to a Livewire Component

* Add the `Filterable` trait in your component class:

```php +code
namespace App\Livewire;

use Livewire\Component;
use Naykel\Gotime\Traits\Filterable;
use App\Models\Product;

class ProductIndex extends Component
{
    use Filterable;
}
```

* Chain the `applyFilters` method to your data query:

```php +code
protected function prepareData()
{
    $query = $this->modelClass::query();
    $query = $this->applyFilters($query);
    return ['items' => $query->paginate($this->perPage)];
}
```

* In the Blade view, use `setFilter('column', value)` on buttons, checkboxes, or
  other UI elements. This can be done directly in Blade or called from a method
  in your component:

```html +code-blade
<button wire:click="setFilter('status', 1)">Active</button>
<button wire:click="setFilter('status', 0)">Inactive</button>
```

> **Note:** You can define multi-value filters or custom display labels and
> values in `$filterOptions`. See [Filter Configuration](#filter-configuration)
> for details.


--- IGNORE ---  
These are the **logical next questions a dev will ask** after the TL;DR setup.

* How do I add a filter for multiple values on the same column?
* How do I show active filters in the UI?
* How do I set a custom label or display value for a filter?
* How do I clear a single value from a multi-value filter?
* Can I filter on multiple columns at once?
* How do I highlight or style an active filter?
* How do I handle dynamic columns that may not exist initially?  
--- IGNORE ---