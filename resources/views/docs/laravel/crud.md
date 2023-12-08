# Laravel CRUD Examples

<!-- TOC -->

- [Update vs Store Methods](#update-vs-store-methods)
- [Creating Records](#creating-records)
    - [Insert with Store Method](#insert-with-store-method)
    - [Insert with Create Method](#insert-with-create-method)
- [Updating Records](#updating-records)
    - [Update with Save Method](#update-with-save-method)
- [Update Using 'switch' Statement](#update-using-switch-statement)

<!-- /TOC -->

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

<div class="bx warning-light"><strong>TIP: </strong>If the data is not persisting as expected check you have set the `guarded` or `fillable` attributes in the model.</div>

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


<a id="markdown-update-using-switch-statement" name="update-using-switch-statement"></a>

## Update Using 'switch' Statement

```php
public function update(CourseModule $courseModule) {

    switch(request()->input('action')) {

        case 'save':
            $courseModule->update(request()->validate([ ]));
            return redirect("/course-modules/$courseModule->id/edit");
            break;

        case 'save_close':
            $courseModule->update(request()->validate([ ]));
            return redirect("/courses/$courseModule->course_id/edit");
            break;

        case 'cancel':
            return redirect("/courses/$courseModule->course_id/edit");
            break;
}

```

---
