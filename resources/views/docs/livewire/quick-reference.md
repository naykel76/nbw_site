# Livewire Quick Reference

- [HTML Directives](#html-directives)
- [Entangle](#entangle)
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

## Entangle

Livewire's `@entangle` directive is used to create a two-way data binding between a Livewire
component's property and an AlpineJs component's data. This means that when the Livewire property
changes, the AlpineJs data will automatically update to reflect the change, and vice versa.

In the following example, AlpineJs binds the `content` property to the Livewire component's
`editor1` property.

```html
<div x-data="{content: @entangle('editor1')}">
    <div x-text="content"></div>
</div>
```

It may not always be practical to bind directly to a Livewire component's property. In the following
example, AlpineJs binds the content property to a dynamic Livewire component's property. The
property name is determined by the model attribute passed to the component.

```html
<div x-data="{content: @entangle($attributes->wire('model'))}">
    <div x-text="content"></div>
</div>
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