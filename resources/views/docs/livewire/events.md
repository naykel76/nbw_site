# Events
<!-- TOC -->

- [Dispatching Events](#dispatching-events)
    - [Dispatching directly to another component](#dispatching-directly-to-another-component)
    - [Dispatching events from Blade templates](#dispatching-events-from-blade-templates)
    - [Dispatching from Blade templates directly to another component](#dispatching-from-blade-templates-directly-to-another-component)
- [Listening for events](#listening-for-events)
    - [Listening for events from specific child components](#listening-for-events-from-specific-child-components)

<!-- /TOC -->

<a id="markdown-dispatching-events" name="dispatching-events"></a>

## Dispatching Events

```php
$this->dispatch('eventName');
$this->dispatch('eventName', key: value);
```

<a id="markdown-dispatching-directly-to-another-component" name="dispatching-directly-to-another-component"></a>

### Dispatching directly to another component

```php
public function add() {
    $this->dispatch('add')->to(UserCreateEdit::class);
}
```

<a id="markdown-dispatching-events-from-blade-templates" name="dispatching-events-from-blade-templates"></a>

### Dispatching events from Blade templates

```html
<button wire:click="$dispatch('edit-user', { id: {{ $user->id }} })">
    Edit
</button>
```

<a id="markdown-dispatching-from-blade-templates-directly-to-another-component" name="dispatching-from-blade-templates-directly-to-another-component"></a>

### Dispatching from Blade templates directly to another component

```html
<button wire:click="$dispatchTo('users', 'edit-user', { id: {{ $user->id }} })">
    Edit
</button>
```

<a id="markdown-listening-for-events" name="listening-for-events"></a>

## Listening for events

To listen for an event in a Livewire component, add the `#[On]` attribute above
the method you want to be called when a given event is dispatched:

https://livewire.laravel.com/docs/events#listening-for-dynamic-event-names

```php
use Livewire\Component;
use Livewire\Attributes\On;

class Dashboard extends Component {
    #[On('post-created')]
    public function updatePostList($title) {
        // ...
    }
}
```

<a id="markdown-listening-for-events-from-specific-child-components" name="listening-for-events-from-specific-child-components"></a>

### Listening for events from specific child components

```html
<div>
    <livewire:edit-post @saved="$refresh">
</div>
```



// ParentComponent.php
public function someMethodInParentComponent()
{
    $this->dispatch('callChildMethod', $param1, $param2);
}

// ChildComponent.php
protected $listeners = ['callChildMethod' => 'add'];

public function add($param1, $param2)
{
    // Your code here
}
