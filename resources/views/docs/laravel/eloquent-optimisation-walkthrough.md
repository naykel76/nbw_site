# Eloquent: Optimisation Walkthrough

When working with Eloquent, it's easy to fall into the trap of writing inefficient queries. This
often results in performance issues, especially when dealing with large datasets. In this guide,
we'll highlight common pitfalls like the N+1 query problem and inefficient column selection. We'll
also explore techniques for optimizing Eloquent queries for better performance. 

This guide will walk you through the process of optimising Eloquent queries. We'll start with a
basic query and gradually improve it by selecting only the necessary columns and eager loading
relationships.

- [Scenario](#scenario)
  - [Tables](#tables)
  - [Relationships](#relationships)
  - [ER Diagram](#er-diagram)
- [Basic Query with Eager Loading and Column Selection](#basic-query-with-eager-loading-and-column-selection)
  - [Use `with` to Eager Load Relationships](#use-with-to-eager-load-relationships)
  - [Use `select` to Load Only the Columns You Need](#use-select-to-load-only-the-columns-you-need)
  - [Relationship-Specific Columns](#relationship-specific-columns)
- [Viewing the Results](#viewing-the-results)
- [Additional Resources](#additional-resources)

## Scenario

Consider you have a `courses` table that contains information about various courses, a `modules`
table that stores modules related to each course, and a `lessons` table that contains lessons
associated with each module. The tables are related as follows:

### Tables

- `courses`: Stores information about various courses.
   - Columns: `id`, `title`, `slug`, `body`, `published_at`.

- `modules`: Contains modules related to each course.
  - Columns: `id`, `title`, `body`, `position`, `course_id`.

- `lessons`: Holds lessons associated with each module.
  - Columns: `id`, `title`, `body`, `position`, `module_id`.

### Relationships

- A **course** has many **modules**.
- A **module** belongs to a **course**.
- A **module** has many **lessons**.
- A **lesson** belongs to a **module**.

### ER Diagram

![Courses, Modules, Lessons ERD](/images/docs/courses-modules-lessons-erd.png)

## Basic Query with Eager Loading and Column Selection

First, we retrieve a single course by its ID.

```php
$course = Course::find($courseId);
```

To optimize our query and avoid performance issues, we should use the `with` method to eager load
the `modules` and `lessons` relationships. This avoids the N+1 query problem, where each parent
record leads to additional queries for related records.

### Use `with` to Eager Load Relationships

One of the most common performance issues with Eloquent is the N+1 query problem. This occurs when
you fetch a collection of records and then loop over them to fetch related records one by one. For
each parent record, another query is made to retrieve its related records, potentially leading to
hundreds of queries. For example, if you retrieve 10 courses and each course has 5 modules, without
eager loading, you could end up executing 1 query to fetch the courses plus 10 additional queries to
fetch the modules for each course, resulting in a total of 11 queries. This drastically slows down
your application.

To avoid this, use the `with` method to eager load relationships, reducing the number of queries to
just a few. In this example, Eloquent will load all `courses` and their associated `modules` and
`lessons` in a single query rather than querying each relationship separately:


```php
$course = Course::with('modules.lessons')->find($courseId);
```

In this example, Eloquent will load all `courses` and their associated `modules` and `lessons` in a
single query rather than querying each relationship separately.


### Use `select` to Load Only the Columns You Need

By default, Eloquent loads all columns from a table when fetching records. This can be inefficient,
especially when dealing with large datasets where only a few columns are needed. To optimize your
queries and minimize memory usage, you can use the select method to load only the necessary columns.

```php
$course = Course::select('id', 'title', 'slug')
    ->with('modules.lessons')->find($courseId);
```

### Relationship-Specific Columns 

In many cases, you only need specific columns from related models as well. To optimize your queries
even further, you can use the `select` method when eager loading relationships. This ensures that
only the necessary data is retrieved, reducing memory usage and query time.

We can refine the relationship-specific queries by selecting only the necessary columns for
`modules` and `lessons`. This can be done using either traditional closure syntax or shorthand
syntax.


<div class="compare"></div>

```php
// shorthand syntax
$course = Course::select('id', 'title', 'code')
    ->with([
        'modules:id,course_id,title',
        'modules.lessons:id,module_id,title'
    ])->find($courseId);
```

```php
// traditional closures
$course = Course::select('id', 'title', 'code')
    ->with([
        'modules' => function ($query) {
            $query->select('id', 'course_id', 'title');
        },
        'modules.lessons' => function ($query) {
            $query->select('id', 'module_id', 'title');
        }
    ])->find($courseId);
```

## Viewing the Results

```html
<div class="bx flex gap-3">
    <div><strong>Course ID: </strong>{{ $course->id }}</div>
    <div><strong>Code: </strong>{{ $course->code }}</div>
    <div><strong>Title: </strong>{{ $course->title }}</div>
</div>
<div class="grid cols-4 gap va-t">
    @foreach ($course->modules as $module)
        <div class="bx pxy-075">
            <div><strong>Module ID: </strong>{{ $module->id }}</div>
            <div><strong>Module Title: </strong>{{ Str::limit($module->title, 30) }}</div>
            <div><strong>Course ID: </strong>{{ $module->course_id }}</div>
            <div class="bx light txt-sm mt">
                @foreach ($module->lessons as $lesson)
                    <div><strong>Lesson ID: </strong>{{ $lesson->id }}</div>
                    <div><strong>Lesson Title: </strong>{{ Str::limit($lesson->title, 30) }}</div>
                    <div><strong>Module ID: </strong>{{ $lesson->module_id }}</div>
                    <hr class="my-05">
                @endforeach
            </div>
        </div>
    @endforeach
</div>
```


## Additional Resources

- <a href="https://github.com/laracasts/eloquent-performance-patterns/tree/main" target="blank">Eloquent Performance Patterns Repo</a>
- <a href="https://laracasts.com/series/eloquent-performance-patterns/episodes/3" target="blank">Getting One Record From a Has-Many Relationship</a>

