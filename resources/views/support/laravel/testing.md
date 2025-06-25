# Laravel Testing

## Page Response Tests

```php +torchlight-php
it('gives back a successful response for home page', function () {
    get(route('home'))->assertOk();
});
```


