# Enums

<!-- TOC -->

- [What is an enum?](#what-is-an-enum)
- [Why use enums?](#why-use-enums)
- [Using enums in Laravel models](#using-enums-in-laravel-models)
- [Looping over enums](#looping-over-enums)
- [FAQ's](#faqs)

<!-- /TOC -->

## What is an enum?

An enum is a special "class" that represents a group of constants (unchangeable variables, like final variables).

## Why use enums?

Enums are useful when you want to define a set of constants that represent a number of possible options.

```php +code
enum PublishedStatus: string
{
    case Draft = 'draft';
    case Published = 'published';

    public function label()
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Published => 'Published',
        };
    }

    public function icon()
    {
        return match ($this) {
            self::Draft => 'icon.pencil',
            self::Published => 'icon.check',
        };
    }

    public function color()
    {
        return match ($this) {
            self::Draft => 'purple',
            self::Published => 'green',
        };
    }
}
```

Access the values of an enum using the `::` syntax:

```php +code
PublishedStatus::Draft; // 'draft'
PublishedStatus::Published; // 'published'
```

You can also use the `::` syntax to access the methods of an enum:

```php +code
PublishedStatus::Draft()->label(); // 'Draft'
PublishedStatus::Draft()->icon(); // 'icon.pencil'
PublishedStatus::Draft()->color(); // 'purple'
```

## Using enums in Laravel models

Enums can be used in models as follows:

```php +code
use App\Enums\PublishedStatus;

class Post extends Model
{
    protected $casts = [
        'status' => PublishedStatus::class,
    ];
}
```

## Looping over enums

You can loop over the values of an enum using the `::cases()` method:

```php +code
foreach (PublishedStatus::cases() as $status) {
    echo $status->label();
}
```


## FAQ's

<question></question>
Should I use `self` or `static` in my enum methods?

In the context of PHP enums, you should use self instead of static. The static keyword is used for
late static binding where the called class is resolved at runtime, but enums don't support
inheritance, so there's no need for late static binding.
