# Casts and Mutators
<!-- TOC -->

- [Defining and Accessor](#defining-and-accessor)
- [Usage Examples](#usage-examples)
    - [Return boolean if 'date' is set](#return-boolean-if-date-is-set)
    - [How to casts a data to a boolean, and save as date if true or null if false?](#how-to-casts-a-data-to-a-boolean-and-save-as-date-if-true-or-null-if-false)
- [Trouble Shooting](#trouble-shooting)
    - [Not mutating as expected](#not-mutating-as-expected)

<!-- /TOC -->

<a id="markdown-defining-and-accessor" name="defining-and-accessor"></a>

## Defining and Accessor

Laravel 9.x

```php
use Illuminate\Database\Eloquent\Casts\Attribute;

protected function name(): Attribute
{
    return Attribute::make(
        get: fn (string $value) => strToUpper($value)
    );
}
```

This is a contrived example, but it shows how you can manipulate the value of the attribute.

```php
protected function name(): Attribute
{
    return Attribute::make(
        get: fn () => 'Fish'
    );
}
```

Laravel 8.x

```php
protected function getNameAttribute($value){
    return strToUpper($value);
}
```

<a id="markdown-usage-examples" name="usage-examples"></a>

## Usage Examples

<a id="markdown-return-boolean-if-date-is-set" name="return-boolean-if-date-is-set"></a>

### Return boolean if 'date' is set

```php
protected function activatedAt(): Attribute
{
    return Attribute::make(
        get: fn ($value) => $value ? true : false,
    );
}
```

```php
public function isMember(): bool
{
    return $this->activated_at !== null;
}
```


<a id="markdown-how-to-casts-a-data-to-a-boolean-and-save-as-date-if-true-or-null-if-false" name="how-to-casts-a-data-to-a-boolean-and-save-as-date-if-true-or-null-if-false"></a>

### How to casts a data to a boolean, and save as date if true or null if false?

```php
protected function activatedAt(): Attribute
{
    return Attribute::make(
        get: fn ($value) => $value ? true : false,
        set: fn ($value) => $value ? now() : null,
    );
}
```

The may be occasions where you want to display the actual date stored in the database, for this
you can use the `getOriginal()` method.

```php
public function getOriginalActivatedAt(){
    return $this->getOriginal('activated_at');
}
```


<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble Shooting

<a id="markdown-not-mutating-as-expected" name="not-mutating-as-expected"></a>

### Not mutating as expected

Make sure you have set the method name correctly in pascal case.  For example, if you have an
attribute `published_at` then the method name should be `publishedAt()`.
