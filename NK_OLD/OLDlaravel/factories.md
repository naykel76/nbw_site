# Factories

- [Defining Factories](#defining-factories)
    - [Create Factory States](#create-factory-states)
    - [Using Factory States](#using-factory-states)
- [Using Factories to Generate Related Models](#using-factories-to-generate-related-models)
- [Factory Relationships](#factory-relationships)
    - [Has Many Relationships](#has-many-relationships)
    - [Nested Relationships](#nested-relationships)
- [Fake Data](#fake-data)
    - [Numbers](#numbers)
        - [`randomDigit`, `randomNumber`, `numberBetween`](#randomdigit-randomnumber-numberbetween)
        - [`randomFloat`](#randomfloat)
    - [Unique Data](#unique-data)
- [Additional Resources](#additional-resources)


## Defining Factories

### Create Factory States

<a href="https://laravel.com/docs/11.x/eloquent-factories#factory-states"
target="blank">https://laravel.com/docs/11.x/eloquent-factories#factory-states</a>

```php +torchlight-php
public function published(?Carbon $date = null): self
{
    return $this->state(
        fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
    );
}
```

### Using Factory States

```php +torchlight-php
$course = Course::factory()->published()->create();
```

## Using Factories to Generate Related Models

When creating a model with relationships, you can use factories to generate related models.

```php +torchlight-php
return [
    'started_at' => now(),
    'user_id' => User::factory(), // Use the User factory to generate a user_id
];
```



## Factory Relationships

### Has Many Relationships

```php +torchlight-php
$course = Course::factory()
            ->has(Chapter::factory()->count(3))
            ->create();
```

### Nested Relationships

```php +torchlight-php
$course = Course::factory()
            ->has(Chapter::factory()
                ->has(Media::factory()->count(3))
                ->count(3)
            )
            ->create();
```




## Fake Data

### Numbers

#### `randomDigit`, `randomNumber`, `numberBetween` 

```php +torchlight-php
// an integer between 0 and 9
$this->faker->randomDigit();
// random integer with UP TO n digits (123, 43, 19238, 5, or 1203)
$this->faker->randomNumber(5, false);
// random integer with EXACTLY n digits (2643, 42931, or 32919)
$this->faker->randomNumber(5, true);
// integer between
'price' => $this->faker->numberBetween(500, 100000);
```

#### `randomFloat`

```php +torchlight-php
randomFloat($nbMaxDecimals = null, $min = 0, $max = null): 
```

```php +torchlight-php
'price' => $this->faker->randomFloat(2),
'price' => $this->faker->randomFloat(2, 5, 30);
'price' => ceil($this->faker->randomFloat(2, 5, 10.50)*10)/10,
```

### Unique Data

You can generate unique data simply by using the `unique` method.

```php +torchlight-php
'code' => $this->faker->unique()->numberBetween(1000000, 9000000),
'code' => $this->faker->unique()->randomNumber()
```



## Additional Resources

- <a href="https://fakerphp.org/" target="blank">FakerPHP Docs</a>
