# Eloquent: Trouble Shooting

- [Column not found: 1054 Unknown column?](#column-not-found-1054-unknown-column)
            - [Things to Consider](#things-to-consider)
- [Why am I getting multiple results when using route model binding and query scopes?](#why-am-i-getting-multiple-results-when-using-route-model-binding-and-query-scopes)


## <question>Column not found: 1054 Unknown column?</question>

###### The Problem

You are getting a `Column not found: 1054 Unknown column` error when running an Eloquent query
indicating that the column you are trying to access does not exist in the database table.

##### Things to Consider

The obvious reason for this error is that the column does not exist in the table. However, there are
other reasons why you might encounter this error, such as:

- When eager loading relationships, make sure you do not have and spaces in the column name. For
  example, if you have a column named `first_name`, you should use `first_name` instead of `first
  name`.

```php
// incorrect
$query = Lesson::with('module:id, title')->find(23);
// SELECT `id`, ` title` FROM modules WHERE `id` IN (8)

// correct
$query = Lesson::with('module:id, title')->find(23);
// SELECT `id`, `title` FROM modules WHERE `id` IN (8)
```

## <question>Why am I getting multiple results when using route model binding and query scopes?</question>

###### The Problem

You have a route using route model binding to retrieve a single record. However, when using query
scopes to filter results, you are getting multiple records instead of the expected single record.

For example, a route retrieves a single `StudentCourse` record using route model binding and query
scopes to fetch additional data. Instead of one, you are getting two `StudentCourse` models.

```php
// THIS IS INCORRECT CODE FOR DEMONSTRATION PURPOSES NO NOT USE

public function __invoke(StudentCourse $studentCourse)
{
    $studentCourseOverview = $studentCourse
        ->withCurrentLessonId()
        ->withNextLockedLessonId()
        ->first(); // this will not work as expected

    return view('dev', ['sco' => $studentCourseOverview]);
}
```

###### The Solution

When using route model binding, the model instance is already loaded with the record. You should
**not** call query scopes directly on the model instance. Instead, use the query builder instance to
apply the scopes.

```php
public function __invoke($scid)
{
    $studentCourseOverview = StudentCourse::query()
        ->withCurrentLessonId()
        ->withNextLockedLessonId()
        ->find($scid);

    return view('dev', ['sco' => $studentCourseOverview]);
}
```

###### Explanation

Query scopes are not intended to be used on the model instance itself; they are meant to be used on
the query builder instance. When you call a query scope on a model instance, it will return a new
query builder instance. This is why you are getting multiple results.

###### Alternative Approach

Alternative Approach Instead of re-querying or avoiding route model binding, you could handle your
logic without directly relying on query scopes. Since you already have the model, you can process
the logic that those query scopes contain manually on that single instance of `StudentCourse`.

For example, you could implement methods on your `StudentCourse` model to handle the logic directly:

```php
public function getCurrentLessonId()
{
    return StudentLesson::where('student_course_id', $this->id)
        ->where('completed_at', null)
        ->first();
}

public function getNextLockedLessonId()
{
    return StudentLesson::where('student_course_id', $this->id)
        ->where('completed_at', null)
        ->skip(1)
        ->first();
}
```

###### Final Thoughts

Route model binding is perfectly fine for this case, and there's no need to abandon it. The issue
was more about how query scopes work—they aren't designed for model instances, which is why they
weren't behaving as expected. By shifting to instance methods, you can still achieve the desired
functionality without duplicating the model.

---