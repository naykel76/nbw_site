# Laravel Resource Cheatsheet

<!-- MarkdownTOC -->

- [Creating a resource controller](#creating-a-resource-controller)
- [Registering the resource routes](#registering-the-resource-routes)
    - [Specify partial resource routes](#specify-partial-resource-routes)
- [Create Livewire data table component and view](#create-livewire-data-table-component-and-view)
    - [Add route to return full page component](#add-route-to-return-full-page-component)
    - [Livewire component class](#livewire-component-class)
        - [Render method()](#render-method)
    - [Livewire data table (view)](#livewire-data-table-view)

<!-- /MarkdownTOC -->

No frills guide to create a Laravel resource.

<a id="creating-a-resource-controller"></a>
## Creating a resource controller

```php
php artisan make:controller ProjectController -r
```

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {}
    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
```

<a id="registering-the-resource-routes"></a>
## Registering the resource routes

```php
// routes/web.php
Route::resource('projects', ProjectController::class);

// you can also register many resource controller at once
Route::resources([
    'projects' => ProjectController::class,
    'posts' => PostController::class,
]);
```

<a id="specify-partial-resource-routes"></a>
### Specify partial resource routes

```php
Route::resource('photos', ProjectController::class)->only([
    'index', 'show'
]);

Route::resource('photos', ProjectController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
```

<a id="create-livewire-data-table-component-and-view"></a>
## Create Livewire data table component and view

    php artisan livewire:make ProjectTable


<a id="add-route-to-return-full-page-component"></a>
### Add route to return full page component

```php
// routes/web.php
Route::get('/admin/projects', ProjectTable::class);
```

<a id="livewire-component-class"></a>
### Livewire component class

Don't forget to include Include Gotime `WithDataTable` and `WithCrud` Traits

<a id="render-method"></a>
#### Render method()

```php
return view('admin.project-table')->layout('layouts.admin');
```


<a id="livewire-data-table-view"></a>
### Livewire data table (view)




W?

    Route::middleware(['role:super|admin', 'auth'])->prefix('admin')->name('admin')->group(function () {
        Route::get('/customers', CustomerTable::class)->name('.customers');
        Route::get('/categories', CategoryTable::class)->name('.categories');
        Route::get('/products', ProductTable::class)->name('.products');
    });






