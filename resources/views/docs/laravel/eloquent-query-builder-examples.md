# Eloquent Builder Tips and Techniques

<!-- TOC -->

- [Eloquent Builder Tips and Techniques](#eloquent-builder-tips-and-techniques)
    - [Quick Reference](#quick-reference)
    - [Subquery using regex](#subquery-using-regex)
    - [Group with nesting loops](#group-with-nesting-loops)
    - [Group with groupBy()](#group-with-groupby)

<!-- /TOC -->

<a id="markdown-quick-reference" name="quick-reference"></a>

## Quick Reference

```php
$course = Course::first();
```


<a id="markdown-subquery-using-regex" name="subquery-using-regex"></a>

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

<a id="markdown-group-with-nesting-loops" name="group-with-nesting-loops"></a>

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


<a id="markdown-group-with-groupby" name="group-with-groupby"></a>

## Group with groupBy()

Using grouping allows you to avoid nested loops and achieve the desired result
in a more efficient and concise way.

Notice that `sortBy` and `groupBy` come after `get`

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
