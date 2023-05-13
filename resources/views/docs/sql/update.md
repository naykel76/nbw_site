# UPDATE Statement Examples
<a id="markdown-update-statement-examples" name="update-statement-examples"></a>

<!-- TOC -->

- [`UPDATE` Syntax](#update-syntax)
- [`UPDATE` value(s) using `CONCAT()`](#update-values-using-concat)
- [REPLACE](#replace)
- [Advanced](#advanced)
        - [Search for a string inside a column and replace](#search-for-a-string-inside-a-column-and-replace)

<!-- /TOC -->


## `UPDATE` Syntax
<a id="markdown-update-syntax" name="update-syntax"></a>

```sql
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
```

## `UPDATE` value(s) using `CONCAT()`
<a id="markdown-update-values-using-concat" name="update-values-using-concat"></a>
```sql
UPDATE table_name
SET column1 = CONCAT(column2, '/', column3)
WHERE condition;
```

---
---
---
---
---
---
---
## REPLACE
<a id="markdown-replace" name="replace"></a>

    UPDATE table SET column = REPLACE(column, 'find_string', 'replace_string');


```sql
UPDATE chapters SET title = REPLACE(title, 'Section', 'Module')
WHERE title LIKE '%Section%';
```

## Advanced
<a id="markdown-advanced" name="advanced"></a>

#### Search for a string inside a column and replace
<a id="markdown-search-for-a-string-inside-a-column-and-replace" name="search-for-a-string-inside-a-column-and-replace"></a>

**UNTESTED**

    UPDATE `table_name`
    SET `field_name` = replace(same_field_name, 'unwanted_text', 'wanted_text')
