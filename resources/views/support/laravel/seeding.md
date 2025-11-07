# Seeding

- [Numbers](#numbers)
    - [`randomDigit`, `randomNumber`, `numberBetween`](#randomdigit-randomnumber-numberbetween)
    - [`randomFloat`](#randomfloat)
    - [Text, Paragraphs and Sentences](#text-paragraphs-and-sentences)
- [Arrays and Random Elements](#arrays-and-random-elements)
- [Date and Time](#date-and-time)
    - [Get 100 random dates within the last year](#get-100-random-dates-within-the-last-year)
- [Seed using records from an existing table](#seed-using-records-from-an-existing-table)
- [Additional Resources](#additional-resources)


## Numbers

### `randomDigit`, `randomNumber`, `numberBetween` 

```php +code
// an integer between 0 and 9
fake()->randomDigit();
// random integer with UP TO n digits (123, 43, 19238, 5, or 1203)
fake()->randomNumber(5, false);
// random integer with EXACTLY n digits (2643, 42931, or 32919)
fake()->randomNumber(5, true);
// integer between
'price' => fake()->numberBetween(500, 100000);
```

### `randomFloat`

```php +code
randomFloat($nbMaxDecimals = null, $min = 0, $max = null): 
```

```php +code
'price' => fake()->randomFloat(2),
'price' => fake()->randomFloat(2, 5, 30);
'price' => ceil(fake()->randomFloat(2, 5, 10.50)*10)/10,
```

### Text, Paragraphs and Sentences

```php +code
'title' => fake()->sentence(),
'intro' => fake()->paragraph(),
'headline' => fake()->paragraph(),
'body' => fake()->paragraphs(3, true), // convert to string
```

    'code' => fake()->bothify('COU-??##'),

## Arrays and Random Elements

```php +code
<!-- Select random value from array -->
$images = ['samples/sample001-600x338.jpg', 'samples/sample002-600x338.jpg', 'samples/sample003-600x338.jpg'];
'image' => fake()->randomElement($images),
```

## Date and Time

```php +code
'created_at' => now(),
// create random date within 1 year past and future
'created_at' => Carbon::today()->subDays(rand(-365, 365)),
```

'order_date' => \Carbon\Carbon::today()->subDays(rand(-365, 365)),

'amount' => fake()->numberBetween(500, 9000),
'payment_id' => Str::random(10)



### Get 100 random dates within the last year

```php +code
$dates = [];

for ($i = 0; $i < 100; $i++) {

    $dates[] = Carbon::today()->subDays(rand(-365, 0));
}
```

## Seed using records from an existing table

For example, lets say you want to make a `playlist` of `songs` from an the 'songs table' where the
songs are not created using a seeder.


```php +code
return [
    'song_id' => Arr::random(Song::all()->pluck('id')->toArray()),
];
```
<!-- 



### Unique Data

You can generate unique data simply by using the `unique` method.

```php +code
'code' => fake()->unique()->numberBetween(1000000, 9000000),
'code' => fake()->unique()->randomNumber()
```



-->

## Additional Resources

- <a href="https://fakerphp.org/" target="blank">FakerPHP Docs</a> 