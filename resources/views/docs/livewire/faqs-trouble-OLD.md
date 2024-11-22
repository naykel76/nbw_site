# FAQ's and Trouble Shooting

Here are some common questions and issues that you may encounter while working with Laravel.

- [Forms](#forms)
    - [How can I prevent the form submitting when enter is pressed?](#how-can-i-prevent-the-form-submitting-when-enter-is-pressed)
- [Component Communication](#component-communication)
    - [Does a child component have access to the parent component's properties?](#does-a-child-component-have-access-to-the-parent-components-properties)
    - [Why does a list update automatically when the form is in the same component, but requires an event when moved to a separate component?](#why-does-a-list-update-automatically-when-the-form-is-in-the-same-component-but-requires-an-event-when-moved-to-a-separate-component)

## Forms

#### <question>How can I prevent the form submitting when enter is pressed?</question>

When using `wire:submit` on a form, the form will automatically submit when the enter key is
pressed. 

```html
<form wire:submit="save">
    <!-- automatically submits on enter -->
    <x-gt-submit text="save" />
</form>
```

The simple solution is to use a button with `type="button"` instead of `submit`. This way, you don't
need to prevent the default behavior of the form submission; you can simply handle the form
submission manually.

```html
<form>
     <!-- Button that manually triggers form submission -->
    <x-gt-button wire:click="save" text="save" />
</form>
```


## Component Communication

#### <question>Does a child component have access to the parent component's properties?</question>

In Livewire, child components **do not** have direct access to the parent component's properties.
Parent-child communication is handled explicitly via property binding or events.

#### <question>Why does a list update automatically when the form is in the same component, but requires an event when moved to a separate component?</question>

When you have the form and the table in the same Livewire component, Livewire automatically
re-renders the component when any of its properties change. This is why the table updates
automatically when you make changes within the same component.

However, when you extract the form into a separate Livewire component, the parent component (which
contains the table) is not aware of the changes happening in the child component. This is why you
need to emit an event from the child component and listen for it in the parent component to trigger
a re-render.
