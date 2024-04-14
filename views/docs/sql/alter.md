# ALTER Table Examples

<!-- TOC -->

- [`ADD` Column](#add-column)
    - [`AFTER`](#after)
- [Rename Column](#rename-column)
    - [`CHANGE`](#change)
- [`DROP` Column](#drop-column)
- [`RENAME` Table](#rename-table)
- [Examples](#examples)

<!-- /TOC -->

<a id="markdown-add-column" name="add-column"></a>

## `ADD` Column
```sql
ALTER TABLE table_name
ADD column_name datatype;
```

<a id="markdown-after" name="after"></a>

### `AFTER`
Note, you can add multiple columns at the same time.

```sql
ALTER TABLE table_name
ADD column_name datatype
AFTER column_name;
```

<a id="markdown-rename-column" name="rename-column"></a>

## Rename Column

<a id="markdown-change" name="change"></a>

### `CHANGE`

```sql
ALTER TABLE table_name
CHANGE old_column new_column DATATYPE;
```

<a id="markdown-drop-column" name="drop-column"></a>

## `DROP` Column
```sql
ALTER TABLE table_name DROP column_name;
```

<a id="markdown-rename-table" name="rename-table"></a>

## `RENAME` Table
```sql
ALTER TABLE table_name RENAME To new_table_name
```


<a id="markdown-examples" name="examples"></a>

## Examples
```sql
-- Add a new column
ALTER TABLE users ADD lastname varchar(128);

-- Add a new column after another column
ALTER TABLE users ADD email varchar(128) AFTER lastname;

-- Rename a column
ALTER TABLE users CHANGE name firstname varchar(128);
```




