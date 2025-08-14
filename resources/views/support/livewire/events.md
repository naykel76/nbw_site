# Events

- [Dispatching Operations](#dispatching-operations)
    - [Dispatch from Blade View](#dispatch-from-blade-view)


## Dispatching Operations

When you need to trigger an action in a parent component from a child component,
you can use the `dispatch` method. This is particularly useful for creating a
dynamic interaction between components.

### Dispatch from Blade View

You can dispatch an event directly from a Blade view using the `wire:click`
directive.

```html +torchlight-blade
@verbatim
<button wire:click="$dispatch('event-name', { id: {{ $model->id }} })"> Dispatch Event </button>
@endverbatim
```


<!-- ## REVIEW --------------------------------------------
## Parent Dispatch, Child Listen

- **When** the parent component dispatches a `create` event,
- **then** the child component will listen for that event,

## Child Dispatch, Parent Listen

- **If** the `edit-post` child component dispatches a `saved` event,  
- **then** the parent component will call `$refresh`,  
- **which means** the parent will be refreshed. -->

<!-- ```html +parse-code
<x-torchlight-code language="blade">
    <div>
        @<livewire:edit-post @saved="$refresh">
    </div>
</x-torchlight-code>
``` -->

<!-- ## Useful Tricks -->

<!-- 
```html +parse-code
<x-torchlight-code language="blade">
   <button wire:click="$parent.$set('showModal', false)">Close</button>
</x-torchlight-code>
```
 -->

