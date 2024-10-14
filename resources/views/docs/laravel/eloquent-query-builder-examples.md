# Eloquent Builder Tips and Techniques

<!-- TOC -->

- [Quick Reference](#quick-reference)
- [Subquery using regex](#subquery-using-regex)
- [Group with nesting loops](#group-with-nesting-loops)
- [Group with groupBy()](#group-with-groupby)
- [Additional Resources](#additional-resources)

<!-- /TOC -->


## Quick Reference

```php
// Eager load related models when the model already exists
$sc = $studentCourse->load('course.modules.media');
// Eager load related models when the model already exists
$sc = StudentCourse::first()->with('course.modules.media');
```

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

## Group with nesting loops

```php
@foreach($categories as $category)
    <h6>{{ $category->route_prefix }}</h6>

    @foreach($pages as $page)
        @if($page->route_prefix === $category->route_prefix)
            {{ $page->title }} <br>
        @endif
    @endforeach

@endforeach
```


## Group with groupBy()

Using grouping allows you to avoid nested loops and achieve the desired result
in a more efficient and concise way.



```php
// controller
$pages = \Naykel\Pageit\Models\Page::get()
    ->sortBy('route_prefix')->groupBy('route_prefix');

// blade
@foreach($pages as $route_prefix => $pagesGrouped)
    {{-- Output the category or subcategory for the current group --}}
    <h6>{{ $route_prefix }}</h6>

    {{-- Loop through the pages in the current group and output their titles --}}
    @foreach($pagesGrouped as $page)
        {{ $page->title }}<br>
    @endforeach
@endforeach
```


## Additional Resources

<a href="/docs/laravel/blogs/demystify-eager-loading" target="blank">Demystify Eager Loading</a>