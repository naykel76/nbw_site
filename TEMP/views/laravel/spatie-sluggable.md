# NayKel Development Guides

## Creating and Using Slugs

The [spatie laravel-sluggable](https://github.com/spatie/laravel-sluggable) package provides a trait that will generate a unique slug when saving any Eloquent model.

### Using slugs in routes

To use the generated slug in routes, remember to use Laravel's (implicit route model binding)[https://laravel.com/docs/9.x/routing#implicit-binding]:


Here's an example of how to implement the trait and customize the key:

```php
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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
```



