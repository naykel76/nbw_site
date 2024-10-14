# SELECT Statement Examples
<a id="markdown-select-statement-examples" name="select-statement-examples"></a>

<!-- TOC -->

- [BETWEEN](#between)
- [DISTINCT](#distinct)
- [GROUP](#group)
- [LIMIT](#limit)

<!-- /TOC -->


## BETWEEN
<a id="markdown-between" name="between"></a>

```sql
SELECT * FROM table_name WHERE date BETWEEN #07/01/1996# AND #07/31/1996#; ???????????
SELECT * FROM orders WHERE created_at BETWEEN 21/05/01 AND 221/05/01; ???????????
```

## DISTINCT
<a id="markdown-distinct" name="distinct"></a>

```sql
SELECT DISTINCT col_name FROM table_name;
```

## GROUP
<a id="markdown-group" name="group"></a>




## LIMIT
<a id="markdown-limit" name="limit"></a>

Return a limited number of results to improve performance by using the `LIMIT` clause. This takes two parameters `ROWSTART` and `MAXRESULTS` where `ROWSTART` id the number of the first row and `MAXRESULTS` is how many records are to be returned. **This is useful for pagination**

    SELECT * FROM table_name LIMIT ROWSTART, MAXRESULTS

```sql
SELECT first_name FROM students LIMIT 0, 16
SELECT first_name FROM students LIMIT 17, 16
```