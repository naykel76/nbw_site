
## `sortBy()`

```php +torchlight-php
$collection = collect([
    ['name' => 'Desk', 'price' => 200],
    ['name' => 'Chair', 'price' => 100],
    ['name' => 'Bookcase', 'price' => 150],
]);

$sorted = $collection->sortBy('price');

$sorted->values()->all();
```

## `contains()`



```php +torchlight-php
$collection = collect(['name' => 'Desk', 'price' => 100]);
$collection->contains('Desk');
// true
$collection->contains('New York');
// false
```


`contains()` checks for exact matches using the default behaviour of the method, which
looks for values that match the provided argument directly.

In your case, contains('EP-PROG') is not finding a match because it is comparing the
string 'EP-PROG' to the entire item object, not to the code property.

To fix this, you need to use a callback function to explicitly check the code property
within each cart item. Here's how you can update the code: