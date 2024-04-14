# Laravel CRUD Examples

<!-- TOC -->

- [Things you should know](#things-you-should-know)
- [Methods](#methods)
- [Destroy](#destroy)
- [Forms](#forms)
    - [Create From](#create-from)
    - [Edit Form](#edit-form)
    - [Delete Form](#delete-form)
- [Update vs Store Methods](#update-vs-store-methods)
- [Creating Records](#creating-records)
    - [Insert with Store Method](#insert-with-store-method)
    - [Insert with Create Method](#insert-with-create-method)
- [Updating Records](#updating-records)
    - [Update with Save Method](#update-with-save-method)
- [Tips and Tricks](#tips-and-tricks)
- [Update Using 'switch' Statement](#update-using-switch-statement)

<!-- /TOC -->

<a id="markdown-things-you-should-know" name="things-you-should-know"></a>

## Things you should know

- Since HTML forms can't make `PUT`, `PATCH`, or `DELETE` requests, you will need to add a hidden
`_method` field to spoof these HTTP verbs. The `@method` Blade directive can create this field for
you:

<a id="markdown-methods" name="methods"></a>

## Methods

<a id="markdown-destroy" name="destroy"></a>

## Destroy

<div class="bx warning-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use></svg>
    <div>This is not livewire form, to correctly send a `DELETE` request in Laravel, you need to encapsulate your `DELETE` action within
        a form with a submit button.</div>
</div>

```php
public function destroy(Course $course) {
    $course->delete();
    return redirect()->route('courses.index');
}
```


<a id="markdown-forms" name="forms"></a>

## Forms

<a id="markdown-create-from" name="create-from"></a>

### Create From

```html
<form method="POST" action="{{ route('resource.store') }}">
    @csrf
    ...
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

<a id="markdown-edit-form" name="edit-form"></a>

### Edit Form

```html
<form method="POST" action="{{ route('resource.update', $resource) }}">
    @csrf
    @method('PUT')
    ...
    <button type="submit" class="btn btn-primary">Update</button>
</form>
```

<a id="markdown-delete-form" name="delete-form"></a>

### Delete Form

```html
<form method="POST" action="{{ route('resource.destroy', $resource) }}">
    @csrf
    @method('DELETE')
    ...
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
```




-
-
-
-
-
-
-
-
-

<a id="markdown-update-vs-store-methods" name="update-vs-store-methods"></a>

## Update vs Store Methods

The `save()` method performs an `INSERT`

    $flight = new Flight;
    $flight->name = $request->name;
    $flight->save(); // it will INSERT a new record

    $flight = App\Flight::find(1);
    $flight->name = 'New Flight Name';
    $flight->save(); //this will UPDATE the record with id=1

The update method expects an array of column and value pairs representing the columns that should be updated.

    App\Flight::where('active', 1)
              ->where('destination', 'San Diego')
              ->update(['delayed' => 1]); // this will also update the record

<a id="markdown-creating-records" name="creating-records"></a>

## Creating Records

The difference between `save` and `create` is that `save` accepts a full Eloquent model instance while `create` accepts a plain PHP array:

<div class="bx warning-light bdr-3 rounded-1"><strong>TIP: </strong>If the data is not persisting as expected check you have set the `guarded` or `fillable` attributes in the model.</div>

<a id="markdown-insert-with-store-method" name="insert-with-store-method"></a>

### Insert with Store Method

```php
public function store(Request $request, User $user) {
    // set model attributes
    $user->name = request('name');
    $user->age = request('age');
    // persist the database
    $user->save();
}
```

<a id="markdown-insert-with-create-method" name="insert-with-create-method"></a>

### Insert with Create Method


```php
public function store(Request $request) {
    User::create([
        'name' => request('name'),
        'age' => request('age'),
    ]);
}
```

---

<a id="markdown-updating-records" name="updating-records"></a>

## Updating Records

<a id="markdown-update-with-save-method" name="update-with-save-method"></a>

### Update with Save Method

```php
public function update(Course $course) {
    $course->title = 'New Course Title');
    $course->description = 'Course Description Goes Here!';
    $course->save();
}
```





<a id="markdown-tips-and-tricks" name="tips-and-tricks"></a>

## Tips and Tricks


<a id="markdown-update-using-switch-statement" name="update-using-switch-statement"></a>

## Update Using 'switch' Statement

```php
public function update(Course $course) {

    switch(request()->input('action')) {

        case 'save':
            $course->update(request()->validate([ ]));
            return redirect("/course-modules/$course->id/edit");
            break;

        case 'save_close':
            $course->update(request()->validate([ ]));
            return redirect("/courses/$course->course_id/edit");
            break;

        case 'cancel':
            return redirect("/courses/$course->course_id/edit");
            break;
}

```
