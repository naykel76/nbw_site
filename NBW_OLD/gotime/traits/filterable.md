# Filterable Trait

- [Overview](#overview)
- [scopeWhereDateWithinLast](#scopewheredatewithinlast)


## Overview

The `Filterable` trait simplifies adding common query filters to Eloquent models by
providing reusable query scopes, such as those for date ranges. This improves code reuse
and reduces boilerplate.

To use the `Filterable` trait, include it in your model class as follows:

```php +torchlight-php
use App\Models\Traits\Filterable;

class MyModel extends Model
{
    use Filterable;
}
```

## scopeWhereDateWithinLast

The `scopeWhereDateWithinLast` query scope allows you to filter records where the specified
date column falls within the last N days.

```php +torchlight-php
$lastWeek = MyModel::whereDateWithinLast('created_at', 7)->get();
```

In this example, the query will return all records from `MyModel` where the `created_at`
field is within the past 7 days.