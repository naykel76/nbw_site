# Laravel Migrations


## Foreign Key Constraints

<a href="https://laravel.com/docs/11.x/migrations#foreign-key-constraints" target="blank">Laravel Foreign Key Constraints</a>

Automatically creates an `UNSIGNED BIGINT` column

```php +code
$table->foreignId('user_id');
```

**When using the verbose syntax, you must define the column before defining the foreign key constraint.**

```php +code
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');
```

## Self Referencing Foreign Keys

```php +code
$table->foreignId('program_id')->constrained('courses');
```

This creates a foreign key on `program_id` referencing `id` on the `courses`
table. Since the column name doesn’t follow Laravel’s conventions, you must
define the `program` relationship manually in the model.

```php +code
public function program() {
    return $this->belongsTo(Course::class, 'program_id');
}
```



<!-- To force referential integrity, you can add the `->constrained()` method to the column definition.
This will create a foreign key constraint on the column.

```php +code
$table->foreignId('user_id')->constrained();
``` -->

## Cascade Actions

```php +code
$table->foreignId('post_id')->constrained()->cascadeOnDelete();
```

```php +code
$table->cascadeOnUpdate();      // Updates should cascade.
$table->restrictOnUpdate();     // Updates should be restricted.
$table->cascadeOnDelete();      // Deletes should cascade.
$table->restrictOnDelete();     // Deletes should be restricted.
$table->nullOnDelete();         // Deletes should set the foreign key value to null.
```

