# Events

- [Parent Dispatch, Child Listen](#parent-dispatch-child-listen)
- [Child Dispatch, Parent Listen](#child-dispatch-parent-listen)
- [Useful Tricks](#useful-tricks)

## Parent Dispatch, Child Listen

- **When** the parent component dispatches a `create` event,
- **then** the child component will listen for that event,
<!-- - **which means** the child component will call the `create` method from the trait???? -->



## Child Dispatch, Parent Listen

- **If** the `edit-post` child component dispatches a `saved` event,  
- **then** the parent component will call `$refresh`,  
- **which means** the parent will be refreshed.

```html +parse-code
<x-torchlight-code language="blade">
    <div>
        @<livewire:edit-post @saved="$refresh">
    </div>
</x-torchlight-code>
```

## Useful Tricks



```html +parse-code
<x-torchlight-code language="blade">
   <button wire:click="$parent.$set('showModal', false)">Close</button>
</x-torchlight-code>
```


