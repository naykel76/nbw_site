# Livewire Quick Reference

- [HTML Directives](#html-directives)
- [Livewire Security Tips](#livewire-security-tips)


## HTML Directives

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

## Livewire Security Tips

https://livewire.laravel.com/docs/security


- When setting public properties, Livewire treats models differently than plain values such as
  strings and integers. Because of this, store the entire model as a property on the component
  instead of individual id.

```php
class ShowPost extends Component
{
    public Post $post;
 
    // ...
}
```

- Locking properties is done by applying the #[Locked] attribute. Now if users attempt to tamper
  with this value an error will be thrown.

```php
use Livewire\Attributes\Locked;

class ShowPost extends Component
{
    #[Locked]
    public $postId;
 
    // ...
}
```



```php
class ShowPost extends Component
{
    public $postId;
 
    public function delete()
    {
        $post = Post::find($this->postId);
 
        $this->authorize('delete', $post); // ????
 
        $post->delete();
    }
}
```