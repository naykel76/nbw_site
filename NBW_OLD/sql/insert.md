# SQL Insert

- [Quick Reference](#quick-reference)
  - [INSERT selected columns](#insert-selected-columns)
- [Copy Records From Another Table](#copy-records-from-another-table)


## Quick Reference

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

### INSERT selected columns

```sql
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2)
-- seperate records with a comma to insert multiple records
INSERT INTO my_table(id, col1, col2) VALUES (null, val1, val2), (null, val1, val2)
```

## Copy Records From Another Table

To copy all records from another table, you can add a `SELECT` statement to the `INSERT` statement.

```sql
-- copy all records from another table
INSERT INTO my_table 
SELECT * FROM other_table;
```

```sql
-- copy selected records from another table
INSERT INTO my_table(id, col1, col2) 
SELECT id, col1, col2 FROM other_table;
```

-- create a new table and insert records from another?