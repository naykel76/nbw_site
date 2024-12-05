# SQL `UPDATE` Cheatsheet

- [Basic Syntax (One or More Columns)](#basic-syntax-one-or-more-columns)
- [Using Expressions in `UPDATE`](#using-expressions-in-update)
- [Update with `CONCAT()`](#update-with-concat)
- [Replace Substring in a Column](#replace-substring-in-a-column)
- [Update Using Date Functions](#update-using-date-functions)
- [Update with Conditions](#update-with-conditions)
- [Update from Another Table](#update-from-another-table)
- [Examples](#examples)


A quick reference for using the `UPDATE` statement in SQL.

---

## Basic Syntax (One or More Columns)

Update one or more columns in a table:

```sql
UPDATE table_name
SET column1 = value1,
    column2 = value2
WHERE condition;
```

**Important**: Always use a `WHERE` clause to avoid updating all rows.

---

## Using Expressions in `UPDATE`

Apply mathematical operations:

```sql
UPDATE table_name
SET column1 = column1 * 2
WHERE condition;
```

---

## Update with `CONCAT()`

Concatenate strings while updating:

```sql
    UPDATE table_name
    SET column1 = CONCAT(column2, '-', column3)
    WHERE condition;
```

---

## Replace Substring in a Column

Replace part of a string in a column:

```sql
    UPDATE table_name
    SET column_name = REPLACE(column_name, 'find_string', 'replace_string')
    WHERE column_name LIKE '%find_string%';
```

---

## Update Using Date Functions

Add days to a date:

    UPDATE table_name
    SET date_column = DATE_ADD(date_column, INTERVAL 7 DAY)
    WHERE condition;

Subtract days from a date:

    UPDATE table_name
    SET date_column = DATE_SUB(date_column, INTERVAL 7 DAY)
    WHERE condition;

---

## Update with Conditions

Update based on multiple conditions:

    UPDATE table_name
    SET column1 = value1
    WHERE column2 = value2 AND column3 < value3;

Use `CASE` for conditional updates:

    UPDATE table_name
    SET column1 = CASE
                    WHEN condition1 THEN value1
                    WHEN condition2 THEN value2
                    ELSE default_value
                  END
    WHERE condition;

---

## Update from Another Table

Update values using data from another table:

    UPDATE table1
    JOIN table2 ON table1.id = table2.id
    SET table1.column1 = table2.column2
    WHERE condition;

---


## Examples

```sql
UPDATE student_courses
SET    is_locked = true
WHERE  id IN (SELECT student_course_id
              FROM   student_lessons
              WHERE  lesson_id = 531);
```

```sql
UPDATE student_lessons
SET    attempt = 3,
       result = 50
WHERE  lesson_id = 531
       AND completed_at > '2024-01-01'; 
```

```sql

```

```sql

```

```sql

```

```sql

```

```sql

```

```sql

```
