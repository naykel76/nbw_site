# Seeding Data

<!-- TOC -->

- [Text and Paragraphs](#text-and-paragraphs)
  - [Sentence](#sentence)
  - [Real text](#real-text)
- [Numbers](#numbers)
  - [`randomFloat`](#randomfloat)
- [Arrays and Random Elements](#arrays-and-random-elements)
- [Date and Time](#date-and-time)
  - [Get 100 random dates within the last year](#get-100-random-dates-within-the-last-year)
- [Seed using records from an existing table](#seed-using-records-from-an-existing-table)
- [Seeding Data Examples](#seeding-data-examples)
- [Booleans](#booleans)
- [FAQ's and Trouble Shooting](#faqs-and-trouble-shooting)
  - [How can I create and run a package seeder?](#how-can-i-create-and-run-a-package-seeder)
  - [Error: Array to string conversion](#error-array-to-string-conversion)

<!-- /TOC -->


<a id="markdown-text-and-paragraphs" name="text-and-paragraphs"></a>

## Text and Paragraphs

<a id="markdown-sentence" name="sentence"></a>

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

<a id="markdown-real-text" name="real-text"></a>

### Real text

```php
'body' => $this->faker->realText(500)
'body' => fake()->realText(500)
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

<a id="markdown-arrays-and-random-elements" name="arrays-and-random-elements"></a>

## Arrays and Random Elements

```php
<!-- Select random value from array -->
$images = ['samples/sample001-600x338.jpg', 'samples/sample002-600x338.jpg', 'samples/sample003-600x338.jpg'];
'image' => $this->faker->randomElement($images),
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

<!-- 
@method \DateTime creditCardExpirationDate($valid = true)
@method \DateTime dateTime($max = 'now', $timezone = null)
@method \DateTime dateTimeAD($max = 'now', $timezone = null)
@method \DateTime dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
@method \DateTime dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null)
@method \DateTime dateTimeThisCentury($max = 'now', $timezone = null)
@method \DateTime dateTimeThisDecade($max = 'now', $timezone = null)
@method \DateTime dateTimeThisMonth($max = 'now', $timezone = null)
@method \DateTime dateTimeThisYear($max = 'now', $timezone = null)
@method array creditCardDetails($valid = true)
@method array hslColorAsArray()
@method array randomElements($array = ['a', 'b', 'c'], $count = 1, $allowDuplicates = false)
@method array rgbColorAsArray()
@method array shuffleArray($array = [])
@method array|string paragraphs($nb = 3, $asText = false)
@method array|string sentences($nb = 3, $asText = false)
@method array|string shuffle($arg = '')
@method array|string words($nb = 3, $asText = false)
@method bool boolean($chanceOfGettingTrue = 50)
@method float latitude($min = -90, $max = 90)
@method float longitude($min = -180, $max = 180)
@method float[] localCoordinates()
@method int biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt')
@method int imei()
@method int randomDigitNotNull()
@method int unixTime($max = 'now')
@method int|string|null randomKey($array = [])
@method mixed passthrough($value)
@method mixed randomElement($array = ['a', 'b', 'c'])
@method string address()
@method string amPm($max = 'now')
@method string asciify($string = '****')
@method string bothify($string = '## ??')
@method string buildingNumber()
@method string century()
@method string chrome()
@method string city()
@method string citySuffix()
@method string colorName()
@method string company()
@method string companyEmail()
@method string companySuffix()
@method string country()
@method string countryCode()
@method string countryISOAlpha3()
@method string creditCardExpirationDateString($valid = true, $expirationDateFormat = null)
@method string creditCardNumber($type = null, $formatted = false, $separator = '-')
@method string creditCardType()
@method string currencyCode()
@method string date($format = 'Y-m-d', $max = 'now')
@method string dayOfMonth($max = 'now')
@method string dayOfWeek($max = 'now')
@method string domainName()
@method string domainWord()
@method string e164PhoneNumber()
@method string email()
@method string emoji()
@method string file($sourceDirectory = '/tmp', $targetDirectory = '/tmp', $fullPath = true)
@method string firefox()
@method string firstName($gender = null)
@method string firstNameFemale()
@method string firstNameMale()
@method string freeEmail()
@method string freeEmailDomain()
@method string getDefaultTimezone()
@method string hexColor()
@method string hslColor()
@method string iban($countryCode = null, $prefix = '', $length = null)
@method string image($dir = null, $width = 640, $height = 480, $category = null, $fullPath = true, $randomize = true, $word = null, $gray = false, string $format = 'png')
@method string imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false, string $format = 'png')
@method string internetExplorer()
@method string iosMobileToken()
@method string ipv4()
@method string ipv6()
@method string iso8601($max = 'now')
@method string jobTitle()
@method string languageCode()
@method string lastName($gender = null)
@method string lexify($string = '????')
@method string linuxPlatformToken()
@method string linuxProcessor()
@method string localIpv4()
@method string locale()
@method string macAddress()
@method string macPlatformToken()
@method string macProcessor()
@method string md5()
@method string month($max = 'now')
@method string monthName($max = 'now')
@method string msedge()
@method string name($gender = null)
@method string numerify($string = '###')
@method string opera()
@method string paragraph($nbSentences = 3, $variableNbSentences = true)
@method string password($minLength = 6, $maxLength = 20)
@method string phoneNumber()
@method string postcode()
@method string randomAscii()
@method string randomHtml($maxDepth = 4, $maxWidth = 4)
@method string randomLetter()
@method string realText($maxNbChars = 200, $indexSize = 2)
@method string realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2)
@method string regexify($regex = '')
@method string rgbColor()
@method string rgbCssColor()
@method string rgbaCssColor()
@method string safari()
@method string safeColorName()
@method string safeEmail()
@method string safeEmailDomain()
@method string safeHexColor()
@method string sentence($nbWords = 6, $variableNbWords = true)
@method string sha1()
@method string sha256()
@method string shuffleString($string = '', $encoding = 'UTF-8')
@method string slug($nbWords = 6, $variableNbWords = true)
@method string streetAddress()
@method string streetName()
@method string streetSuffix()
@method string swiftBicNumber()
@method string text($maxNbChars = 200)
@method string time($format = 'H:i:s', $max = 'now')
@method string timezone($countryCode = null)
@method string title($gender = null)
@method string titleFemale()
@method string titleMale()
@method string tld()
@method string toLower($string = '')
@method string toUpper($string = '')
@method string url()
@method string userAgent()
@method string userName()
@method string uuid()
@method string windowsPlatformToken()
@method string word()
@method string year($max = 'now')
@method void setDefaultTimezone($timezone = null)
@property \DateTime $creditCardExpirationDate
@property \DateTime $dateTime
@property \DateTime $dateTimeAD
@property \DateTime $dateTimeBetween
@property \DateTime $dateTimeInInterval
@property \DateTime $dateTimeThisCentury
@property \DateTime $dateTimeThisDecade
@property \DateTime $dateTimeThisMonth
@property \DateTime $dateTimeThisYear
@property array $creditCardDetails
@property array $hslColorAsArray
@property array $randomElements
@property array $rgbColorAsArray
@property array $shuffleArray
@property array|string $paragraphs
@property array|string $sentences
@property array|string $shuffle
@property array|string $words
@property bool $boolean
@property float $latitude
@property float $longitude
@property float[] $localCoordinates
@property int $biasedNumberBetween
@property int $imei
@property int $randomDigitNotNull
@property int $unixTime
@property int|string|null $randomKey
@property mixed $passthrough
@property mixed $randomElement
@property string $address
@property string $amPm
@property string $asciify
@property string $bothify
@property string $buildingNumber
@property string $century
@property string $chrome
@property string $city
@property string $colorName
@property string $company
@property string $companyEmail
@property string $companySuffix
@property string $country
@property string $countryCode
@property string $countryISOAlpha3
@property string $creditCardExpirationDateString
@property string $creditCardNumber
@property string $creditCardType
@property string $currencyCode
@property string $date
@property string $dayOfMonth
@property string $dayOfWeek
@property string $domainName
@property string $domainWord
@property string $e164PhoneNumber
@property string $email
@property string $emoji
@property string $file
@property string $firefox
@property string $firstName
@property string $firstNameFemale
@property string $firstNameMale
@property string $freeEmail
@property string $freeEmailDomain
@property string $getDefaultTimezone
@property string $hexColor
@property string $hslColor
@property string $iban
@property string $image
@property string $imageUrl
@property string $internetExplorer
@property string $iosMobileToken
@property string $ipv4
@property string $ipv6
@property string $iso8601
@property string $jobTitle
@property string $languageCode
@property string $lastName
@property string $lexify
@property string $linuxPlatformToken
@property string $linuxProcessor
@property string $localIpv4
@property string $locale
@property string $macAddress
@property string $macPlatformToken
@property string $macProcessor
@property string $md5
@property string $month
@property string $monthName
@property string $msedge
@property string $name
@property string $numerify
@property string $opera
@property string $paragraph
@property string $password
@property string $phoneNumber
@property string $postcode
@property string $randomAscii
@property string $randomHtml
@property string $randomLetter
@property string $realText
@property string $realTextBetween
@property string $regexify
@property string $rgbColor
@property string $rgbCssColor
@property string $rgbaCssColor
@property string $safari
@property string $safeColorName
@property string $safeEmail
@property string $safeEmailDomain
@property string $safeHexColor
@property string $sentence
@property string $sha1
@property string $sha256
@property string $shuffleString
@property string $slug
@property string $streetAddress
@property string $streetName
@property string $streetSuffix
@property string $swiftBicNumber
@property string $text
@property string $time
@property string $timezone
@property string $title
@property string $titleFemale
@property string $titleMale
@property string $tld
@property string $toLower
@property string $toUpper
@property string $url
@property string $userAgent
@property string $userName
@property string $uuid
@property string $windowsPlatformToken
@property string $word
@property string $year
@property void $setDefaultTimezone
@property string $citySuffix -->