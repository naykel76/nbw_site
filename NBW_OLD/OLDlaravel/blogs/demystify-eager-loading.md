# Demystify Eager Loading

Eager loading is a technique in Laravel to load relationships efficiently. When you retrieve a
model, you can specify which relationships should be loaded with it. This reduces the number of
queries needed to fetch related models, enhancing performance.

Eager loading is accomplished using the `with` method. You pass the name of the relationship you
want to load as an argument. For example, if you have a `Post` model that has a `comments`
relationship, you can load the comments relationship like this:

### What is the difference between `with` and `load`?

The `with` method is used to eager load relationships when retrieving a model. In contrast, the
`load` method is used to eager load relationships on an already retrieved model instance.

For example, if you want to load the `comments` relationship when retrieving a `Post` model, you can
use the `with` method like this:

```php +torchlight-php
$post = Post::with('comments')->find(1);
```

If you already have a `Post` model instance (for example, from route model binding) and you want to
load the `comments` relationship, you can use the `load` method like this:

```php +torchlight-php
$post->load('comments');
```

Another example;

```php +torchlight-php
public function mount(StudentCourse $studentCourse)
{
    // This gives you the entire student course instance with no related courses loaded.
    $sc = $studentCourse;

    // This returns all student courses and loads the related courses, which is not what you want.
    $sc = $sc->with('course')->get(); // Not ideal, retrieves all records

    // This correctly fetches a single student course by ID but does not eager load the course.
    $sc = $sc->with('course')->find($studentCourse->id); // Would not actually eager load

    // This is the right way to eager load the related course for the already existing student course instance.
    $sc = $sc->load('course'); // Correctly loads only the related course for the specific student course
}
```

## Trouble Shooting

When you are ripping your hair out because eager loading is not working as expected, here are a few
things to check:

**Correct Syntax for Selecting Columns**

Ensure there are no spaces after commas in the column selection syntax.

```php +torchlight-php
// Correct
$studentCourse = $studentCourse->load('course:id,title');

// Incorrect
$studentCourse = $studentCourse->load('course:id, title');
```

**Include the Foreign Key in the Relationship Definition**

Make sure to include the foreign key in the eager loading statement.

```php +torchlight-php
// Correct
$studentCourse = $studentCourse->load('course:id,title');

// Incorrect
$studentCourse = $studentCourse->load('course:title');
```

**Eager Loading Nested Relationships**

When eager loading nested relationships, always include the foreign keys of the child models as well.

```php +torchlight-php
// Correct
$studentCourse = $studentCourse->load([
    'course:id,title',
    'course.modules:id,title,course_id',
]);
// Incorrect
$studentCourse = $studentCourse->load([
    'course:id,title',
    'course.modules:id,title',
]);
```