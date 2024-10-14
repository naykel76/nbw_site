# Optimizing Eloquent Queries for Better Performance

When working with Eloquent, it's easy to fall into the trap of writing inefficient queries. This can
lead to performance issues, especially when dealing with large datasets. In this article, we'll
highlight common pitfalls like the N+1 query problem and inefficient column selection. We'll also
explore techniques for optimizing Eloquent queries to improve performance.

- [Use `with` to Eager Load Relationships](#use-with-to-eager-load-relationships)
- [Use `select` to Load Only the Columns You Need](#use-select-to-load-only-the-columns-you-need)
  - [Relationship-Specific Columns](#relationship-specific-columns)
- [Additional Resources](#additional-resources)


## Use `with` to Eager Load Relationships

One of the most common performance issues with Eloquent is the N+1 query problem. This occurs when
you fetch a collection of records and then loop over them to fetch related records one by one. For
each parent record, another query is made to retrieve its related records, potentially leading to
hundreds of queries. This drastically slows down your application.

To avoid this, use the `with` method to eager load relationships, reducing the number of queries to
just a few:

```php
$courses = Course::query()
    ->with('modules.lessons')
    ->get()
```

In this example, Eloquent will load all `courses` and their associated `modules` and `lessons` in a
single query rather than querying each relationship separately.

## Use `select` to Load Only the Columns You Need

By default, Eloquent loads all columns from a table when fetching records. This can be inefficient,
especially when dealing with large datasets where only a few columns are needed. To optimize your
queries and minimize memory usage, you can use the `select` method to load only the necessary
columns:

```php
$courses = Course::query()
    ->select('id', 'title', 'slug')
    ->with('modules.lessons')
    ->get()
```

```html +parse
<x-alert type="info" title="Important">
The <code>select</code> method expects the <code>id</code> column to be present in the query. This
is because Eloquent needs the <code>id</code> to match any related records. Similarly, when eager
loading relationships, you must include any foreign key columns (e.g., <code>course_id</code>,
<code>module_id</code>) that define the relationship between models. If these related IDs are not
included, Eloquent won't be able to properly match or load the related models.
</x-alert>
```

### Relationship-Specific Columns

In many cases, you only need specific columns from related models as well. To optimize your queries
even further, you can use the select method when eager loading relationships. This ensures that only
the necessary data is retrieved, reducing memory usage and query time.

<div class="compare"></div>

```php
// shorthand syntax
Course::select('id', 'title', 'slug')
    ->with([
        'modules:id,course_id,title',
        'modules.lessons:id,module_id,title'
    ])->get();
```

```php
// traditional closures
Course::select('id', 'title', 'slug')
    ->with([
        'modules' => function ($query) {
            $query->select('id', 'course_id', 'title');
        },
        'modules.lessons' => function ($query) {
            $query->select('id', 'module_id', 'title');
        }
    ])->get();
```

Both approaches will yield the same result, but the shorthand syntax is more concise. However, the
traditional closure syntax can be more flexible, especially when you need to apply more complex
logic or conditions to the relationship queries.


## Additional Resources

- <a href="https://github.com/laracasts/eloquent-performance-patterns/tree/main" target="blank">Eloquent Performance Patterns Repo</a>

<!-- Dynamic Relationships Using Subqueries -->