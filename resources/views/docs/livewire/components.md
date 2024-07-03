# Components

<!-- TOC -->

- [Full Page Components](#full-page-components)
- [Pass data to layout (local)](#pass-data-to-layout-local)
- [Pass data to layout (package)](#pass-data-to-layout-package)
  - [Package layout](#package-layout)

<!-- /TOC -->

## Full Page Components

```php
// routes/web.php
use App\Livewire\CreatePost;

Route::get('/create-post', CreatePost::class);
```

## Pass data to layout (local)

```php
return view($this->view)
    ->layout('components.layouts.app', [
        'pageTitle' => $this->pageTitle,
    ]);
```

## Pass data to layout (package)
```php
return view($this->view, $this->prepareData())
    ->layout(\Naykel\Gotime\View\Layouts\AppLayout::class, [
        'pageTitle' => $this->pageTitle,
    ]);
```

```php
#[Layout('layouts.app')]
public function render() {
    return view('livewire.create-post');
}
```




### Package layout

If your layout has an associated class file, you will need to reference that for any custom logic or properties.

```php
public function render() {
    return view('livewire.edit-create-user')
        ->layout(\Naykel\Gotime\View\Layouts\AppLayout::class, [
            'title' => $this->title
        ]);
}
```
