# Routes

<!-- MarkdownTOC -->

- [Route Existence](#route-existence)
- [Resource Routes](#resource-routes)
    - [Named Resource Routes](#named-resource-routes)
- [Redirect Route](#redirect-route)
- [Optional Parameters](#optional-parameters)
    - [Exclude Resource Routes](#exclude-resource-routes)
- [Prefix and Namespace](#prefix-and-namespace)
- [How to fall back to route id when slug is not available.](#how-to-fall-back-to-route-id-when-slug-is-not-available)

<!-- /MarkdownTOC -->

<a id="route-existence"></a>
## Route Existence

``` php
Route::has('users.edit')
```

<a id="resource-routes"></a>
## Resource Routes

```php
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only(['index', 'show']);
Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);
```

<a id="named-resource-routes"></a>
### Named Resource Routes

```php
Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
]);
```

<a id="redirect-route"></a>
## Redirect Route

```php
Route::redirect('/', 'dashboard');
```

<a id="optional-parameters"></a>
## Optional Parameters

    user/{name?}




<a id="markdown-exclude-resource-routes" name="exclude-resource-routes"></a>
<a id="exclude-resource-routes"></a>
### Exclude Resource Routes

```php
Route::resource('/', 'MyController', ['except' => ['destroy', 'update']]);
```


<a id="markdown-prefix-and-namespace" name="prefix-and-namespace"></a>
<a id="prefix-and-namespace"></a>
## Prefix and Namespace

```php
Route::prefix('myNameGroup')->name('myNameGroup.')->group(function () {
    Route::get('/', 'SuppliersController@ordersBySupplier')->name('create');
});
```

```php
// protected supplier only routes
Route::middleware(['auth', 'auth.supplier'])group(function () {

    Route::get('/orders', 'SuppliersController@ordersBySupplier')->name('orders');
    Route::get('/sales-history', 'OrdersController@salesHistory')->name('sales-history');
});
```


<a id="how-to-fall-back-to-route-id-when-slug-is-not-available"></a>
## How to fall back to route id when slug is not available.

```php
$page = Page::when(
    is_numeric($page),
    fn ($query) => $query->where('id', $page),
    fn ($query) => $query->where('slug', $page)
)->firstOrFail();
```

    /**
    * Retrieve the model for a bound value.
    *
    * @param  mixed  $value
    * @param  string|null  $field
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function resolveRouteBinding($value, $field = null)
    {
        return is_numeric($value)
            ? $this->where('id', $value)->firstOrFail()
            : $this->where('slug', $value)->firstOrFail();
    }
