# Components

<!-- TOC -->

- [Full Page Components](#full-page-components)
    - [Package layout](#package-layout)

<!-- /TOC -->



<a id="markdown-full-page-components" name="full-page-components"></a>

## Full Page Components

```php
// routes/web.php
use App\Livewire\CreatePost;

Route::get('/create-post', CreatePost::class);
```

```php
#[Layout('layouts.app')]
public function render() {
    return view('livewire.create-post');
}
```

```php
public function render() {
    return view('livewire.create-post')
        ->layout('layouts.base')->slot('main');
}
```

<a id="markdown-package-layout" name="package-layout"></a>

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
