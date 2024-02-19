# Events
<!-- TOC -->

- [Dispatching events](#dispatching-events)
    - [Dispatch events from blade template](#dispatch-events-from-blade-template)
    - [Dispatching directly to another component](#dispatching-directly-to-another-component)
- [DispatchTo events](#dispatchto-events)
    - [DispatchTo from blade templates](#dispatchto-from-blade-templates)
- [Registering event listeners](#registering-event-listeners)
    - [Registering event listeners using the `$listeners` property](#registering-event-listeners-using-the-listeners-property)
    - [Registering event listeners using the `On` attribute](#registering-event-listeners-using-the-on-attribute)
- [Refreshing Techniques](#refreshing-techniques)
    - [Refreshing a list of items after an action has been performed](#refreshing-a-list-of-items-after-an-action-has-been-performed)

<!-- /TOC -->


<a id="markdown-dispatching-events" name="dispatching-events"></a>

## Dispatching events

```php
$this->dispatch('eventName', key: value);
```

<a id="markdown-dispatch-events-from-blade-template" name="dispatch-events-from-blade-template"></a>

### Dispatch events from blade template

```html
<button wire:click="$dispatch('event-name', { key: value })"> ... </button>
```

<a id="markdown-dispatching-directly-to-another-component" name="dispatching-directly-to-another-component"></a>

### Dispatching directly to another component

```php
$this->dispatch('event-name')->to(MyComponent::class);
```

<a id="markdown-dispatchto-events" name="dispatchto-events"></a>

## DispatchTo events

<a id="markdown-dispatchto-from-blade-templates" name="dispatchto-from-blade-templates"></a>

### DispatchTo from blade templates

```html
<button wire:click="$dispatchTo('my-component', 'event-name', { key: value })"> ... </button>
```

<div class="bx danger-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-triangle"></use></svg>
    <p> When using the <code>$dispatchTo</code> method you must define the full path to the component path using dot notation.For example, to dispatch an event to the <code>courses/programming/edit</code> component you would use:</p>
</div>

```php
$this->dispatchTo('courses.programming.edit', 'some-event');
```


<a id="markdown-registering-event-listeners" name="registering-event-listeners"></a>

## Registering event listeners

<a id="markdown-registering-event-listeners-using-the-listeners-property" name="registering-event-listeners-using-the-listeners-property"></a>

### Registering event listeners using the `$listeners` property
```php
protected $listeners = ['event-name' => 'method'];
```

<a id="markdown-registering-event-listeners-using-the-on-attribute" name="registering-event-listeners-using-the-on-attribute"></a>

### Registering event listeners using the `On` attribute
```php
use Livewire\Attributes\On;

#[On('event-name')]
public function doStuff() { }
```

<a id="markdown-refreshing-techniques" name="refreshing-techniques"></a>

## Refreshing Techniques

<a id="markdown-refreshing-a-list-of-items-after-an-action-has-been-performed" name="refreshing-a-list-of-items-after-an-action-has-been-performed"></a>

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
