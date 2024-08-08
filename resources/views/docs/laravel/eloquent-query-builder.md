# Eloquent and Query Builder

- [JOIN](#join)
  - [JOIN and SELECT specific columns](#join-and-select-specific-columns)
  - [JOIN multiple related tables](#join-multiple-related-tables)
  - [JOIN and ORDER BY relationship attribute](#join-and-order-by-relationship-attribute)
  - [Create an alias for shorter code](#create-an-alias-for-shorter-code)
- [where or Where](#where-or-where)
- [Get random record](#get-random-record)
- [Get unique records `distinct()` or `groupBy()`](#get-unique-records-distinct-or-groupby)
- [Raw Expressions](#raw-expressions)


## JOIN

### JOIN and SELECT specific columns

The first argument passed to the join method is the name of the table you need to join to, while
the remaining arguments specify the column constraints for the join.

**Pseudo:** Join `some_table`, where the `current_table.pk` equals `some_table.fk`

```php
CurrentTable::join('some_table', 'current_table.pk', '=', 'some_table.fk')
    ->select('current_table.*', 'some_table.title as title');
```

### JOIN multiple related tables

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
