# SQL Cheatsheet
<a id="markdown-sql-cheatsheet" name="sql-cheatsheet"></a>

<!-- TOC -->

- [Date and Time](#date-and-time)
    - [Set current date `CURDATE()`](#set-current-date-curdate)
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
- [Functions](#functions)
        - [Select by the number of segments in a path](#select-by-the-number-of-segments-in-a-path)
- [Advance query examples](#advance-query-examples)

<!-- /TOC -->

| Action | Command                                    | Notes |
| :----- | :----------------------------------------- | :---- |
| COUNT  | `SELECT COUNT(Id) FROM stock;`             |       |
| MAX    | `SELECT MAX(Quantity) FROM stock;`         |       |
| SUM    | `SELECT SUM(Price * Quantity) FROM stock;` |       |
| SUM    | `SELECT SUM(Price) FROM stock;`            |       |

## Date and Time
<a id="markdown-date-and-time" name="date-and-time"></a>


### Set current date `CURDATE()`
<a id="markdown-set-current-date-curdate" name="set-current-date-curdate"></a>

```sql
UPDATE my_table
SET date_column = CURDATE();
```

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




## Functions
<a id="markdown-functions" name="functions"></a>



```sql
REPLACE(str_or_field, find_string, replace_with)
```

```sql
SELECT title, REPLACE(title, 'Section', 'Module')
FROM chapters WHERE title LIKE '%Section%';
```





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

## Advance query examples
<a id="markdown-advance-query-examples" name="advance-query-examples"></a>

| id  | type | title           | courses | main_category_id | sub_category_id |
| --- | ---- | --------------- | ------- | ---------------- | --------------- |
| 1   | main | Main Category 1 | null    | null             | null            |
| 2   | sub  | Sub Category 1  | null    | 1                | null            |
| 3   | item | Item 1          | EP01    | 1                | 2               |
| 4   | item | Item 2          |         | 1                | 2               |
| 5   | sub  | Sub Category 2  | null    | 1                | null            |
| 6   | item | Item 3          |         | 1                | 5               |
| 7   | item | Item 4          |         | 1                | 5               |




```sql
-- sub query or IN condition (1, 76, 89)
SELECT main_category_id
FROM exam_prep_outlines
WHERE AND courses LIKE '%EP04%';
-- laravel equivalent
$mainCategories = ExamPrepOutline::where('courses', 'like', "%$code%")
    ->groupBy('main_category_id')
    ->pluck('main_category_id');
```

```sql
SELECT * FROM exam_prep_outlines
WHERE (type = 'item' AND courses LIKE '%EP04%')
   OR (type = 'sub' AND main_category_id IN (
       SELECT main_category_id
       FROM exam_prep_outlines
       WHERE courses LIKE '%EP04%'
   ));
-- laravel equivalent
$courseOutline = ExamPrepOutline::where('courses', 'like', "%$code%")
    ->orWhere('type', 'sub')
    ->whereIn('main_category_id', $mainCategories)
    ->get();
```

**Output table**

|  id   | type  | title | courses                                        |  courses   | main_cat_id | sub_cat_id |
| :---: | :---: | :---: | ---------------------------------------------- | :--------: | :---------: | :--------: |
|   2   |  sub  |   A   | Infant                                         |     1      |             |            |
|   3   | item  |   1   | Feeding behaviours at different ages           | EP04, EP12 |      1      |     2      |
|   5   | item  |   3   | Infant anatomy and anatomical/oral challenges  |    EP04    |      1      |     2      |
|   9   | item  |   7   | Normal infant behaviours                       |    EP04    |      1      |     2      |
|  10   | item  |   8   | Nutritional requirements - including preterm   | EP04, EP10 |      1      |     2      |
|  12   | item  |  10   | Skin tone, muscle tone, reflexes               |    EP04    |      1      |     2      |
|  15   | item  |  13   | Stooling and voiding                           |    EP04    |      1      |     2      |
|  16   |  sub  |   B   | Maternal                                       |     1      |             |            |
|  85   | item  |   9   | Breastfeeding dyad relationship                | EP04, EP13 |     76      |            |
|  90   | item  |   1   | Effective milk transfer                        |    EP04    |     89      |            |
|  91   | item  |   2   | First hour                                     |    EP04    |     89      |            |
|  92   | item  |   3   | Latching (attaching)                           |    EP04    |     89      |            |
|  93   | item  |   4   | Managing supply                                | EP03, EP04 |     89      |            |
|  94   | item  |   5   | Milk expression                                | EP04. EP06 |     89      |            |
|  95   | item  |   6   | Position of the breastfeeding dyad (hands-off) |    EP04    |     89      |            |
|  97   | item  |   8   | Skin-to-skin (kangaroo care)                   |    EP04    |     89      |            |
