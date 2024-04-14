# UPDATE Statement Examples
<!-- TOC -->

- [UPDATE (multiple)](#update-multiple)
- [`UPDATE` values based on another column in the same table](#update-values-based-on-another-column-in-the-same-table)
- [`UPDATE` value(s) using `CONCAT()`](#update-values-using-concat)
- [REPLACE](#replace)
- [Advanced](#advanced)
        - [Search for a string inside a column and replace](#search-for-a-string-inside-a-column-and-replace)

<!-- /TOC -->


<a id="markdown-update-multiple" name="update-multiple"></a>

## UPDATE (multiple)
```sql
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
```

<a id="markdown-update-values-based-on-another-column-in-the-same-table" name="update-values-based-on-another-column-in-the-same-table"></a>

## `UPDATE` values based on another column in the same table

```sql
UPDATE table_name
SET column1 = column2
WHERE condition;
```

<a id="markdown-update-values-using-concat" name="update-values-using-concat"></a>

## `UPDATE` value(s) using `CONCAT()`
```sql
UPDATE table_name
SET column1 = CONCAT(column2, '/', column3)
WHERE condition;
```

<a id="markdown-replace" name="replace"></a>

## REPLACE
    UPDATE table SET column = REPLACE(column, 'find_string', 'replace_string');


```sql
UPDATE chapters SET title = REPLACE(title, 'Section', 'Module')
WHERE title LIKE '%Section%';
```

<a id="markdown-advanced" name="advanced"></a>

## Advanced
<a id="markdown-search-for-a-string-inside-a-column-and-replace" name="search-for-a-string-inside-a-column-and-replace"></a>

#### Search for a string inside a column and replace
**UNTESTED**

    UPDATE `table_name`
    SET `field_name` = replace(same_field_name, 'unwanted_text', 'wanted_text')


