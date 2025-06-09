# Select Unique Records

- [Eloquent](#eloquent)
- [SQL](#sql)
- [Sqlite](#sqlite)


## Eloquent

```php
$unique = Model::select('column')->distinct()->get();  

$unique = Model::select('column')->distinct()->pluck('column'); 
```

## SQL

## Sqlite