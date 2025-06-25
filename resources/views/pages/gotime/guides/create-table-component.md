# Build a Table Component with Actions, Sorting, and Pagination


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



### Delete Modal



## Add a Route

```php +torchlight-php
use App\Livewire\PostTable;

Route::get('/posts', PostTable::class)->name('posts.index');
```






<!-- ### Filtering

- ☐ Add a `filterBy` property to the component class to allow users to filter records dynamically.

    Example:
    ```php +torchlight-php
    public string $filterBy = '';
    ```
    - Use the `when()` method in `prepareData()` to apply conditions based on the `filterBy` property. -->

<!-- 

## Add Table Features

- ☐ Sorting  
    - Use `applySorting()` in `prepareData()`  
    - Add sorting markup in table headers  



- ☐ Pagination  
    - Add `WithPagination` trait  
    - Use `gtlv:pagination` in the view

---

## Add Actions

- ☐ Include `WithFormActions` trait in the component  
- ☐ Add create/edit/delete/view buttons as required  
- ☐ Ensure modals (e.g., delete confirmation) are working  

---

## Enhance the Layout

- ☐ Add a title bar or header  
- ☐ Add filters or bulk actions if needed  
- ☐ Use `gtlv:table` snippet for a complete layout

```html +parse
<x-gt-alert type="info">
<p>Run the <code>gtlv:table</code> snippet to scaffold a complete layout with all base markup and placeholders.</p>
</x-gt-alert>
```

--- -->


- ☐ (optional) In the `mount` method set the default `sortColumn` and `sortDirection` 




## Introduction

Table and List components both display data from a model. The table component presents
data in a tabular format with sorting, pagination, and search, while the list component
uses a list format with optional drag-and-drop sorting.

Both components share the same initial setup, differing mainly in the view file and the
traits used in the component class. Here is a quick overview of the steps to create each
component:

1. Create the Livewire component.
2. Add the form object, traits, and properties (if CRUD functionality is needed).
3. Update the component class with the necessary traits and properties.
4. Create the view file.

## Getting Started



### Step 2: Component Class Initial Setup

After creating the component, update the component class to include the required traits
and properties.

If you're using the `Renderable` trait, you must implement the `prepareData` method.
Following Livewire conventions, you can omit the `render` method and `view` property.

While `Renderable` is not strictly necessary, it is recommended as it helps keep the
component class clean and organised, while also providing additional functionality.

You can also include the optional `Searchable` trait for search functionality and the
`Sortable` trait for sorting. These traits are optional and can be added based on your
needs.

```html +parse
<x-gt-alert type="info">
You are not restricted to a specific behavior for tables or lists. Traits and methods will
function consistently across both, allowing you to combine traits and functions as needed.
Sorting, pagination, and search are not exclusive to tables—you can configure them for
lists as well. Ultimately, it is the view file that determines the component's behavior
and how it works. For more information, refer to the traits documentation.
</x-gt-alert>
```





## Filtering Data

Filtering allows users to refine displayed records based on specific conditions. There are
two ways to filter data:

1. **User Selection (`filterBy` Property)** - Filters data before fetching from the
   database, based on user input.
2. **Collection Filtering** - Filters results **after** retrieving the full dataset from
   the database.

### Filtering Based on User Selection

To allow users to filter records dynamically, add a `filterBy` property and apply
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
    $query = auth()->user()->studentCourses()->overview()->get();

    return [
        'active' => $query->filter(fn($course) => $course->isActive()),
        'expired' => $query->filter(fn($course) => $course->isExpired()),
    ];
}
```

This approach avoids multiple queries by retrieving all records at once and filtering in
memory using Laravel Collections.


