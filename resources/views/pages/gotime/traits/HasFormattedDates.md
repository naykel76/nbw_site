# HasFormattedDates Trait

- [Overview](#overview)
- [Query Scopes](#query-scopes)
- [Date Formatting](#date-formatting)
    - [Helper Methods for Common Fields](#helper-methods-for-common-fields)
- [Configuration](#configuration)

## Overview
The `HasFormattedDates` trait enhances your Laravel models with powerful date
filtering query scopes and convenient formatting methods. Instead of writing
repetitive date queries and formatting logic, this trait provides a clean,
consistent API for common date operations.

## Query Scopes

The trait provides several query scopes for common date filtering operations:

```php +code
whereDateWithinLast(string $column, int $days): Builder
whereDateWithinNext(string $column, int $days): Builder  
whereDateBetween(string $column, string $start, string $end): Builder
whereDateToday(string $column): Builder
whereDateThisWeek(string $column): Builder
whereDateThisMonth(string $column): Builder
whereDateOverdue(string $column): Builder
```

```php +code
User::whereDateWithinLast('created_at', 7)->get()
Event::whereDateWithinNext('start_date', 30)->get()
Task::whereDateToday('due_date')->get()
Task::whereDateOverdue('due_date')->get()
```

## Date Formatting

Methods for formatting date attributes into human-readable strings.

`formatDate(string $attribute, ?string $format = null): ?string`

```php +code
// Format any date attribute (uses config default if no format specified)
$user->formatDate('created_at'); // "2024-09-29" 
$user->formatDate('created_at', 'M d, Y'); // "Sep 29, 2024"
$user->formatDate('last_login', 'F j, Y g:i A'); // "September 29, 2024 2:30 PM"
```

```php +code
public function formatDate(string $attribute, ?string $format = null): ?string
public function createdAtDate(?string $format = null): ?string
public function updatedAtDate(?string $format = null): ?string
public function startDate(?string $format = null): ?string
public function endDate(?string $format = null): ?string
public function startedAtDate(?string $format = null): ?string
public function publishedAtDate(?string $format = null): ?string
public function completedAtDate(?string $format = null): ?string
```

### Helper Methods for Common Fields

These are quality-of-life methods for frequently used date fields like
`created_at`, `updated_at`, `started_at` ... etc.

```php +code
$user->createdAtDate();            // "2024-09-29"
$user->createdAtDate('M d, Y');    // "Sep 29, 2024"
$user->updatedAtDate('Y-m-d H:i'); // "2024-09-29 14:30"

$event->startDate('F j, Y');       // "September 29, 2024"
$event->endDate('F j, Y');         // "September 30, 2024"
$task->startedAtDate();            // "2024-09-29"
$task->completedAtDate();          // "2024-09-30"
$post->publishedAtDate('M j, Y');  // "Sep 29, 2024"
```

## Configuration

Set the default date format in your `config/gotime.php`:

```php +code
'date_format' => 'Y-m-d', // Default format used by all helpers
```