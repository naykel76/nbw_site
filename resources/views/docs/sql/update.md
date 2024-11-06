# UPDATE Statement Examples
- [UPDATE (multiple)](#update-multiple)
- [`UPDATE` values based on another column in the same table](#update-values-based-on-another-column-in-the-same-table)
- [`UPDATE` value(s) using `CONCAT()`](#update-values-using-concat)
- [REPLACE](#replace)
- [Examples](#examples)
  - [Add days to a date](#add-days-to-a-date)
- [Advanced](#advanced)
    - [Search for a string inside a column and replace](#search-for-a-string-inside-a-column-and-replace)



## UPDATE (multiple)
```sql
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
```


## `UPDATE` values based on another column in the same table

```sql
UPDATE table_name
SET column1 = column2
WHERE condition;
```


## `UPDATE` value(s) using `CONCAT()`
```sql
UPDATE table_name
SET column1 = CONCAT(column2, '/', column3)
WHERE condition;
```


## REPLACE
    UPDATE table SET column = REPLACE(column, 'find_string', 'replace_string');


```sql
UPDATE chapters SET title = REPLACE(title, 'Section', 'Module')
WHERE title LIKE '%Section%';
```


## Examples

### Add days to a date

```sql
UPDATE student_courses
SET expired_at = DATE_ADD(expired_at, INTERVAL 7 DAY);
```

## Advanced

#### Search for a string inside a column and replace
**UNTESTED**

    UPDATE `table_name`
    SET `field_name` = replace(same_field_name, 'unwanted_text', 'wanted_text')



