# Eloquent Builder Tips and Techniques

<!-- MarkdownTOC -->

- [UNIQUE](#unique)
- [Snippets](#snippets)
    - [Get random record](#get-random-record)
    - [Get unique records `distinct()`](#get-unique-records-distinct)
- [Examples](#examples)
- [Grouping Examples](#grouping-examples)
    - [Group with nesting loops](#group-with-nesting-loops)
    - [Group with groupBy()](#group-with-groupby)

<!-- /MarkdownTOC -->


## UNIQUE

In the migration create composite key
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

<a id="snippets"></a>
## Snippets

<a id="get-random-record"></a>
### Get random record

```php
$randomUser = \App\Models\User::select('id')->whereNotNull('id')
                ->inRandomOrder()
                ->limit(1)
                ->get();
```

<a id="get-unique-records-distinct"></a>
### Get unique records `distinct()`

The `distinct()` method operates on the entire row, and will only return distinct rows based on all the columns in the SELECT statement.

```php
$categories = Page::select('route_prefix')
    ->distinct()
    ->get();
```

Add filter

```php
$categories = Page::select('route_prefix')
    ->where('route_prefix', 'like',  $routePrefix . '%')
    ->distinct()
    ->get();
```

As an alternative, you could try using a `groupBy()` instead of `distinct()`.  This would group the rows based on the route_prefix column, which would eliminate any duplicates in that column.

```php
$categories = Page::select('route_prefix')
    ->whereNotNull('route_prefix')
    ->groupBy('route_prefix')
    ->get();
```

## Examples

Case: Select page title and route_prefix from the pages table and group by the route_prefix

```php
$pages = DB::table('pages')
        ->select('route_prefix', 'title')
        ->groupBy('route_prefix', 'title')
        ->get();

$pages = Page::select('route_prefix', 'title')
        ->groupBy('route_prefix', 'title')
        ->get();

$pages = Page::select('route_prefix', 'title', DB::raw('count(*) as total'))
    ->groupBy('route_prefix', 'title')
    ->get();
```


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


## Grouping Examples

### Group with nesting loops

```php
// controller
$categories = Page::categories()->get();
$pages = Page::where('is_category', false)->get();

// blade
@foreach($categories as $category)
    <h6>{{ $category->route_prefix }}</h6>

    @foreach($pages as $page)
        @if($page->route_prefix === $category->route_prefix)
            {{ $page->title }} <br>
        @endif
    @endforeach

@endforeach
```

### Group with groupBy()

Using grouping allows you to avoid nested loops and achieve the desired result
in a more efficient and concise way.

Notice that `sortBy` and `groupBy` come after `get`

```php
// controller
$pages = \Naykel\Pageit\Models\Page::get()
    ->sortBy('route_prefix') ->groupBy('route_prefix');

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

Categorized


Get the page title, route_prefix and slug from the pages table grouped by the
category or sub-category.
