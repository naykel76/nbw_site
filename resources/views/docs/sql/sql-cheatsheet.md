# SQL Cheatsheet
<!-- TOC -->

- [Split a string into multiple columns](#split-a-string-into-multiple-columns)
- [Date and Time](#date-and-time)
  - [Set current date `CURDATE()`](#set-current-date-curdate)
- [CREATE](#create)
- [`DELETE` all records](#delete-all-records)
- [`DELETE` conditional records](#delete-conditional-records)
- [Functions](#functions)
    - [Select by the number of segments in a path](#select-by-the-number-of-segments-in-a-path)
- [Advance query examples](#advance-query-examples)
- [Drop All Tables](#drop-all-tables)

<!-- /TOC -->

| Action | Command                                    | Notes |
| :----- | :----------------------------------------- | :---- |
| COUNT  | `SELECT COUNT(Id) FROM stock;`             |       |
| MAX    | `SELECT MAX(Quantity) FROM stock;`         |       |
| SUM    | `SELECT SUM(Price * Quantity) FROM stock;` |       |
| SUM    | `SELECT SUM(Price) FROM stock;`            |       |


<a id="markdown-split-a-string-into-multiple-columns" name="split-a-string-into-multiple-columns"></a>

## Split a string into multiple columns

Splits a name into first and last name

```sql
UPDATE users
SET lastname = SUBSTRING_INDEX(name, ' ', -1),
    firstname = SUBSTRING_INDEX(name, ' ', 1);
```

<a id="markdown-date-and-time" name="date-and-time"></a>

## Date and Time

<a id="markdown-set-current-date-curdate" name="set-current-date-curdate"></a>

### Set current date `CURDATE()`
```sql
UPDATE my_table
SET date_column = CURDATE();
```


<a id="markdown-create" name="create"></a>

## CREATE
```sql
CREATE TABLE IF NOT EXISTS table_name (
    column1 datatype,
   ....
);
```



<a id="markdown-delete-all-records" name="delete-all-records"></a>

## `DELETE` all records
```sql
DELETE FROM my_table;
```

<a id="markdown-delete-conditional-records" name="delete-conditional-records"></a>

## `DELETE` conditional records
```sql
DELETE FROM my_table WHERE [condition];
```

<a id="markdown-insert" name="insert"></a>



<a id="markdown-functions" name="functions"></a>

## Functions


```sql
REPLACE(str_or_field, find_string, replace_with)
```

```sql
SELECT title, REPLACE(title, 'Section', 'Module')
FROM chapters WHERE title LIKE '%Section%';
```





<a id="markdown-select-by-the-number-of-segments-in-a-path" name="select-by-the-number-of-segments-in-a-path"></a>

#### Select by the number of segments in a path
```sql
SELECT route_prefix
FROM pages
WHERE LENGTH(route_prefix) - LENGTH(REPLACE(route_prefix, '/', '')) + 1 = 2;
```

Explanation:

AND LENGTH(route) - LENGTH(REPLACE(route, '/', '')) + 1 = 2 filters the results further to only include rows where the number of segments in the route column is 2. This is done by counting the number of slashes in the route string and adding 1 to get the number of segments.

This will only work with the exact number of slashes

<a id="markdown-advance-query-examples" name="advance-query-examples"></a>

## Advance query examples
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


## Drop All Tables

This script first disables foreign key checks to avoid issues with foreign key constraints,
generates the `DROP TABLE` statements, and then re-enables foreign key checks. Note that you need to
manually execute the generated `DROP TABLE` statements after generating the initial script as shown
below.

```sql
SET FOREIGN_KEY_CHECKS = 0;

-- Generate DROP TABLE statements for all tables
SET @tables = NULL;
SELECT GROUP_CONCAT('`', table_name, '`') INTO @tables
FROM information_schema.tables
WHERE table_schema = (SELECT DATABASE());

-- Execute the DROP TABLE statements
SET @tables = CONCAT('DROP TABLE IF EXISTS ', @tables);
PREPARE stmt FROM @tables;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SET FOREIGN_KEY_CHECKS = 1;
```
