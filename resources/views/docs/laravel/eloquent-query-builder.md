# Eloquent and Query Builder

- [Joining Tables in Laravel](#joining-tables-in-laravel)
  - [JOIN and ORDER BY relationship attribute](#join-and-order-by-relationship-attribute)
  - [Create an alias for shorter code](#create-an-alias-for-shorter-code)
- [where or Where](#where-or-where)
- [Get random record](#get-random-record)
- [Get unique records `distinct()` or `groupBy()`](#get-unique-records-distinct-or-groupby)
- [Raw Expressions](#raw-expressions)
- [Tips and Tricks](#tips-and-tricks)
  - [Why use `->value('id')` over `self::select('id')`?](#why-use--valueid-over-selfselectid)
  - [When to use `self::select('id')`:](#when-to-use-selfselectid)
  - [Summary](#summary)




## Joining Tables in Laravel 

The first argument passed to the join method is the name of the table you need to join to, while the
remaining arguments specify the column constraints for the join.

**Pseudo:** Join `some_table`, where `this_table.id` (primary key) equals `some_table.id` (foreign key).

Suppose you have a posts table and a users table. You want to join these tables to include the
user_id and name columns from the users table in the posts table.

Here’s how you can do it:

```php
$posts = Post::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select('posts.*', 'users.name as author_name')
    ->get();
```

Or if you we in the `Post` model,  you can create a query scope:

```php
public function scopeOverview(Builder $query): Builder
{
    return $this->query->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name as author_name');
}
```

### JOIN and ORDER BY relationship attribute

Rename ambiguous fields and make sure search and sort attributes are updated to suit

```php
$query = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    ->select('chapters.*','chapters.title as chapterTitle', 'courses.title as courseTitle')
    ->orderBy('courseTitle', 'asc');
```

### Create an alias for shorter code

```php
$courseOutline = ExamPrepOutline::from('exam_prep_outlines as t1')
    ->join('exam_prep_outlines as t2', 't1.parent_id', '=', 't2.id')
    ->select('t1.id', 't1.type', 't1.title', 't1.parent_id', 't2.title AS parent_title');
```

## where or Where

```php
$courses = DB::table('courses')
    ->where('type', 'ep')
    ->orWhere('type', 'ep-prog');
```

## Get random record

```php
$randomUser = \App\Models\User::select('id')->whereNotNull('id')
    ->inRandomOrder()
    ->limit(1);
```

## Get unique records `distinct()` or `groupBy()`

The `distinct()` method operates on the entire row, and will only return distinct rows based on
all the columns in the SELECT statement.

```php
$categories = Page::select('route_prefix')
    ->distinct();
```

As an alternative, you could try using a `groupBy()` instead of `distinct()`.  This would group
the rows based on the select column value, which would eliminate any duplicates in that column.

```php
$categories = Page::select('route_prefix')
    ->groupBy('route_prefix');
```

## Raw Expressions

https://laravel.com/docs/10.x/queries#raw-expressions

Sometimes you may need to insert an arbitrary string into a query. To create a raw string
expression, you may use the raw method provided by the DB facade:

```php
->addSelect(DB::raw(" 'not available') AS status"))
```

```php
->addSelect(DB::raw("IF(courses.id >= 3, 'available', 'not available') AS status"))
```

```php
 ->addSelect(DB::raw("IF(courses.published_at IS NOT NULL AND courses.tested_at IS NOT NULL, 'available', 'not available') AS status"))
```


## Tips and Tricks

### Why use `->value('id')` over `self::select('id')`?

1. **`self::select('id')`:**
   
   - This returns an Eloquent builder, which will either return a model or a collection of models if
     you call `->get()` or `->first()`. 
   - It’s more suitable when you need to select multiple columns or want to work with the model
     instance, allowing you to perform additional operations or load relationships.

    ```php
    return self::select('id')
        ->where('student_course_id', $studentCourseId)
        ->where('is_locked', true)
        ->limit(1);
    ```

2. **`->value('id')`:**
   
   - This directly returns the value of a single column (`id` in this case) without creating a model instance.
   - It automatically limits the query to one result, so you don’t need to add `->limit(1)`.

    ```php
    return self::where('student_course_id', $studentCourseId)
        ->where('is_locked', true)
        ->value('id');
    ```

- **Performance:** `->value('id')` skips the overhead of creating an Eloquent model, which is
  unnecessary if you just want the `id` value.
- **Simplicity:** It retrieves the first matching value automatically, so you don’t need to add
  `->limit(1)` or perform further steps to get the actual value.
- **Use case:** If you only need the `id` and not the entire model, `->value('id')` is more
  efficient because it directly returns the column value.

### When to use `self::select('id')`:
- If you need to retrieve other columns alongside `id`.
- If you need to work with the Eloquent model instance (e.g., to update it or load relationships).

### Summary
For your specific use case of retrieving the `id` value, `->value('id')` is the better choice. If
you need more data or a model, then `self::select('id')` is more appropriate.
