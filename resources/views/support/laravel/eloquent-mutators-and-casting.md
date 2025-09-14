# Eloquent: Mutators and Casting

- [Defining an Accessor](#defining-an-accessor)
- [Examples](#examples)
    - [Cast Empty String to Null](#cast-empty-string-to-null)
    - [Cast Date to Boolean](#cast-date-to-boolean)
- [Trouble Shooting](#trouble-shooting)
    - [Not mutating as expected](#not-mutating-as-expected)


## Defining an Accessor


* An accessor transforms an Eloquent attribute value when it is accessed. 
* To define an accessor, add a protected method to your model for the attribute
  you want to access.
* The method name should match the camelCase version of the model attribute or
  database column.


```php +torchlight-php
protected function firstName(): Attribute
{
    return Attribute::make(
        get: fn (string $value) => ucfirst($value),
        set: fn (string $value) => ucfirst($value),
    );
}
```

## Examples

### Cast Empty String to Null

```php +torchlight-php
  protected function relatedWidgetId(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value === '' ? null : $value,
        );
    }
```

### Cast Date to Boolean

Saves as a date if true or null if false.

```php +torchlight-php
protected function activatedAt(): Attribute
{
    return Attribute::make(
        get: fn ($value) => $value ? true : false,
        set: fn ($value) => $value ? now() : null,
    );
}
```

The may be occasions where you want to display the actual date stored in the
database, for this you can use the `getOriginal()` method.

```php +torchlight-php
public function getOriginalActivatedAt(){
    return $this->getOriginal('activated_at');
}
```

## Trouble Shooting

### Not mutating as expected

Make sure you have set the method name correctly in pascal case. For example, if
you have an attribute `published_at` then the method name should be
`publishedAt()`.





