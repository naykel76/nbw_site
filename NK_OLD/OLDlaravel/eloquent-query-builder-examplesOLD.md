# Eloquent Builder Tips and Techniques

<!-- TOC -->

- [Subquery using regex](#subquery-using-regex)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

## Subquery using regex

Case: Select all the pages where the route_prefix has two segments

```php
// check for single segments with or without leading forward slash
Page::where(function ($query) {
    $query->where('route_prefix', 'REGEXP', '^/?[^/]+$');
})->get();

// check for two segments
Page::where(function ($query) {
    $query->where('route_prefix', 'REGEXP', '^[^/]+/[^/]+$');
})->get();
// 'category/books' NOT '/category/books'

// include optional leading forward slash
Page::where(function ($query) {
    $query->where('route_prefix', 'REGEXP', '^/?[^/]+/[^/]+$');
})->get();
// 'category/books' AND '/category/books'
```

## Additional Resources

<a href="/docs/laravel/blogs/demystify-eager-loading" target="blank">Demystify Eager Loading</a>