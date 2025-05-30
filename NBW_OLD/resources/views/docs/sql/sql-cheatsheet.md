# SQL Cheatsheet

- [Group by example](#group-by-example)
- [Split a string into multiple columns](#split-a-string-into-multiple-columns)
- [Date and Time](#date-and-time)
    - [Set current date `CURDATE()`](#set-current-date-curdate)
- [CREATE](#create)
- [Functions](#functions)
        - [Select by the number of segments in a path](#select-by-the-number-of-segments-in-a-path)
- [Advance query examples](#advance-query-examples)
- [Drop All Tables](#drop-all-tables)
- [Making Queries Readable](#making-queries-readable)
- [FAQ's](#faqs)
        - [Does it make sense to add foreign keys in deep relationships?](#does-it-make-sense-to-add-foreign-keys-in-deep-relationships)
- [DISTINCT](#distinct)
- [LIMIT](#limit)



## Group by example


```sql
select id, module_id, title from lessons
where id in (11, 13, 15, 22, 23, 24, 25, 26)
group by module_id;
```

<div class="compare"></div>

```sql
11	7	Introduction
13	7	Quiz 1 
15	7	Quiz 2
22	7	Learning Outcomes
23	8	Learning Outcomes
24	8	Introduction
25	9	Introduction
26	9	Learning Outcomes
```

```sql
-- Grouped by module_id

11	7	Introduction
23	8	Learning Outcomes
25	9	Introduction
```



## Split a string into multiple columns

Splits a name into first and last name

```sql
UPDATE users
SET lastname = SUBSTRING_INDEX(name, ' ', -1),
    firstname = SUBSTRING_INDEX(name, ' ', 1);
```

## Date and Time

### Set current date `CURDATE()`
```sql
UPDATE my_table
SET date_column = CURDATE();
```

## CREATE
```sql
CREATE TABLE IF NOT EXISTS table_name (
    column1 datatype,
   ....
);
```


## Functions


```sql
REPLACE(str_or_field, find_string, replace_with)
```

```sql
SELECT title, REPLACE(title, 'Section', 'Module')
FROM chapters WHERE title LIKE '%Section%';
```

#### Select by the number of segments in a path
```sql
SELECT route_prefix
FROM pages
WHERE LENGTH(route_prefix) - LENGTH(REPLACE(route_prefix, '/', '')) + 1 = 2;
```

Explanation:

AND LENGTH(route) - LENGTH(REPLACE(route, '/', '')) + 1 = 2 filters the results further to only include rows where the number of segments in the route column is 2. This is done by counting the number of slashes in the route string and adding 1 to get the number of segments.

This will only work with the exact number of slashes

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



## Making Queries Readable

To make queries more readable, you can use subqueries to break down the query into smaller parts.
This can be useful when you have a complex query that is difficult to read.

For example, the following query uses a subquery to get the `id` of a student's courses and then
uses that `id` to get the lessons for those courses.

```sql
-- Subquery
WITH StudentCourses AS ( 
    SELECT id FROM student_courses 
    WHERE user_id = 1
)

-- Main query
SELECT * FROM student_lessons 
WHERE student_course_id IN (
    SELECT id FROM StudentCourses
);
```


## FAQ's

#### <question>Does it make sense to add foreign keys in deep relationships?</question>

When structuring database tables, is it better to add foreign keys for deep relationships or rely on
queries to navigate between related tables?

For example:
- A **user** has many **student courses**
- A **student course** has many **lessons**
- A **lesson** has one **answer**

Should `user_id` be included in each table?
- A **student course** belongs to one **user**
- A **lesson** belongs to one **user**
- A **question** belongs to one **user**

In most cases, adding `user_id` to every table in a deep relationship is unnecessary. Use foreign
keys and queries to navigate between related tables. 

Only add `user_id` to deeper tables if direct access to user data is frequently needed for
performance. Otherwise, rely on the existing relationships.



## DISTINCT

```sql
SELECT DISTINCT col_name FROM table_name;
```

## LIMIT

Return a limited number of results to improve performance by using the `LIMIT` clause. This takes two parameters `ROWSTART` and `MAXRESULTS` where `ROWSTART` id the number of the first row and `MAXRESULTS` is how many records are to be returned. **This is useful for pagination**

    SELECT * FROM table_name LIMIT ROWSTART, MAXRESULTS

```sql
SELECT first_name FROM students LIMIT 0, 16
SELECT first_name FROM students LIMIT 17, 16
```