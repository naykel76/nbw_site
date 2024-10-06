# Events

- [Dispatching Events](#dispatching-events)
  - [Dispatching to a specific component](#dispatching-to-a-specific-component)
- [Registering event listeners](#registering-event-listeners)
- [Refreshing Techniques](#refreshing-techniques)
  - [Refreshing a List of Items After an Action Has Been Performed](#refreshing-a-list-of-items-after-an-action-has-been-performed)


## Dispatching Events

```php
$this->dispatch('eventName', key: value);
```
<!-- 
### From blade template

```html
<button wire:click="$dispatch('event-name', { key: value })"> ... </button>
```

```html
<button wire:click="$dispatchTo('my-component', 'event-name', { key: value })"> ... </button>
```

### Dispatching directly to another component

```php
$this->dispatch('event-name')->to(MyComponent::class);
``` -->

### Dispatching to a specific component

```php
$this->dispatch('open-modal')->to(NewUserModal::class);
```


## Registering event listeners

```php
protected $listeners = ['event-name' => 'method'];
```

```php
use Livewire\Attributes\On;

#[On('event-name')]
public function doStuff() { }
```

## Refreshing Techniques

### Refreshing a List of Items After an Action Has Been Performed

https://livewire.laravel.com/docs/events#listening-for-events-from-specific-child-components

When using separate Livewire components, the parent component (which contains the list or table)
won’t automatically know when a child component performs an action, like deleting an item. To notify
the parent component and refresh the list, you need to dispatch an event from the child component
and listen for it in the parent component.

The listener can be registered in the parent component using the `$listeners` property or the `On`
attribute or directly in the view using the `@event` directive.

```php
// Child Component
public function delete($id) {
    Item::find($id)->delete();
    $this->dispatch('deleted');
}
```

```php
// Parent Component View
<livewire:child-component @deleted="$refresh"/>
```

Steps to Refresh the List:

1. In the child component, dispatch an event after performing the action (e.g., deleting an item).
2. In the parent components view, register the event listener using the @event directive.
3. When the event is dispatched, the parent component will automatically refresh the list.

