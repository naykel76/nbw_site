# ALTER Table Examples

- [`ADD` Column](#add-column)
  - [`AFTER`](#after)
- [Rename Column](#rename-column)
  - [`CHANGE`](#change)
- [`DROP`](#drop)
  - [Column](#column)
  - [Table](#table)
- [`RENAME` Table](#rename-table)
- [Examples](#examples)


## `ADD` Column

```sql
ALTER TABLE table_name
ADD column_name datatype;
```

### `AFTER`

Note, you can add multiple columns at the same time.

```sql
ALTER TABLE table_name
ADD column_name datatype
AFTER column_name;
```

## Rename Column

### `CHANGE`

```sql
ALTER TABLE table_name
CHANGE old_column new_column DATATYPE;
```

## `DROP` 

### Column

```sql
ALTER TABLE table_name 
DROP column_name1,
DROP column_name2;
```

### Table

```sql
DROP TABLE table_name;
```

## `RENAME` Table

```sql
ALTER TABLE table_name RENAME To new_table_name
```


## Examples
```sql
-- Add a new column
ALTER TABLE users ADD lastname varchar(128);

-- Add a new column after another column
ALTER TABLE users ADD email varchar(128) AFTER lastname;

-- Rename a column
ALTER TABLE users CHANGE name firstname varchar(128);
```




