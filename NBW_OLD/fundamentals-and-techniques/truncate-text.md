# Truncate a String to a Specified Length


## Laravel

```php +torchlight-php
// helper method
str('The quick brown fox jumps over the lazy dog')->limit(20)
// facade
Str::limit('The quick brown fox jumps over the lazy dog', 20)
// The quick brown fox...
```