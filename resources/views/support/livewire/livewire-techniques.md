
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