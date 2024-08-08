# Seeding Data

- [Text and Paragraphs](#text-and-paragraphs)
  - [Sentence](#sentence)
  - [Real text](#real-text)
- [Arrays and Random Elements](#arrays-and-random-elements)
- [Date and Time](#date-and-time)
  - [Get 100 random dates within the last year](#get-100-random-dates-within-the-last-year)
- [Seed using records from an existing table](#seed-using-records-from-an-existing-table)
- [Booleans](#booleans)

## Text and Paragraphs

### Sentence

```php
// random string of text, remove last period and title case
'title' => str($this->faker->sentence)->beforeLast('.')->title(),

'description' => $this->faker->sentence,         // default 6 words
'description' => $this->faker->sentence(10),     // set num words
'description' => $this->faker->sentence(random_int(15, 50)),
```

```php
'name' => $this->faker->name();        // 'Vince Sporer'
'email' => $this->faker->email();      // 'walter.sophia@hotmail.com'
'status' => $this->faker->randomElement(['success', 'failed', 'processing']),

// random string of text (default 200 characters)
'title' => $this->faker->text(random_int(30, 100)),


'body' => $this->faker->randomHtml(2, 3),
```

### Real text

```php
'body' => $this->faker->realText(500)
'body' => fake()->realText(500)
```




## Arrays and Random Elements

```php
<!-- Select random value from array -->
$images = ['samples/sample001-600x338.jpg', 'samples/sample002-600x338.jpg', 'samples/sample003-600x338.jpg'];
'image' => $this->faker->randomElement($images),
```

## Date and Time

```php
'created_at' => now(),
// create random date within 1 year past and future
'created_at' => Carbon::today()->subDays(rand(-365, 365)),
```

'order_date' => \Carbon\Carbon::today()->subDays(rand(-365, 365)),

'amount' => $this->faker->numberBetween(500, 9000),
'payment_id' => Str::random(10)



### Get 100 random dates within the last year

```php
$dates = [];

for ($i = 0; $i < 100; $i++) {

    $dates[] = Carbon::today()->subDays(rand(-365, 0));
}
```

## Seed using records from an existing table

For example, lets say you want to make a `playlist` of `songs` from an the 'songs table' where the
songs are not created using a seeder.


```php
return [
    'song_id' => Arr::random(Song::all()->pluck('id')->toArray()),
];
```







## Booleans

```php
'is_published' => (rand(1,9) > 7)
```
