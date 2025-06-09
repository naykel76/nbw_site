# SELECT Statement Examples

- [BETWEEN](#between)


## BETWEEN

Enter dates in the format `YYYY-MM-DD`.

```sql
SELECT * FROM table_name WHERE date BETWEEN '1996-07-01' AND '1996-07-31';
```



UPDATE student_lessons
SET    attempt = 3,
       result = 50
WHERE  lesson_id = 531
       AND completed_at > '2024-01-01'; 