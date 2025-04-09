# Eloquent: Quick Reference

- [Inserting and Updating Models](#inserting-and-updating-models)
- [Query time casting](#query-time-casting)
- [Aggregates](#aggregates)
- [Update vs Save Methods](#update-vs-save-methods)
    - [`save()` Method](#save-method)
    - [`update()` Method](#update-method)
- [Update Using 'switch' Statement](#update-using-switch-statement)


## Inserting and Updating Models

## Query time casting

- Laravel allows you to cast dates direct in a query using query time casting which automatically
  casts the date to a Carbon instance. <a href="https://laravel.com/docs/11.x/eloquent-mutators#query-time-casting" target="blank">Docs</a>

<div class="code-first-col"></div>

| Command                  | Action                            |
| :----------------------- | :-------------------------------- |
| $table->json('options'); | creates a JSON equivalent column: |

## Aggregates

You can use the following methods to perform aggregate functions on the database.

```php
$count = Flight::where('active', 1)->count();
$max = Flight::where('active', 1)->max('price');
```

## Update vs Save Methods

### `save()` Method

The `save()` method performs either an `INSERT` or an `UPDATE` based on the state of the model.

**INSERT**: When called on a new model instance, it creates a new record.

```php
$flight = new Flight;
$flight->name = $request->name;
$flight->save(); // Performs INSERT
```

**UPDATE**: When called on an existing model instance (fetched from the database), it updates the corresponding record.

```php
$flight = App\Flight::find(1);
$flight->name = 'New Flight Name';
$flight->save(); // Performs UPDATE
```

### `update()` Method

The `update()` method works on a query and directly performs an update operation in the database
without retrieving model instances. It requires an array of column-value pairs for the columns to be
updated.

```php
App\Flight::where('active', 1)
            ->where('destination', 'San Diego')
            ->update(['delayed' => 1]); // Directly updates matching records
```

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