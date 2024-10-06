# FAQ's and Trouble Shooting

Here are some common questions and issues that you may encounter while working with Laravel.

- [Models](#models)
  - [How can I set the default sort column on a model?](#how-can-i-set-the-default-sort-column-on-a-model)
  - [How can I populate Laravel models without DB data?](#how-can-i-populate-laravel-models-without-db-data)

## Models

### <question>How can I set the default sort column on a model?</question>

Eloquent orders records based on their primary key, you can change the default sorting column by
adding a global scope to the model.


```php
protected static function booted() {
    static::addGlobalScope('position', function (Builder $builder) {
        $builder->orderBy('position');
    });
}
```

### <question>How can I populate Laravel models without DB data?</question>

Use the `Sushi` package to populate Laravel models without DB data. It is also useful when you want
to populate your models with static data.

Using this package consists of two steps:

Add the `Sushi` trait to a model.
Add a `$rows` property to the model.

```bash
composer require calebporzio/sushi
```

```php
class State extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        [
            'abbr' => 'NY',
            'name' => 'New York',
        ],
        [
            'abbr' => 'CA',
            'name' => 'California',
        ],
    ];
}
```

Now you can use the model as usual.

```php
$states = State::all();
$stateName = State::whereAbbr('NY')->first()->name;
```

For more information, visit the <a href="https://github.com/calebporzio/sushi" target="blank">Sushi GitHub repository</a>
