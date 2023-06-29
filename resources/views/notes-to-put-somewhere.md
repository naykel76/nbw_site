
How can I inject menu links from the default menu to a dropdown menu?

## These are notes that need a home

# Create a full page livewire component form Naykel Gotime

#### Create livewire component

```bash
php artisan livewire:make Dev/Choices
```

#### Add menu item to `nav.json`

Make sure you set: `"ignore_route": true` and `"type": "blade"`

```js
// nav-laravel.json
{
    "name": "ChoicesJS",
    "route_name": "docs.laravel.choices",
    "ignore_route": true,
    "type": "blade",
    "icon": "laravel"
}
```

#### Create route to component in `web.php`
```php
// web.php
Route::get('/docs/laravel/components-and-integrations', Choices::class);
```

#### Configure the layout

By default livewire will attempt to render the component in `app.layout`. To override update the render function to return the gotime layout.

```bash
# vs snippet code to create render
gtl-render
```

```php
public string $pageTitle = 'ChoicesJS Integration';

public function render() {
    return view('livewire.dev.choices')
        ->layout(\Naykel\Gotime\View\Layouts\AppLayout::class, ['pageTitle' => $this->pageTitle]);
}
```


use Illuminate\Support\Facades\Storage;
Storage::copyDirectory($sourcePath, $destinationPath);


use Illuminate\Support\Facades\File;
File::copyDirectory($sourcePath, $destinationPath);

(new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/js', resource_path('js'));


How do I turn of errors for a single gotime input?


Show options that can be applied
```php
return view('livewire.dev.choices')
    ->layout(\Naykel\Gotime\View\Layouts\AppLayout::class, [
        'pageTitle' => $this->pageTitle,
        'layout' => 'app',
        'hasTitle' => true,
        'mainClasses' => 'container maxw-md py-5-3-2-2',
    ]);

```

Remove the vendor directory and reinstall dependencies: Run the following commands to remove the existing vendor directory and reinstall the project's dependencies:

```bash
rm -rf vendor
composer install
```


    // use a ternary operator to check if the layout is defined
    $view = $this->layout ? $this->layouts[$this->layout]($view) : $view;



```php
// Checks if the object or class has a property
property_exists($object_or_class, string $property): bool
```


#### How can I count the section in a php path?

```php
$path = "section1/section2";
$sections = explode("/", $path);
$num_sections = count($sections);
echo "Number of sections: " . $num_sections;
```


