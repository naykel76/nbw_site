# FAQ's

Here are some common questions and issues that you may encounter while working with Laravel.

- [Models](#models)
    - [How can I set the default sort column on a model?](#how-can-i-set-the-default-sort-column-on-a-model)
    - [How can I populate Laravel models without DB data?](#how-can-i-populate-laravel-models-without-db-data)
    - [What is the Model `$appends` Property: How Does It Work?](#what-is-the-model-appends-property-how-does-it-work)
- [Eloquent](#eloquent)
    - [What is the difference between the following two queries?](#what-is-the-difference-between-the-following-two-queries)

## Models

#### <question>How can I set the default sort column on a model?</question>

Eloquent orders records based on their primary key, you can change the default sorting column by
adding a global scope to the model.


```php +torchlight-php
protected static function booted() {
    static::addGlobalScope('position', function (Builder $builder) {
        $builder->orderBy('position');
    });
}
```

#### <question>How can I populate Laravel models without DB data?</question>

Use the `Sushi` package to populate Laravel models without DB data. It is also useful when you want
to populate your models with static data.

Using this package consists of two steps:

Add the `Sushi` trait to a model.
Add a `$rows` property to the model.

```bash
composer require calebporzio/sushi
```

```php +torchlight-php
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

```php +torchlight-php
$states = State::all();
$stateName = State::whereAbbr('NY')->first()->name;
```

For more information, visit the <a href="https://github.com/calebporzio/sushi" target="blank">Sushi GitHub repository</a>


#### <question>What is the Model `$appends` Property: How Does It Work?</question>

In Laravel, the `$appends` property on an Eloquent model allows you to add custom attributes to the
model's array and JSON representations. These attributes are not stored in the database; they are
"computed" or "accessor" attributes, meaning they are generated at runtime based on some logic in
the model.

**How It Works:**

To use the `$appends` property you;

1. Define an "accessor" in your model, which are methods that provide logic for computing the value
   of the custom attribute. These methods must follow the naming convention of
   `get{AttributeName}Attribute`.

    ```php +torchlight-php
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    ```

2. After defining the accessor, you include the attribute name in the `$appends` property on the
   model. The attribute name should be in snake_case, matching how it would appear in the JSON
   output.

    ```php +torchlight-php
    class User extends Model
    {
        protected $appends = ['full_name'];

        public function getFullNameAttribute()
        {
            return "{$this->first_name} {$this->last_name}";
        }
    }
    ```


## Eloquent

#### <question>What is the difference between the following two queries?</question>

```php +torchlight-php
$query = auth()->user()->studentCourses; // Collection
$query = auth()->user()->studentCourses(); // Query Builder
```

The first query returns a collection of courses that belong to the user. The second query returns a
query builder instance that you can further modify before executing the query.


