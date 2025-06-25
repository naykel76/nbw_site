# Reading JSON Files

- [Count the number of items in an array](#count-the-number-of-items-in-an-array)
  - [PHP](#php)
- [Sum the values of an array](#sum-the-values-of-an-array)
  - [PHP](#php-1)
    - [Multi-dimensional array](#multi-dimensional-array)
- [Merge two arrays](#merge-two-arrays)
  - [PHP](#php-2)

## Count the number of items in an array

### PHP

Not to be confused with `array_sum` which sums the values of an array.

```php +torchlight-php
$values = [5, 3, 7];
$count = count($values);
```

## Sum the values of an array

### PHP

```php +torchlight-php
$values = [5, 3, 7];
$sum = array_sum($values);
```

#### Multi-dimensional array

```php +torchlight-php
$cart = [
    'items' => [
        '5' => [
            'qty' => 11,
        ],
        '9' => [
            'qty' => 2,
        ],
    ],
];

$totalQty = array_sum(array_column($cart['items'], 'qty'));
```

## Merge two arrays

### PHP

```php +torchlight-php
$first = ['a', 'b', 'c'];
$second = ['d', 'e', 'f'];
$merged = array_merge($first, $second);
```