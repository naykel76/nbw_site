# Laravel Migrations

<!-- TOC -->

- [Quick Reference](#quick-reference)
- [Foreign Key Constraints](#foreign-key-constraints)
- [Cascade Actions](#cascade-actions)
- [Check for Table Existence](#check-for-table-existence)

<!-- /TOC -->

<a id="markdown-quick-reference" name="quick-reference"></a>

## Quick Reference

| Command                                 | Notes                                          |
| :-------------------------------------- | :--------------------------------------------- |
| `php artisan migrate:fresh`             | Drop all table the execute migrate             |
| `php artisan migrate:fresh --seed`      | Drop all table the execute migrate and seeders |
| `php artisan migrate:reset`             | Rollback migrations                            |
| `php artisan migrate:rollback --step=5` |                                                |

<a id="markdown-foreign-key-constraints" name="foreign-key-constraints"></a>

## Foreign Key Constraints


```php
// verbose syntax
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');

// terser syntax automatically creates an UNSIGNED BIGINT equivalent column
$table->foreignId('user_id')->constrained();
```

<a id="markdown-cascade-actions" name="cascade-actions"></a>

## Cascade Actions

```php
$table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
$table->cascadeOnUpdate();      // Updates should cascade.
$table->restrictOnUpdate();     // Updates should be restricted.
$table->cascadeOnDelete();      // Deletes should cascade.
$table->restrictOnDelete();     // Deletes should be restricted.
$table->nullOnDelete();         // Deletes should set the foreign key value to null.
```

<a id="markdown-check-for-table-existence" name="check-for-table-existence"></a>

## Check for Table Existence

```php
if (!Schema::hasTable('table_name')) {
    // Do stuff
}
```
