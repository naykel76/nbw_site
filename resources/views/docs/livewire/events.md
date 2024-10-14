# Events

- [Dispatching events from Livewire components](#dispatching-events-from-livewire-components)
  - [Direct to another component](#direct-to-another-component)
- [Dispatching events from blade templates](#dispatching-events-from-blade-templates)
  - [Direct to another component](#direct-to-another-component-1)
- [Registering event listeners](#registering-event-listeners)
  - [Registering event listeners using the `$listeners` property](#registering-event-listeners-using-the-listeners-property)
  - [Registering event listeners using the `On` attribute](#registering-event-listeners-using-the-on-attribute)
- [Refreshing Techniques](#refreshing-techniques)
  - [Refreshing a list of items after an action has been performed](#refreshing-a-list-of-items-after-an-action-has-been-performed)
- [Trouble Shooting](#trouble-shooting)
  - [Event listeners not working](#event-listeners-not-working)




## Dispatching events from Livewire components

```php
$this->dispatch('event-name', key: value);
```

### Direct to another component

```php
$this->dispatch('event-name')->to(MyComponent::class);
```

## Dispatching events from blade templates

```html
<button wire:click="$dispatch('event-name', { key: value })"> ... </button>
```

### Direct to another component

```html
<button wire:click="$dispatchTo('my-component', 'event-name', { key: value })"> ... </button>
```

```html +parse
<x-alert type="info">
 <p> When using the <code>$dispatchTo</code> method you must define the full path to the component path using dot notation.For example, to dispatch an event to the <code>courses/programming/edit</code> component you would use:</p>
</x-alert>
```

```php
$this->dispatchTo('courses.programming.edit', 'some-event');
```








## Registering event listeners

### Registering event listeners using the `$listeners` property
```php
protected $listeners = ['event-name' => 'method'];
```

### Registering event listeners using the `On` attribute
```php
use Livewire\Attributes\On;

#[On('event-name')]
public function doStuff() { }
```

## Refreshing Techniques

### Refreshing a list of items after an action has been performed

**Scenario:** You're working with a main form that includes a list of items. Each item is a separate
Livewire component, referred to as 'ListRow'. These items are iterated over within the main
component. The goal is to refresh this list after an action has been performed.

Dispatch an event from the 'ListRow' component after an action has been performed. For example,
when an item is deleted, dispatch a 'refresh-list' event.

```php
// ListRow.php
public function deleteItem($itemId){
    // Delete the item
    Item::find($itemId)->delete();
    // Dispatch a refresh event to the main component
    $this->dispatch('refresh-list');
}
```

There are several approaches to achieve this:

Add a listener to the main component and call the `$refresh` method.

```php
// main-component.blade.php

// list in main component
@foreach ($items as $item)
    <livewire:list-row :item="$item" :key="$item->id" />
@endforeach
```

```php
// MainComponent.php
protected $listeners = ['refresh-list' => '$refresh'];
```


## Trouble Shooting

### Event listeners not working

Make sure the Livewire component blade views are on the same page. 