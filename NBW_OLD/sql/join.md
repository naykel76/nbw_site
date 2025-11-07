pr# JOIN Examples
<!-- TOC -->

- [Examples](#examples)

<!-- /TOC -->

[Laravel Examples](/docs/laravel/eloquent-query-builder)




```sql
SELECT * FROM parent_pk
INNER JOIN child_fk
ON parent_pk.id = child_fk.parent_pk_id;
```

**Pseudo says:**  <br>
JOIN `join_to`, using `join_to.id`(PK) <br>
CONSTRAINED ON `current_table.join_to_id`(FK)


```php +code
Model::join('join_to', 'join_to.id', 'current_table.join_to_id')->get();
```

<a id="markdown-examples" name="examples"></a>

## Examples
```sql
SELECT * FROM chapters
INNER JOIN media ON chapters.id = media.chapter_id;
```

**Task:** Select all the 'chapter titles' with no related media
```sql
SELECT id, title FROM chapters
WHERE id NOT IN (SELECT chapter_id FROM media group by chapter_id);
```
