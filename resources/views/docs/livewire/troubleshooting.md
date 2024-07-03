# Troubleshooting

<!-- TOC -->

- [Form Object and Model Binding](#form-object-and-model-binding)
  - [Can't set model as property if it hasn't been persisted yet](#cant-set-model-as-property-if-it-hasnt-been-persisted-yet)
- [Event Troubleshooting](#event-troubleshooting)
- [DispatchTo not working](#dispatchto-not-working)
  - [Dispatch or DispatchTo not working or event not being caught](#dispatch-or-dispatchto-not-working-or-event-not-being-caught)

<!-- /TOC -->

## Form Object and Model Binding

### <question>Can't set model as property if it hasn't been persisted yet</question>

Livewire cannot re-hydrate a model that does not exist in the database, so you can not create a new
blank model and pass it to a Livewire component. You can only pass a model that has been persisted
to the database.

<a href="https://laracasts.com/discuss/channels/livewire/livewire-3-cant-set-model-as-property-if-it-hasnt-been-persisted-yet" target="blank">
    https://laracasts.com/discuss/channels/livewire/livewire-3-cant-set-model-as-property-if-it-hasnt-been-persisted-yet
</a>


## Event Troubleshooting

## DispatchTo not working

* Make sure you are using `$dispatchTo` and not just `$dispatch`

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

Good question! The solution is to dispatch the event to the parent component and then let the
parent component handle the event.
