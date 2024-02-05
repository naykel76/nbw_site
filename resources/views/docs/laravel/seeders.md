# Seeding Data

<!-- TOC -->

- [Text and Paragraphs](#text-and-paragraphs)
- [Seed using records from an existing table](#seed-using-records-from-an-existing-table)
- [Seeding Data Examples](#seeding-data-examples)
- [Booleans](#booleans)
- [Arrays and Random Elements](#arrays-and-random-elements)
- [Numbers](#numbers)
    - [`randomFloat`](#randomfloat)
- [Date and Time](#date-and-time)
    - [Get 100 random dates within the last year](#get-100-random-dates-within-the-last-year)
- [FAQ's and Trouble Shooting](#faqs-and-trouble-shooting)
    - [How can I create and run a package seeder?](#how-can-i-create-and-run-a-package-seeder)
    - [Error: Array to string conversion](#error-array-to-string-conversion)

<!-- /TOC -->


<a id="markdown-text-and-paragraphs" name="text-and-paragraphs"></a>

## Text and Paragraphs

```php
'name' => $this->faker->name();        // 'Vince Sporer'
'email' => $this->faker->email();      // 'walter.sophia@hotmail.com'
'status' => $this->faker->randomElement(['success', 'failed', 'processing']),

// array of words ['praesentium', 'possimus', 'modi']
'' => $this->faker->words(),
'' => $this->faker->words(5),
// string of words 'placeat vero saepe'
'' => $this->faker->words(3, true),

'description' => $this->faker->sentence,         // default 6 words
'description' => $this->faker->sentence(10),     // set num words
'description' => $this->faker->sentence(random_int(15, 50)),


// random string of text (default 200 characters)
'title' => $this->faker->text(random_int(30, 100)),
'body' => $this->faker->randomHtml(2, 3),

'' => $this->faker->paragraph(2);

'' => $this->faker->paragraph(2, false);
```

-
-
-
-
-
-
-
-
-
-
<a id="markdown-seed-using-records-from-an-existing-table" name="seed-using-records-from-an-existing-table"></a>

## Seed using records from an existing table

For example, lets say you want to make a `playlist` of `songs` from an the 'songs table' where the
songs are not created using a seeder.


```php
return [
    'song_id' => Arr::random(Song::all()->pluck('id')->toArray()),
];
```




<a id="markdown-seeding-data-examples" name="seeding-data-examples"></a>

## Seeding Data Examples

[Faker Docs](https://fakerphp.github.io/)


<a id="markdown-booleans" name="booleans"></a>

## Booleans

```php
'is_published' => (rand(1,9) > 7)
```




<a id="markdown-arrays-and-random-elements" name="arrays-and-random-elements"></a>

## Arrays and Random Elements

```php
<!-- Select random value from array -->
$images = ['samples/sample001-600x338.jpg', 'samples/sample002-600x338.jpg', 'samples/sample003-600x338.jpg'];
'image' => $this->faker->randomElement($images),
```


<a id="markdown-numbers" name="numbers"></a>

## Numbers

```php
random_int(5, 87),

// an integer between 0 and 9
'' => $this->faker->randomDigit();
// random integer with UP TO n digits (123, 43, 19238, 5, or 1203)
'' => $this->faker->randomNumber(5, false);
// random integer with EXACTLY n digits (2643, 42931, or 32919)
'' => $this->faker->randomNumber(5, true);
// integer between
'price' => $this->faker->numberBetween(500, 100000);

```

<a id="markdown-randomfloat" name="randomfloat"></a>

### `randomFloat`

```php
'price' => $this->faker->randomFloat(2),
// decimals, min, max
'price' => $this->faker->randomFloat(2, 5, 30);

'price' => ceil($this->faker->randomFloat(2, 5, 10.50)*10)/10,

```


<a id="markdown-date-and-time" name="date-and-time"></a>

## Date and Time

```php
'created_at' => now(),
// create random date within 1 year past and future
'created_at' => Carbon::today()->subDays(rand(-365, 365)),
```

'order_date' => \Carbon\Carbon::today()->subDays(rand(-365, 365)),

'amount' => $this->faker->numberBetween(500, 9000),
'payment_id' => Str::random(10)



<a id="markdown-get-100-random-dates-within-the-last-year" name="get-100-random-dates-within-the-last-year"></a>

### Get 100 random dates within the last year

```php
$dates = [];

for ($i = 0; $i < 100; $i++) {

    $dates[] = Carbon::today()->subDays(rand(-365, 0));
}
```


<a id="markdown-faqs-and-trouble-shooting" name="faqs-and-trouble-shooting"></a>

## FAQ's and Trouble Shooting


<a id="markdown-how-can-i-create-and-run-a-package-seeder" name="how-can-i-create-and-run-a-package-seeder"></a>

### How can I create and run a package seeder?

Create the seeder as you would any other and be sure to update the namespace to your package namespace.

```php
namespace Naykel\Pageit\Database\Seeders;

use Illuminate\Database\Seeder;
use Naykel\Pageit\Models\Page;

class PageSeeder extends Seeder {
    public function run() { }
}
```

Add the seeder to the autoload section in `composer.json`

``` json
"autoload": {
    "psr-4": {
        "Naykel\\Pageit\\": "src/",
        "Naykel\\Pageit\\Database\\Seeders\\": "src/database/seeders/"
    }
},
```

Add seeder to `DatabaseSeeder.php`

```php
$this->call(\Naykel\Pageit\Database\Seeders\PageSeeder::class);
```


<a id="markdown-error-array-to-string-conversion" name="error-array-to-string-conversion"></a>

### Error: Array to string conversion

Make sure `$cast` is set in the model

```php
protected $casts = [
    'extra_data' => 'array',
];
```
