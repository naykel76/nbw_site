# SQL Cheatsheet
<a id="markdown-sql-cheatsheet" name="sql-cheatsheet"></a>

<!-- TOC -->

- [ALTER](#alter)
    - [ADD Column](#add-column)
        - [AFTER](#after)
    - [Rename Column](#rename-column)
- [CREATE](#create)
    - [RENAME Table](#rename-table)
    - [DROP COLUMN](#drop-column)
- [`DELETE` all records](#delete-all-records)
- [`DELETE` conditional records](#delete-conditional-records)
- [INSERT](#insert)
    - [Specify Columns](#specify-columns)
- [SELECT](#select)
    - [DISTINCT](#distinct)
- [JOIN](#join)
    - [Examples](#examples)
- [Functions](#functions)
    - [REPLACE](#replace)
- [`UPDATE`, `SET` column value(s)](#update-set-column-values)
- [`UPDATE`, `SET` column value(s) using CONCAT()](#update-set-column-values-using-concat)
- [Advanced](#advanced)
        - [Search for a string inside a column and replace](#search-for-a-string-inside-a-column-and-replace)
        - [Select by the number of segments in a path](#select-by-the-number-of-segments-in-a-path)

<!-- /TOC -->


## ALTER
<a id="markdown-alter" name="alter"></a>

The ALTER TABLE statement can be used to add, delete, or modify columns in an existing table as well as add and drop various constraints on an existing table.

### ADD Column
<a id="markdown-add-column" name="add-column"></a>

```sql
ALTER TABLE table_name
ADD column_name datatype;
```

#### AFTER
<a id="markdown-after" name="after"></a>

Note, you can add multiple columns at the same time.

```sql
ALTER TABLE table_name
ADD column_name datatype
AFTER column_name;
```


### Rename Column
<a id="markdown-rename-column" name="rename-column"></a>

```sql
ALTER TABLE table_name CHANGE old_column new_column datatype;
```

## CREATE
<a id="markdown-create" name="create"></a>

```sql
CREATE TABLE IF NOT EXISTS table_name (
    column1 datatype,
   ....
);
```

### RENAME Table
<a id="markdown-rename-table" name="rename-table"></a>

```sql
ALTER TABLE table_name RENAME To new_table_name
```

### DROP COLUMN
<a id="markdown-drop-column" name="drop-column"></a>

```sql
ALTER TABLE table_name DROP column_name;
```

---

## `DELETE` all records
<a id="markdown-delete-all-records" name="delete-all-records"></a>
```sql
DELETE FROM my_table;
```

## `DELETE` conditional records
<a id="markdown-delete-conditional-records" name="delete-conditional-records"></a>
```sql
DELETE FROM my_table WHERE [condition];
```

## INSERT
<a id="markdown-insert" name="insert"></a>

FYI, both `VAULE` and `VAULES` are valid syntax.

```sql
-- use null for AI values
INSERT INTO my_table VALUES (val1, val2, ...);
-- specify columns
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2)
-- seperate records with a comma to insert multiple records
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2), (null, val1, val2)
-- copy all records from another table
INSERT INTO my_table SELECT * FROM other_table;
```

### Specify Columns
<a id="markdown-specify-columns" name="specify-columns"></a>

```sql
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2)
-- seperate records with a comma to insert multiple records
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2), (null, val1, val2)
```

## SELECT
<a id="markdown-select" name="select"></a>

### DISTINCT
<a id="markdown-distinct" name="distinct"></a>

```sql
SELECT DISTINCT col_name FROM table_name;
```

## JOIN
<a id="markdown-join" name="join"></a>

```sql
SELECT * FROM table_has_pk
INNER JOIN table_has_fk
ON table_has_pk.id = table_has_fk.table_has_pk_id;
```


### Examples
<a id="markdown-examples" name="examples"></a>
```sql
-- SELECT all the categories,
-- JOIN the 'products' table ON the id from 'categories' table with the category_id on the 'products' table
SELECT * FROM categories
INNER JOIN products ON categories.id = products.category_id;


SELECT * FROM chapters
INNER JOIN media ON chapters.id = media.chapter_id;
```


**Task:** Select all the 'chapter titles' with no related media

```sql
SELECT * FROM chapters
INNER JOIN media ON chapters.id = media.chapter_id;
```


    SELECT id, title FROM chapters
    WHERE id NOT IN (SELECT chapter_id FROM media group by chapter_id);


## Functions
<a id="markdown-functions" name="functions"></a>

### REPLACE
<a id="markdown-replace" name="replace"></a>

    UPDATE table SET column = REPLACE(column, 'find_string', 'replace_string');


```sql
REPLACE(str_or_field, find_string, replace_with)
```

```sql
SELECT title, REPLACE(title, 'Section', 'Module')
FROM chapters WHERE title LIKE '%Section%';
```

```sql
UPDATE chapters SET title = REPLACE(title, 'Section', 'Module')
WHERE title LIKE '%Section%';
```

## `UPDATE`, `SET` column value(s)
<a id="markdown-update%2C-set-column-values" name="update%2C-set-column-values"></a>
```sql
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
```

## `UPDATE`, `SET` column value(s) using CONCAT()
<a id="markdown-update%2C-set-column-values-using-concat" name="update%2C-set-column-values-using-concat"></a>
```sql
UPDATE table_name
SET column1 = CONCAT(column2, '/', column3)
WHERE condition;
```

## Advanced
<a id="markdown-advanced" name="advanced"></a>

#### Search for a string inside a column and replace
<a id="markdown-search-for-a-string-inside-a-column-and-replace" name="search-for-a-string-inside-a-column-and-replace"></a>

**UNTESTED**

    UPDATE `table_name`
    SET `field_name` = replace(same_field_name, 'unwanted_text', 'wanted_text')


#### Select by the number of segments in a path
<a id="markdown-select-by-the-number-of-segments-in-a-path" name="select-by-the-number-of-segments-in-a-path"></a>

```sql
SELECT route_prefix
FROM pages
WHERE LENGTH(route_prefix) - LENGTH(REPLACE(route_prefix, '/', '')) + 1 = 2;
```

Explanation:

AND LENGTH(route) - LENGTH(REPLACE(route, '/', '')) + 1 = 2 filters the results further to only include rows where the number of segments in the route column is 2. This is done by counting the number of slashes in the route string and adding 1 to get the number of segments.

This will only work with the exact number of slashes
