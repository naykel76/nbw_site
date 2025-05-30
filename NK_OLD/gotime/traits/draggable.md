# Add Drag And Drop Sorting

- [Features](#features)
- [Methods](#methods)
    - [`public function move($position, ?Closure $callback = null): void`](#public-function-moveposition-closure-callback--null-void)
    - [`private function arrange(?Closure $callback = null): void`](#private-function-arrangeclosure-callback--null-void)
- [Usage](#usage)
  - [Step 1. Add `Draggable` trait to the model class.](#step-1-add-draggable-trait-to-the-model-class)
  - [Step 2. Add `sortableFilter` query scope to the model class.](#step-2-add-sortablefilter-query-scope-to-the-model-class)
  - [Step 3. Add `sort` method to the Component Class.](#step-3-add-sort-method-to-the-component-class)
  - [Step 4. View (TBD)](#step-4-view-tbd)
- [FAQ's](#faqs)
    - [How do I seed the database with the correct sort order?](#how-do-i-seed-the-database-with-the-correct-sort-order)
- [Design Notes](#design-notes)

## Features

- Automatically updates the position of the list items when they are dragged and dropped.
- Automatically places new items at the end of the list when they are created.

**Considerations:**

- What if there is a different primary key? i.e `code` instead of `id`.
- Naming conventions are important

## Methods

#### `public function move($position, ?Closure $callback = null): void`

Moves the model instance to a new position within a sortable list and updates the position of other
items in the list. The method leverages an optional `callback` to modify the query conditions
dynamically, allowing more control over which records are affected.

#### `private function arrange(?Closure $callback = null): void`

Rearranges the items in the list by iterating through them and updating their positions to ensure
they are in the correct order. The `callback` allows for query customisation if needed, providing
flexibility in how records are arranged.

## Usage

### Step 1. Add `Draggable` trait to the model class.

```php
use Naykel\Gotime\Traits\Draggable;

class ToDo extends Model
{
    use Draggable;

    // other code...
}
```

### Step 2. Add `sortableFilter` query scope to the model class.

The `sortableFilter` query scope defines the items that are eligible to be sorted. This is crucial
because it ensures that only the relevant items are affected during sorting operations.

The `sortableFilter` scope should return a query builder instance and can optionally accept a
`callback` parameter. This allows you to apply dynamic query conditions based on the specific
requirements within the `move` method to dynamically modify the query conditions.

Here's an example of how you can define the `sortableFilter` query scope in the model:

```php
use Closure;
use Illuminate\Database\Eloquent\Builder;

class ToDo extends Model
{
    use Draggable;

    protected function scopeSortableFilter(Builder $query, ?Closure $callback = null): Builder
    {
        if ($callback) {
            $callback($query);
        }

        return $query;
    }

    // other code...
}
```



### Step 3. Add `sort` method to the Component Class.

Add a `sort` method to the component class that accepts the primary `key` of the item and the new
`position` of the item. Here you will create your query and call the `move` method on the
`Draggable` trait passing in the new position of the item.



```php
class ToDoList extends Component
{
    // other traits, properties and methods ...

    protected string $modelClass = ToDo::class;

    public function sort($key, $position) {
        // optional callback to override the default query conditions
        $callback = fn($query) => $query->whereUserId(User::first()->id);
        $this->modelClass::findOrFail($key)->move($position, $callback);
    }

    // other code...
}
```

```html +parse
<x-gt-alert type="info">
The items to be sorted can be defined in the <code>sortableFilter</code> scope in the model class,
or you can pass a callback to the <code>move</code> method to dynamically modify the query
conditions as shown in the example above.
</x-gt-alert>
```

### Step 4. View (TBD)

## FAQ's

#### <question>How do I seed the database with the correct sort order?</question>

When seeding, you may want to add the `WithoutModelEvents` trait to the `DatabaseSeeder` class to
prevent model events from firing. The will prevent overriding the sort order when seeding.

```php
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
}
```

## Design Notes

Although it is possible to include the `sortableFilter` scope in the trait, it is not advisable as
it could lead to unexpected sorting behavior. It is better to define the scope in the model class
and require the user to define the scope before using the trait.

If the query is wrong the selected item sill appear to be moved to the correct position, but the
other items in the list will be moved to the wrong position.