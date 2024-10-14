# Laravel Migrations

- [Quick Reference](#quick-reference)
- [Foreign Key Constraints](#foreign-key-constraints)
- [Cascade Actions](#cascade-actions)
- [Check for Table Existence](#check-for-table-existence)


## Quick Reference

| Command                                 | Notes                                          |
| :-------------------------------------- | :--------------------------------------------- |
| `php artisan migrate:fresh`             | Drop all table the execute migrate             |
| `php artisan migrate:fresh --seed`      | Drop all table the execute migrate and seeders |
| `php artisan migrate:reset`             | Rollback migrations                            |
| `php artisan migrate:rollback --step=5` |                                                |

## Foreign Key Constraints

<a href="https://laravel.com/docs/11.x/migrations#foreign-key-constraints" target="blank">Laravel Foreign Key Constraints</a>

**When using the verbose syntax, you must define the column before defining the foreign key constraint.**

```php
// verbose syntax
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');

// terser syntax automatically creates an UNSIGNED BIGINT equivalent column
$table->foreignId('user_id')->constrained();
```

To force referential integrity, you can add the `->constrained()` method to the column definition.
This will create a foreign key constraint on the column.

```php
$table->foreignId('user_id')->constrained();
```

## Cascade Actions

```php
$table->foreignId('post_id')->constrained()->cascadeOnDelete();
```

```php
$table->cascadeOnUpdate();      // Updates should cascade.
$table->restrictOnUpdate();     // Updates should be restricted.
$table->cascadeOnDelete();      // Deletes should cascade.
$table->restrictOnDelete();     // Deletes should be restricted.
$table->nullOnDelete();         // Deletes should set the foreign key value to null.
```

## Check for Table Existence

```php
if (!Schema::hasTable('table_name')) {
    // Do stuff
}
```
