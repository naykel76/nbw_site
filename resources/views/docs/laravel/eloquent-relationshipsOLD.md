# Eloquent

<!-- MarkdownTOC -->

- [Inserting \& Updating Related Models](#inserting--updating-related-models)
    - [Save vs Create vs Update](#save-vs-create-vs-update)
- [Defining Relationships](#defining-relationships)
    - [Many to Many](#many-to-many)
        - [Create the pivot table and add constraints](#create-the-pivot-table-and-add-constraints)
    - [Attach and Detach Examples](#attach-and-detach-examples)
- [Lazy Eager Loading Examples](#lazy-eager-loading-examples)
    - [Eager Loading Specific Columns](#eager-loading-specific-columns)
- [Trouble Shooting](#trouble-shooting)

<!-- /MarkdownTOC -->


<a id="inserting--updating-related-models"></a>
## Inserting & Updating Related Models

<a id="save-vs-create-vs-update"></a>
### Save vs Create vs Update

The `save` method can be used to both create a new record and update a existing record. The `save` method accepts a full Eloquent model instance.

The `create` method accepts an array of attributes, creates a model, and inserts it into the database. The newly created model will be returned by the `create` method:

```php
$course = Course::create(['title' => 'Super course title']);
```


<a id="defining-relationships"></a>
## Defining Relationships

<a id="many-to-many"></a>
### Many to Many

**Case:** Many products can have many categories


```php
// App/Models/Product.php
public function categories() {
    return $this->belongsToMany(Category::class);
}
```

```php
// App/Models/Category.php
public function products() {
    return $this->belongsToMany(Product::class);
}
```


<a id="create-the-pivot-table-and-add-constraints"></a>
#### Create the pivot table and add constraints

```bash
php artisan make:migration create_category_product_table
```

```php
// database/migrations/create_category_product_table.php
$table->foreignId('category_id')->constrained();
$table->foreignId('product_id')->constrained();
```

<a id="attach-and-detach-examples"></a>
### Attach and Detach Examples


```php
Category::create([
    'name' => 'Category 1',
])->products()->createMany([
    [
        'name' => 'Product 123',
        'code' => 'item-123',
    ], [
        'name' => 'Product 456',
        'code' => 'item-456',
    ]
]);
```

```php
$cat = Category::create(['name' => 'Category 2']);

Product::create([
    'name' => 'Product ABC',
    'code' => 'item-abc',
])->categories()->attach($cat);
```

```php
$prd1 = Product::create([
    'name' => 'Product 789',
    'code' => 'item-789',
]);

$prd2 = Product::create([
    'name' => 'Product xyz',
    'code' => 'item-xyz',
]);

Category::create([
    'name' => 'Category 3'
])->products()->sync([1, $prd1->id, $prd2->id]);
```









<a id="eager-loading-examples"></a>
## Lazy Eager Loading Examples

To retrieve a single model with eager loading use the `->load()` method instead of `->with()`.

```php
// Eager load all models
User::all()->with('userProfile');
// Eager load after parent model has been retrieved
User::find(3)->load('userProfile');
```

<a id="eager-loading-specific-columns"></a>
### Eager Loading Specific Columns

Eloquent allows you to specify which columns of the relationship you would like to retrieve:

```php
$courses = App\Course::with('lesson:id,title')->get();
```



<a id="trouble-shooting"></a>
## Trouble Shooting

**Error:** Column not found: 1054 Unknown column <br>
Check table name, one of the most common reasons for this  error is the naming convention between singular and plural `course` or `courses`

