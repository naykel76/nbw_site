# Things I Often Forget


#### Limit the number of characters in a string and add an ellipsis if it's too long:

```php +code
str('The quick brown fox jumps over the lazy dog')->limit(20)
Str::limit('The quick brown fox jumps over the lazy dog', 20)
// The quick brown fox...
```

