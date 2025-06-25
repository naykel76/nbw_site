# Variable Assignment Techniques


## Coalescing Operator

Coalescing operator works the same for both PHP and JavaScript. It is used to assign a value to a
variable if the variable is null or undefined. The coalescing operator is represented by `??`.

### JavaScript
    
```javascript
let x = null;
let y = 10;
let z = x ?? y;
```

### PHP

```php +torchlight-php
$x = null;
$y = 10;
$z = $x ?? $y;
```

## Null Coalescing Assignment Operator

The null coalescing assignment operator (`??=`) assigns a value to a variable only if that variable
is currently null (in PHP) or null/undefined (in JavaScript). This operator simplifies the process
of assigning default values.

In both languages, the operator checks if the variable on the left-hand side is null/undefined and
assigns the value on the right-hand side only in that case. Otherwise, the original value of the
variable is preserved.

### JavaScript

```javascript
let validatedData = { has_profile: null };
validatedData.has_profile ??= true;
```

### PHP

```php +torchlight-php
$validatedData['has_profile'] ??= true;
```
