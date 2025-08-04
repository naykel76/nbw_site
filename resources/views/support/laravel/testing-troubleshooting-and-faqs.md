# Laravel Testing Troubleshooting and FAQs

## Why does a custom date cast (e.g. `DateCast::class`) still act like a Carbon object in tests?

When using a factory, Laravel sets attributes like `start_date` directly on the
model in memory. These are usually plain `Carbon` objects and do **not** go
through the custom cast’s `get()` method.

Custom casts are only applied when you load the model **from the database**, not
when it’s freshly created in memory.

So, right after calling `create()`, the `start_date` hasn’t been cast using your
custom logic—it’s just whatever the factory gave it.

```php +torchlight-php
$event = Event::factory()->create(); 
// At this point, $event->start_date is a Carbon instance as the custom cast has not been applied yet
expect($event->start_date)->toBeInstanceOf(Carbon\Carbon::class);
```

To trigger the custom cast, reload the model:

```php
$event = Event::find($event->id);
// Now the cast is applied
```
