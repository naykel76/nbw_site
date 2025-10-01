# Spatie Laravel Sluggable

## Installation

You can install the package via composer:

```bash +torchlight-bash
composer require spatie/laravel-sluggable
```
## Creating and Using Slugs

The [spatie laravel-sluggable](https://github.com/spatie/laravel-sluggable) package provides a trait
that will generate a unique slug when saving any Eloquent model.

### Usage

Here's an example of how to implement the trait and customize the key:

```php +torchlight-php
namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class YourEloquentModel extends Model
{
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
```



