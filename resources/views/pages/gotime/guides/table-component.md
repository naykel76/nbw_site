# Gotime: Table Component

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Quick Checklist](#quick-checklist)
- [Initial Setup](#initial-setup)
    - [Component Class](#component-class)
    - [Blade View](#blade-view)
- [Refreshing the Table](#refreshing-the-table)
- [TO BE REVIEWED ----------------------------------](#to-be-reviewed-----------------------------------)
- [Add Action Buttons](#add-action-buttons)
- [Filtering (TBD)](#filtering-tbd)
- [Filtering Data](#filtering-data)
    - [Filtering Based on Widget Selection](#filtering-based-on-widget-selection)
    - [Filtering After Retrieving Data](#filtering-after-retrieving-data)


## Introduction 

> This document references custom VS Code snippets like `gtlc:form-class` and
> `gtlc:form-object` that generate boilerplate code for common patterns. These
> are not available by default but can be added as custom snippets to speed up
> development.

## Prerequisites

Requires the `Gotime` package to be installed and configured. Assumes a basic
understanding of Livewire and Laravel.

## Quick Checklist

1. Generate the Livewire component using `php artisan livewire:make WidgetTable`
2. Define the component class, include the necessary traits and properties, and
   implement the `prepareData` method to retrieve and format data for the table
   view (`gtlc:table-component`)
3. Create the Blade view with a table structure (`gtlv:table-view`)
4. 
5. (optional) Add action buttons for each row, such as Edit, Delete, and View
6. (optional) Add filtering or other functionality as needed
8. Test the table component with sample data 

## Initial Setup

From the command line, run:

```bash +torchlight-bash
php artisan livewire:make WidgetTable
```

### Component Class

Once the component is created, update the component class to include the
required traits and properties.

**Note**: When using the `Renderable` trait, you must implement the
`prepareData` method. You can omit the `render` method and `view` property, as
Livewire will automatically use the view file with the same name as the
component class.

```php +torchlight-php
use App\Models\Widget;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Sortable;

class WidgetTable extends Component
{
    use Renderable, Sortable, WithPagination;

    protected string $modelClass = Widget::class;
    public string $pageTitle = 'Widget Table';

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);

        return ['items' => $query->paginate(12)];
    }
}
```

This initial setup includes includes sorting and pagination functionality. The
`prepareData` method retrieves the data from the `Widget` model, applies
sorting, and paginates the results.

Additional functionality can be added as needed, such as filtering or
searching.

### Blade View

```html +torchlight-blade
@verbatim
<div>
    <x-gt-table>
        <x-slot:thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('id')" class="w-4"
                    sortable :direction="$this->getSortDirection('id')"> id </x-gt-table.th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @forelse($items as $item)
                <tr wire:key="{{ $item->id }}">
                    <td>{{ str_pad($item->id, 5, 0, STR_PAD_LEFT) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy" colspan="10">No records found...</td>
                </tr>
            @endforelse
        </x-slot:tbody>
    </x-gt-table>
    {{ $items->links('gotime::pagination.livewire') }}
</div>
@endverbatim
```


## Refreshing the Table

When working with sibling components, using events to communicate the table will
not automatically refresh. The `WithFormActions` trait dispatches a ....

Add a listener in the table component to listen for the `model-saved` event:






## TO BE REVIEWED ----------------------------------


```php +torchlight-php
use Naykel\Gotime\Traits\Searchable;

public array $searchableFields = ['title', 'category'];

protected function prepareData()
{
    $query = $this->modelClass::query();
    $query = $this->applySearch($query);
    return ['items' => $query->paginate(20)];
}
```


## Add Action Buttons

In order to use actions, you need to include the `WithFormActions` trait in your component class. 

- ☐ Add resource action buttons for **Edit**, **Delete**, and **View** to each row in the table.

- You can use routes or methods
- Passing the routePrefix automatically tells the component to use the route instead of a method.
- works with id or slug

    When using routes:

    ```html
    <x-gt-resource-action action="edit" :$routePrefix :id="$item->slug" />
    ```



## Filtering (TBD)



- ☐ (optional) In the `mount` method set the default `sortColumn` and `sortDirection` 







------------------------------------------

## Filtering Data

Filtering allows Widgets to refine displayed records based on specific conditions. There are
two ways to filter data:

1. **Widget Selection (`filterBy` Property)** - Filters data before fetching from the
   database, based on Widget input.
2. **Collection Filtering** - Filters results **after** retrieving the full dataset from
   the database.

### Filtering Based on Widget Selection

To allow Widgets to filter records dynamically, add a `filterBy` property and apply
conditions using the `when()` method in `prepareData()` (or wherever you are fetching the
data).

```php +torchlight-php
public string $filterBy = '';

protected function prepareData()
{
    $query = $this->modelClass::overview()
        ->when($this->filterBy === 'active', fn ($query) => $query->active())
        ->when($this->filterBy === 'expired', fn ($query) => $query->expired());

    return ['items' => $query->get()];
}
```

In the view, use buttons to update `filterBy` dynamically.

```html
<div>
    <button wire:click="$set('filterBy', '')">All</button>
    <button wire:click="$set('filterBy', 'active')">Active</button>
    <button wire:click="$set('filterBy', 'expired')">Expired</button>
</div>
```

### Filtering After Retrieving Data

In cases where all records are fetched first, filtering can be applied **after**
retrieving the results.

```php +torchlight-php
protected function prepareData()
{
    $query = auth()->Widget()->studentCourses()->overview()->get();

    return [
        'active' => $query->filter(fn($course) => $course->isActive()),
        'expired' => $query->filter(fn($course) => $course->isExpired()),
    ];
}
```

This approach avoids multiple queries by retrieving all records at once and filtering in
memory using Laravel Collections.


