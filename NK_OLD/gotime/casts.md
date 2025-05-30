# Casts

<!-- TOC -->

- [Casts](#casts)
    - [MoneyCast (integer to double)](#moneycast-integer-to-double)
    - [DateCast](#datecast)

<!-- /TOC -->

<p class="lead">Casting allows you to transform Eloquent attribute values when you retrieve or set them on model instances.</p>

<a id="markdown-moneycast-integer-to-double" name="moneycast-integer-to-double"></a>

## MoneyCast (integer to double)

This cast automatically converts money values stored as `integers` (cents) in the database to a
`double` value (dollars) when the attribute is accessed on your Eloquent model and convert it back
to cents when setting the value on the model.

```php
protected $casts = [
    'price' => \Naykel\Gotime\Casts\MoneyCast::class
];
```

<a id="markdown-datecast" name="datecast"></a>

## DateCast

This cast automatically converts date values, stored as `datetime` or `timestamps` in the database
to a `Carbon` instance when the attribute is accessed on your Eloquent model and convert it back
to `datetime` or `timestamps` when setting the value on the model.

The get method changes `timestamp` or `datetime` fields from the `Y-m-d H:i:s` format in the
database to the `d-m-y` format. Conversely, the set method reverts the data back to the `Y-m-d
H:i:s` format for database storage.

**Important:** this cast is strict and will yell at you if the format is not correct. **MUST** be `datetime` or `timestamps`

```php
protected $casts = [
    'ordered_at' => \Naykel\Gotime\Casts\DateCast::class,
];
```

```sql
-- input
2022-02-16 14:08:14
-- output
16-02-22
```
