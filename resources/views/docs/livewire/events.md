# Events
<!-- TOC -->

- [Registering event listeners](#registering-event-listeners)
- [Dispatching Events](#dispatching-events)
    - [Dispatch from blade template](#dispatch-from-blade-template)
- [Dispatching directly to another component](#dispatching-directly-to-another-component)
    - [Dispatch from blade templates](#dispatch-from-blade-templates)
- [Dispatch the $refresh event between unrelated components on the same page](#dispatch-the-refresh-event-between-unrelated-components-on-the-same-page)

<!-- /TOC -->

<a id="markdown-registering-event-listeners" name="registering-event-listeners"></a>

## Registering event listeners

```php
protected $listeners = ['event-name' => 'method'];
```

```php
use Livewire\Attributes\On;

#[On('event-name')]
public function doStuff() {
    // ...
}
```

<a id="markdown-dispatching-events" name="dispatching-events"></a>

## Dispatching Events

```php
$this->dispatch('eventName', key: value);
```

<a id="markdown-dispatch-from-blade-template" name="dispatch-from-blade-template"></a>

### Dispatch from blade template

```html
<button wire:click="$dispatch('event-name', { key: value })"> ... </button>
```

<a id="markdown-dispatching-directly-to-another-component" name="dispatching-directly-to-another-component"></a>

## Dispatching directly to another component

```php
$this->dispatch('event-name')->to(MyComponent::class);
```


<a id="markdown-dispatch-from-blade-templates" name="dispatch-from-blade-templates"></a>

### Dispatch from blade templates

```html
<button wire:click="$dispatchTo('my-component', 'event-name', { key: value })"> ... </button>
```

<div class="bx danger flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circleg"></use></svg>
    <div>
        <p> When using the <code class="txt-white">$dispatchTo</code> method you must define the full path to the component path using dot notation.For example, to dispatch an event to the <code class="txt-white">courses/programming/edit</code> component you would use:</p>
    </div>
</div>

```php
$this->dispatchTo('courses.programming.edit', 'some-event');
```

<a id="markdown-dispatch-the-refresh-event-between-unrelated-components-on-the-same-page" name="dispatch-the-refresh-event-between-unrelated-components-on-the-same-page"></a>

## Dispatch the $refresh event between unrelated components on the same page

When an event is dispatched by a different component, the component won't be able to catch the
event directly from the view. In this case, you need to listen for the event in the component
class itself.

```html
<livewire:course.table @saved="$refresh"/>
<livewire:course.create-edit />
```

In the above example, the `course.table` and `course.create-edit` components are unrelated. The
`course.create-edit` component dispatches a `saved` event when the form is submitted. The
`course.table` component is listening for the `saved` event and then calling the `$refresh`
method.

The `@saved="$refresh"` directive in `<livewire:course.table @saved="$refresh"/>` is trying to
listen for a saved event on the course table component and then call the $refresh method. However,
this will only work if the saved event is dispatched by the `course.table` component itself or any
direct child components. In this case, the `course.create-edit` component is dispatching the
`saved` event and the `course.table` component is not a direct child of the `course.create-edit`
component. Therefore, the `course.table` component must have a listener for the `saved` event in
the component class itself.

```php
use Livewire\Attributes\On;

#[On('saved')]

// or
protected $listeners = ['saved' => '$refresh'];
```
