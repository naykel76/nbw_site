# Existence Techniques

## Introduction



## JavaScript

## PHP

- `isset` function is used to check if a variable is set and is not `null`.
  - an empty string `''` is considered set.
- `empty` function is used to check if a variable is empty.
- `is_null` function is used to check if a variable is `null`.

```php
// No variable declaration
isset($var)   // returns false
empty($var)   // returns true
is_null($var) // returns true

$var = null;
isset($var)   // returns true
empty($var)   // returns true
is_null($var) // returns true

$var = '';
isset($var)   // returns true
empty($var)   // returns true
is_null($var) // returns false

$var = 0;
isset($var)   // returns true
empty($var)   // returns true
is_null($var) // returns false

$var = '0';
isset($var)   // returns true
empty($var)   // returns true
is_null($var) // returns false
```


