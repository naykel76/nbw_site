# Reading JSON Files

- [JavaScript (TBD)](#javascript-tbd)
- [Laravel](#laravel)
- [PHP](#php)


JSON file content used in the examples::

```js
[
    {
        "name": "Mick Dingle",
        "age": 30,
    },
    {
        "name": "Penny Appleton",
        "age": 30,
    },
]
```

## JavaScript (TBD)

## Laravel

Naykel helper function to read a JSON file and decode its content into a PHP object.

```php +torchlight-php
$file = getJsonFile($path);
```

## PHP

Reads a JSON file and decodes its content into a PHP object.

It uses the `file_get_contents` function to get the file content as a string, then decodes the
string into a PHP object using `json_decode`.

The `json_decode` function optionally accepts a second parameter to specify the output type. When
set to `true`, the result is an associative array. If omitted or set to `false` (default), the
result is an object (stdClass in PHP).

```php +torchlight-php
$path = 'path/to/file.json';
$jsonString = file_get_contents($path); // Read JSON file as a string
$jsonObject = json_decode($jsonString); // Decode JSON string into a PHP object
```

Output the content of the JSON file:

```php +torchlight-php
Array
(
    [0] => stdClass Object
        (
            [name] => Mick Dingle
            [age] => 30
        )
    [1] => stdClass Object
        (
            [name] => Penny Appleton
            [age] => 30
        )
)
```

