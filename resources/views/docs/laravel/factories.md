# Factories

- [Set Factory State](#set-factory-state)
- [Factory Relationships](#factory-relationships)
  - [Has Many Relationships](#has-many-relationships)
  - [Nested Relationships](#nested-relationships)
    - [`randomFloat`](#randomfloat)
  - [Unique Data](#unique-data)
- [Additional Resources](#additional-resources)

## Set Factory State

```php
public function published(?Carbon $date = null): self
{
    return $this->state(
        fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
    );
}
```

## Factory Relationships

### Has Many Relationships

```php
$course = Course::factory()
            ->has(Chapter::factory()->count(3))
            ->create();
```

### Nested Relationships

```php
$course = Course::factory()
            ->has(Chapter::factory()
                ->has(Media::factory()->count(3))
                ->count(3)
            )
            ->create();
```

```php



## Fake Data

### Numbers

#### `randomDigit`, `randomNumber`, `numberBetween` 

```php
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

```php
randomFloat($nbMaxDecimals = null, $min = 0, $max = null): 
```

```php
'price' => $this->faker->randomFloat(2),
'price' => $this->faker->randomFloat(2, 5, 30);
'price' => ceil($this->faker->randomFloat(2, 5, 10.50)*10)/10,
```

### Unique Data

You can generate unique data simply by using the `unique` method.

```php
'code' => $this->faker->unique()->numberBetween(1000000, 9000000),
'code' => $this->faker->unique()->randomNumber()
```



## Additional Resources

- <a href="https://fakerphp.org/" target="blank">FakerPHP Docs</a>
