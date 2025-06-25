# Conditionals
<a id="markdown-conditionals" name="conditionals"></a>

<!-- TOC -->

- [Ternary operators](#ternary-operators)
    - [Ternary operators ( multiple nested conditions)](#ternary-operators--multiple-nested-conditions)

<!-- /TOC -->



## Ternary operators
<a id="markdown-ternary-operators" name="ternary-operators"></a>

```php +torchlight-php
// concise
$isMain = ($item->type === 'main');
// verbose
$isMain = $item->type == 'main' ? true : false;
```

### Ternary operators ( multiple nested conditions)
<a id="markdown-ternary-operators--multiple-nested-conditions" name="ternary-operators--multiple-nested-conditions"></a>

```php +torchlight-php
$result = ($num == 0)
    ? "Zero" : (($num > 0)
    ? (($num % 2 == 0)
    ? "Positive Even" : "Positive Odd")
    : (($num % 2 == 0) ? "Negative Even" : "Negative Odd"));
```

```php +torchlight-php
$result = ($item == 'abc')
    ? "Zero"
    : (($num > 0)
    ? (($num % 2 == 0)
    ? "Positive Even" : "Positive Odd")
    : (($num % 2 == 0) ? "Negative Even" : "Negative Odd"));
```


