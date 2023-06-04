# Livewire CRUD

<!-- MarkdownTOC -->

- [Creating Records](#creating-records)
    - [Create Records with Single Properties and Validation](#create-records-with-single-properties-and-validation)
        - [Form Example](#form-example)
    - [Create Records Binding Directly To Model Properties](#create-records-binding-directly-to-model-properties)
        - [Form Example](#form-example-1)
- [Template Components Examples \(blade file\)](#template-components-examples-blade-file)
    - [Basic Data Table](#basic-data-table)

<!-- /MarkdownTOC -->

<a id="creating-records"></a>
## Creating Records

<a id="create-records-with-single-properties-and-validation"></a>
### Create Records with Single Properties and Validation

```php
public $name;
public $description;

protected $rules = [
    'name' => 'required',
    'description' => 'required',
];

public function save() {
    $data = $this->validate();
    Fugit::create($data);

 	// $this->reset(['name', 'description']);
    $this->resetExcept(); // resets all
}
```

<a id="form-example"></a>
#### Form Example
```html
<form wire:submit.prevent="save">
    <x-gt-input wire:model.defer="name" for="name" placeholder="Enter name" />
    <x-gt-input wire:model.defer="description" for="description" placeholder="Enter description" />
    <x-submit text="Save" rowClass="tar" />
</form>
```

<a id="create-records-binding-directly-to-model-properties"></a>
### Create Records Binding Directly To Model Properties

If an Eloquent model is stored as a public property on a Livewire component, you can bind to its properties directly.

**Note:** For this to work, you must use the `save()` method and you need to have a validation entry in the `$rules` property for any model attributes you want to bind to. Otherwise, an error will be thrown.

<div class="bx danger-light">
	If you get `Error: must not be accessed before initialization`, add the `mount()` method.
</div>

```php
public Fugit $fugit;

protected $rules = [
    'fugit.name' => 'required',
    'fugit.description' => 'required',
];

protected $messages = [
    'fugit.name.required' => 'The name cannot be empty.',
    'fugit.description.required' => 'The description cannot be empty.',
];

public function save() {
    $this->validate();
    $this->fugit->save();
}
```

<a id="form-example-1"></a>
#### Form Example
```html
<form wire:submit.prevent="save">
    <x-gt-input wire:model.defer="name" for="name" placeholder="Enter name" />
    <x-gt-input wire:model.defer="description" for="description" placeholder="Enter description" />
    <x-submit text="Save" rowClass="tar" />
</form>
```



<a id="template-components-examples-blade-file"></a>
## Template Components Examples (blade file)


<a id="basic-data-table"></a>
### Basic Data Table

```html
<table class="w-full">

    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

        @forelse($fugits as $fugit)

            <tr>
                <td>{{ $fugit->id }}</td>
                <td>{{ $fugit->name }}</td>
                <td>{{ $fugit->description }}</td>
                <td class="tar">
                    <button class="btn sm success">Edit</button>
                    <button class="btn sm danger">Delete</button>
                </td>
            </tr>

        @empty

            <tr>
                <td class="tac pxy" colspan="4">There are no records to be displayed.</td>
            </tr>

        @endforelse

    </tbody>

</table>
```
