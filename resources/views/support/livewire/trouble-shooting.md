
## Event Troubleshooting

### Dispatch or DispatchTo not working or event not being caught

If you are dispatching to a dynamic component, make sure the component is available to listen to
the event. For example, the code below will fail because the `create-edit` component is not available
to listen to the event.

```php
@foreach ($mediaItems as $media)
    <button wire:click="$dispatchTo('create-edit', 'set-editing-item', {id: {{ $>id }}})"> </button>
@endforeach

@isset($editing)
    <livewire:admin.media.media-create-edit :media="$editing" />
@endisset
```

**What is the solution?**

The solution is to dispatch the event to the parent component and then let the parent component
handle the event.