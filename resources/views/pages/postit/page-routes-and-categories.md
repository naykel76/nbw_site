# Page Routes and Categories


REVIEW ---------------------------------------------------------------------------------------------------

## What is the route_prefix?

The `route_prefix` and `is_category` are database fields used for categorising web routes into
main categories and sub-categories. The `route_prefix` field can have one or two segments. When
the `is_category` field is true:

- One segment in the `route_prefix` field signifies the main category.
- Two segments in the `route_prefix` field indicate a sub-category.

Pages without a specified `route_prefix` field default to a wildcard route, and those without a
true value in the `is_category` field are treated as normal pages.


## Display a uncategorised page with the wildcard route

To display a page from the database without grouping it with a `route_prefix`, you can use the
wildcard route defined at the end of your `web.php` file. This catch-all route handles requests
for URLs that don't match any other defined routes.

```php
Route::get('/{page:slug}', [PageController::class, 'show'])->name('pages.show');
```


## Display a page with the route_prefix

The `route_prefix` can be used to create web routes and group pages into categories and
sub-categories. The `route_prefix` consists of one or two segments, and when the `is_category`
flag is set to `true`, the first segment represents the primary category, and the second segment
represents the sub-category. If there is no `route_prefix` specified, the page is not categorized
and defaults to the wildcard route.



## Create category and sub-category routes

Each route functions as a wildcard route, with the `route_prefix` defined in the `prefix()` method
specifying the main category, and the first segment of the `route_prefix` defining the
sub-category.

In this example, 'books' is the main category, and the sub-categories, such as 'sci-fi' and
'horror,' are the first segment of the wildcard route.

```php
Route::prefix('books')->name('books')->group(function () {
    Route::get("/sci-fi/{page:slug}", [PageController::class, 'show']);
    Route::get("/horror/{page:slug}", [PageController::class, 'show']);
    Route::get('/{page:slug}', [PageController::class, 'show']);
});
```

<div class="bx info flex va-c">
    <svg class="icon wh-2 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#info"></use></svg>
    <div>When creating category route groups, make sure you include a wildcard route at the bottom.</div>
</div>

For more concise code, you can use the `Route::controller()` method to define the controller and
method to use for each route. The following example uses the `show` method in the `PageController`.

```php
Route::controller(PageController::class)->prefix('books')->name('books')->group(function () {
    Route::get("/sci-fi/{page:slug}", 'show');
    Route::get("/horror/{page:slug}", 'show');
    Route::get('/{page:slug}', 'show');
});
```


## Create a category landing page

There is nothing magical about creating a category landing page, it is simply a page in the
database that uses the wildcard route. The main difference is that the landing page will had
additional components to display the sub-category links.

Note, if you don't want a category landing page, you don't have to create one. The category and
sub-category routes will work just the same without a landing page.


## FAQ's


### How can I tell if a page is a category or sub-category landing page?

The `is_category` field in the database is used to determine if a page is a category or
sub-category landing page. If the `is_category` field is true, the page is a category or
sub-category landing page.


### Can I have a category or sub-category without a landing page.

Yes, you can have a category or sub-category without a landing page. Simply don't create a page
with the `is_category` field set to true. The category landing page will not be displayed if it
does not exist.

