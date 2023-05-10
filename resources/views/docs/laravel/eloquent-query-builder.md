# Eloquent and Query Builder
<a id="markdown-eloquent-and-query-builder" name="eloquent-and-query-builder"></a>

<!-- TOC -->

- [JOIN](#join)
    - [JOIN and SELECT specific columns](#join-and-select-specific-columns)
    - [JOIN and ORDER BY relationship attribute](#join-and-order-by-relationship-attribute)
    - [Create an alias for shorter code](#create-an-alias-for-shorter-code)

<!-- /TOC -->
## JOIN
<a id="markdown-join" name="join"></a>

### JOIN and SELECT specific columns
<a id="markdown-join-and-select-specific-columns" name="join-and-select-specific-columns"></a>

The first argument passed to the join method is the name of the table you need to join to, while
the remaining arguments specify the column constraints for the join.

**Pseudo:** Join `some_table`, where the `current_table.pk` equals `some_table.fk`

```php
CurrentTable::join('some_table', 'current_table.pk', '=', 'some_table.fk')
    ->select('current_table.*', 'some_table.title as title')
    ->get();
```



### JOIN and ORDER BY relationship attribute
<a id="markdown-join-and-order-by-relationship-attribute" name="join-and-order-by-relationship-attribute"></a>

Rename ambiguous fields and make sure search and sort attributes are updated to suit

```php
$query = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    ->select('chapters.*','chapters.title as chapterTitle', 'courses.title as courseTitle')
    ->orderBy('courseTitle', 'asc')
    ->get();
```

### Create an alias for shorter code
<a id="markdown-create-an-alias-for-shorter-code" name="create-an-alias-for-shorter-code"></a>

```php
$courseOutline = ExamPrepOutline::from('exam_prep_outlines as t1')
    ->join('exam_prep_outlines as t2', 't1.parent_id', '=', 't2.id')
    ->select('t1.id', 't1.type', 't1.title', 't1.parent_id', 't2.title AS parent_title')
    ->get();
```

