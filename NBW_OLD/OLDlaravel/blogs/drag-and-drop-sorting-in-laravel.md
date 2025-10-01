<div class="small-headings"></div>

# Drag And Drop Sorting In Laravel

- [Introduction](#introduction)
- [Set Up](#set-up)
  - [Create Model, Migration, and Factory](#create-model-migration-and-factory)
  - [Seed and Migrate the Database](#seed-and-migrate-the-database)
  - [Add AlpineJS and the Sort Plugin to Your Project](#add-alpinejs-and-the-sort-plugin-to-your-project)
- [Create Livewire Component](#create-livewire-component)
  - [Basic Component](#basic-component)
  - [Add the `sort` Method](#add-the-sort-method)
  - [Add the `arrange` Method](#add-the-arrange-method)
- [Update the Blade View](#update-the-blade-view)
  - [Add Sort Handle](#add-sort-handle)
- [Trouble Shooting](#trouble-shooting)
- [Additional Resources](#additional-resources)

## Introduction

This guide walks through the process of adding drag-and-drop sorting functionality to a Laravel
application using AlpineJS and its sorting plugin. The solution works seamlessly with both Laravel
and Livewire components.

Before you begin, make sure you have a Laravel application set up with the **Naykel/Gotime** starter
package and **JTB**, and that you have a basic understanding of Livewire.

In this tutorial, we will explore how to implement drag-and-drop in Laravel by creating a simple
Livewire to-do list component with drag-and-drop functionality.

## Set Up

### Create Model, Migration, and Factory

First, we need to create a migration, model, and factory for the `to_dos` table. To do this, run the
following command in your terminal:

```bash +torchlight-bash
php artisan make:model ToDo -mf
```

Navigate to the `database/migrations` directory and open the migration file. Add the following code
to the `up` method in the migration file to add the basic necessary fields.

```sql
Schema::create('to_dos', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('position')->nullable();
    $table->timestamps();
});
```

Open the generated factory file and add the following code to define the factory:

```php +torchlight-php
public function definition(): array
{
    return [
        'name' => $this->faker->sentence,
        // this needs to be updated to be more dynamic and work with existing records
        'position' => $this->faker->numberBetween(1, 10),
    ];
}
```

### Seed and Migrate the Database

The `id` field is being set to prevent the first record from being created with an `id` of `1`. This
is to make it easier to visualise the sorting functionality and the values being updated.

Intentionally set the `position` out of order to demonstrate the sorting functionality.

```php +torchlight-php
ToDo::create(['id' => 487, 'name' => 'First todo...', 'position' => 0]);
ToDo::create(['name' => 'Second todo...', 'position' => 1]);
ToDo::create(['name' => 'Third todo...', 'position' => 4]);
ToDo::create(['name' => 'Fourth todo...', 'position' => 3]);
ToDo::create(['name' => 'Fifth todo...', 'position' => 2]);
```

Run the migration to create the `to_dos` table:

```bash +torchlight-bash
php artisan migrate --seed
```

### Add AlpineJS and the Sort Plugin to Your Project

```js
// Alpine Plugins
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>

// Alpine Core
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

## Create Livewire Component

```bash +torchlight-bash
php artisan make:livewire SortableToDoList
```

The command will generate two files `app/Livewire/SortableToDoList` and
`resources/views/livewire/sortable-to-do-list.blade.php`.

### Basic Component

Now, modify the `SortableToDoList` component to fetch the to-dos from the database and display them
in the view.

```php +torchlight-php
<?php

namespace App\Http\Livewire;

use App\Models\ToDo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SortableToDoList extends Component
{
    public string $view = 'livewire.sortable-to-do-list';

    protected function query()
    {
        return ToDo::query();
    }
    
    public function render()
    {
        $query = ToDo::all()->sortBy('position');

        return view($this->view, [
            'items' => $query
        ]);
    }
}
```

```html +parse
<x-alert type="warning">
The <code>view</code> property is used to prevent an error when using the <code>sort</code> method.
For reasons which are not clear, you get an error when the <code>sort</code> method fires unless
there is at least one public property defined in the component.
</x-alert>
```


### Add the `sort` Method

Add the `sort` method to the `SortableToDoList` component to handle the drag-and-drop sorting
functionality.

```php +torchlight-php
public function sort($id, $position): void
{
    $model = $this->query()->findOrFail($id);

    DB::transaction(function () use ($model, $position) {
        $current = $model->position;

        // No position change, do nothing and exit early...
        if ($current === $position) return;

        // Temporarily move the item out of the position stack...
        $model->update(['position' => -1]);

        // Grab the shifted block and shift it up or down...
        $block = $this->query()->whereBetween('position', [
            min($current, $position),
            max($current, $position),
        ]);

        // Determine the direction of the shift...
        $isDraggingDownwards = $current < $position;

        // Adjust the positions: decrement for moving down, increment for moving up
        $isDraggingDownwards
            ? $block->decrement('position')
            : $block->increment('position');

        // Reinsert the item back at its new position
        $model->update(['position' => $position]);
    });

    // Re-arrange the list in case there are any gaps...
    $this->arrange();
}
```

**Here's a breakdown of how it works:**

1. **Find the Target Model**

The sort method starts by locating the `ToDo` model with the given `$id` passed to the method. This
is done using the `query()` method, which retrieves the `ToDo` model query builder. It ensures the
model exists with `findOrFail($id)`. If the item with the provided ID is not found, an exception
will be thrown.

2. **Transaction Block**

The sorting logic is wrapped inside a `DB::transaction()` to ensure that all changes are made
atomically. If any part of the process fails, all changes are rolled back, maintaining data
integrity.

3. **Position Check**
   
Inside the transaction, it checks if the item's current database position (`$current`) is the same
as the desired new `$position`. If there is no change in position, the method returns early without
doing anything.

4. **Move Item Temporarily Out of Stack**
   
The target `ToDo` item is temporarily moved out of the position stack by setting its `position` to
`-1`. This is a placeholder value that ensures no conflicts while adjusting the positions of other
items in the list.

5. **Shift the Block of Affected Items**

It identifies a range of items whose position values need to be shifted. 

This is done using `whereBetween('position', [min($current, $position), max($current, $position)])` to
get the range of items that will be affected by the reordering.

* If the item is being dragged down ($current < $position), the positions of the affected items are decremented.
* If the item is being dragged up ($current > $position), the positions of the affected items are incremented.
  
6. **Reinsert the Item**

After the block of affected items is shifted, the target `ToDo` item is placed back into the correct
$position using update(['position' => $position]).

### Add the `arrange` Method

The `arrange` method is used to reassign the positions of all items in the list after a drag-and-drop
operation. This ensures that the positions are sequential and there are no gaps between the items.

```php +torchlight-php 
public function arrange(): void
{
    DB::transaction(function () {
        $position = 0;

        foreach ($this->query()->get() as $model) {
            $model->update(['position' => $position++]);
        }
    });
}
```

## Update the Blade View

Open `resources/views/livewire/sortable-to-do-list.blade.php` and add the following to build out our
front end and sortable list.

```html +torchlight-html
<div x-sort="$wire.sort($item, $position)" class="space-y-05">
    @foreach ($items as $todo)
        <div wire:key="{{ $todo->id }}" x-sort:item="{{ $todo->id }}" class="bx flex va-c hover:bg-gray-100 cursor-move">
            <div class="flex space-between w-full ">
                <div>{{ $todo->name }}</div>
                <div>Position: {{ $todo->position }}</div>
            </div>
        </div>
    @endforeach
</div>
```

### Add Sort Handle

By default, when using the AlpineJS sort plugin, the entire element is draggable. To make the
dragging more user-friendly, you can add a handle to the element that users can click and drag to
reorder the list.

```html
<div x-sort="$wire.sort($item, $position)" class="space-y-05">
    @foreach ($items as $todo)
        <!-- Drag and drop item -->
        <div wire:key="{{ $todo->id }}" x-sort:item="{{ $todo->id }}" class="bx flex va-c">
            <!-- Drag handle -->
            <div x-sort:handle class="cursor-move pxy-025 mr-05 opacity-05">
                <x-gt-icon name="drag-vertical" class="wh-1" />
            </div>
            <!-- Item content -->
            <div class="flex space-between w-full ">
                <div>{{ $todo->name }}</div>
                <div>Position: {{ $todo->position }}</div>
            </div>
        </div>
    @endforeach
</div>
```

## Trouble Shooting

Drag and drop sorting is not holding the position.

- Make sure you set `orderBy('position')` in the query method. (set global scope)

## Additional Resources

- [AlpineJS Sort Plugin](https://alpinejs.dev/plugins/sort)






