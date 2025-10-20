# Livewire Quick Reference

- [Passing Data to Layouts](#passing-data-to-layouts)
- [HTML Directives](#html-directives)
- [Livewire Security Tips](#livewire-security-tips)
- [Validation](#validation)
    - [Real-time Validation](#real-time-validation)

## Passing Data to Layouts

You can use the `#[Layout]` attribute to specify a layout for your Livewire
component and pass data to it.

```php +torchlight-php
#[Layout('components.layouts.app', ['pageTitle' => 'The Page Title'])]
public function render()
{
    return view('livewire.products.page');
}
```

This will not work if you want to pass dynamic data to the layout. In that case, you
need to return the layout from the `render()` method instead.

```php +torchlight-php
public function render()
{
    return view('livewire.products.page')
        ->layout('components.layouts.app', [
            'pageTitle' => $this->pageTitle
        ]);
}
```
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

```php +torchlight-php
class ShowPost extends Component
{
    public Post $post;
 
    // ...
}
```

- Locking properties is done by applying the #[Locked] attribute. Now if users attempt to tamper
  with this value an error will be thrown.

```php +torchlight-php
use Livewire\Attributes\Locked;

class ShowPost extends Component
{
    #[Locked]
    public $postId;
 
    // ...
}
```



```php +torchlight-php
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

## Validation

### Real-time Validation

**Real-time validation** validates user input as they type or interact with form
fields, rather than waiting for form submission.

When you use `#[Validate]` attributes on Livewire properties, validation rules
automatically run whenever that property updates on the server.

To enable real-time validation, simply add `wire:model.live` or
`wire:model.blur` to your input fields:

```php +torchlight-php
#[Validate('required|email')]
public string $email = '';
```

```html +torchlight-html
<input type="email" wire:model.blur="email">
```

- With `wire:model.blur`, validation runs when the user tabs away from the
  field.
- With `wire:model.live`, it runs as they type.

**No additional backend code needed - the validation happens automatically.**


