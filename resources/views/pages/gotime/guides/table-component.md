# Gotime: Table Component

- [Introduction](#introduction)
- [Prerequisites](#prerequisites)
- [Quick Checklist](#quick-checklist)
- [Initial Setup](#initial-setup)
    - [Component Class](#component-class)
    - [Blade View](#blade-view)
- [Additional Features](#additional-features)
- [FAQ's](#faqs)
    - [How can I refresh the table from another component?](#how-can-i-refresh-the-table-from-another-component)


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

## Additional Features




## FAQ's

### <question>How can I refresh the table from another component?</question>

You can use Livewire events to communicate between components. For example, if
you have a form component that updates data, you can dispatch an event after the
data is saved. The table component can listen for this event and refresh its
data accordingly.

The `WithFormActions` trait dispatches:

- `model-saved` is dispatched after a model is created or updated.
- `model-deleted` is dispatched after a model is deleted.

Add a listener in the table component using the `#[On]` attribute:

```php +torchlight-php
use Livewire\Attributes\On;

#[On('model-saved')]
#[On('model-deleted')]
public function refreshTable()
{
    $this->resetPage();
    // Additional refresh logic if needed
}
```

For a simple refresh without custom logic, you can use the built-in `$refresh` method:

```php +torchlight-php
use Livewire\Attributes\On;

#[On('model-saved')]
#[On('model-deleted')]
public function $refresh() {}
```
