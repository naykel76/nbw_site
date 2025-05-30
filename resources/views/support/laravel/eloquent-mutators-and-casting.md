# Eloquent: Mutators and Casting

- [Defining an Accessor](#defining-an-accessor)
- [Examples](#examples)
    - [Convert a comma separated string of values into an array.](#convert-a-comma-separated-string-of-values-into-an-array)
    - [Casts a date to a boolean, and save as date if true or null if false.](#casts-a-date-to-a-boolean-and-save-as-date-if-true-or-null-if-false)
- [Trouble Shooting](#trouble-shooting)
    - [Not mutating as expected](#not-mutating-as-expected)


## Defining an Accessor

An accessor transforms an Eloquent attribute value when it is accessed. 

Existing attributes can be transformed by defining a method in the model class
that matches the attribute name in pascal case.  For example, if you have an
attribute `first_name` then the method name should be `firstName()`.

```php
protected function firstName(): Attribute
{
    return Attribute::make(
        get: fn (string $value) => ucfirst($value),
        set: fn (string $value) => ucfirst($value),
    );
}
```

## Examples

### Convert a comma separated string of values into an array.



### Casts a date to a boolean, and save as date if true or null if false.

```php
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

```php
public function getOriginalActivatedAt(){
    return $this->getOriginal('activated_at');
}
```


## Trouble Shooting

### Not mutating as expected

Make sure you have set the method name correctly in pascal case.  For example,
if you have an attribute `published_at` then the method name should be
`publishedAt()`.





