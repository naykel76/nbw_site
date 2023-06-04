# Laravel Migrations

<!-- MarkdownTOC -->

- [Quick Reference](#quick-reference)
- [Foreign Key Constraints](#foreign-key-constraints)
- [Cascade Actions](#cascade-actions)
- [Check for Table Existence](#check-for-table-existence)

<!-- /MarkdownTOC -->
<a id="quick-reference"></a>
## Quick Reference

| Command                            | Notes                                          |
| :--------------------------------- | :--------------------------------------------- |
| `php artisan migrate:fresh`        | Drop all table the execute migrate             |
| `php artisan migrate:fresh --seed` | Drop all table the execute migrate and seeders |
| `php artisan migrate:reset`        | Rollback migrations                            |


<a id="foreign-key-constraints"></a>
## Foreign Key Constraints

https://laravel.com/docs/9.x/migrations#foreign-key-constraints

```php
// verbose syntax
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users');

// terser syntax automatically creates an UNSIGNED BIGINT equivalent column
$table->foreignId('user_id')->constrained();
```

<a id="cascade-actions"></a>
## Cascade Actions

```php
$table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
