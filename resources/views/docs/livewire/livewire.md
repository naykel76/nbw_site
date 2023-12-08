# Livewire Cheatsheet
<!-- TOC -->

- [Cool Things](#cool-things)
    - [Full Page Components](#full-page-components)

<!-- /TOC -->





---
---
---
---
---
---
---
---
---
---
---
---
---
---
<a id="markdown-cool-things" name="cool-things"></a>

## Cool Things

```html
<!-- display element when sending a request -->
<div wire:loading> Saving post... </div>
<!-- remove element when sending a request -->
<div wire:loading.remove>...</div>
<!-- toggle class during request -->
<button wire:loading.class="txt-muted">Save</button>
```

Target specific elements with `wire:target` and `wire:loading.class` or `wire:loading.attr`

```html
<button wire:click="save" wire:loading.attr="disabled" wire:target="save">Save</button>
```





<a id="markdown-full-page-components" name="full-page-components"></a>

### Full Page Components

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

If your layout has an associated class file, you will need to reference that for any custom logic or properties.

```php
public function render() {
    return view('livewire.edit-create-user')
        ->layout(\Naykel\Gotime\View\Layouts\AppLayout::class, ['title' => $this->title]);
}
```


