# Troubleshooting

<!-- TOC -->

- [Component Troubleshooting](#component-troubleshooting)
    - [List not refreshing after an action has been performed (TBD)](#list-not-refreshing-after-an-action-has-been-performed-tbd)
- [Event Troubleshooting](#event-troubleshooting)
- [DispatchTo not working](#dispatchto-not-working)
    - [Dispatch or DispatchTo not working or event not being caught](#dispatch-or-dispatchto-not-working-or-event-not-being-caught)

<!-- /TOC -->

<a id="markdown-component-troubleshooting" name="component-troubleshooting"></a>

## Component Troubleshooting

<a id="markdown-list-not-refreshing-after-an-action-has-been-performed-tbd" name="list-not-refreshing-after-an-action-has-been-performed-tbd"></a>

### List not refreshing after an action has been performed (TBD)

<a id="markdown-event-troubleshooting" name="event-troubleshooting"></a>

## Event Troubleshooting


<a id="markdown-dispatchto-not-working" name="dispatchto-not-working"></a>

## DispatchTo not working

* Make sure you are using `$dispatchTo` and not just `$dispatch`

<a id="markdown-dispatch-or-dispatchto-not-working-or-event-not-being-caught" name="dispatch-or-dispatchto-not-working-or-event-not-being-caught"></a>

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
