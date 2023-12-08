# Livewire Quick Reference
<!-- TOC -->

- [Accessing parent methods and properties](#accessing-parent-methods-and-properties)
- [Refreshing techniques](#refreshing-techniques)
    - [Refresh a component](#refresh-a-component)
    - [Refresh parent on event](#refresh-parent-on-event)
- [Properties](#properties)
    - [Manipulating properties](#manipulating-properties)

<!-- /TOC -->

<a id="markdown-accessing-parent-methods-and-properties" name="accessing-parent-methods-and-properties"></a>

## Accessing parent methods and properties

```html
<button wire:click="$parent.method()">...</button>
<button wire:click="$parent.property = 'value'">...</button>
```

<a id="markdown-refreshing-techniques" name="refreshing-techniques"></a>

## Refreshing techniques

<a id="markdown-refresh-a-component" name="refresh-a-component"></a>

### Refresh a component

```html
<!-- livewire -->
<button type="button" wire:click="$refresh">...</button>
<!-- alpine -->
<button type="button" x-on:click="$wire.$refresh()">...</button>
```


<a id="markdown-refresh-parent-on-event" name="refresh-parent-on-event"></a>

### Refresh parent on event

```html
<livewire:nested-child-component @eventName="$refresh"/>
```

<a id="markdown-properties" name="properties"></a>

## Properties

<a id="markdown-manipulating-properties" name="manipulating-properties"></a>

### Manipulating properties

```html
<div>
    <input type="text" wire:model="todo">

    <button x-on:click="$wire.todo = ''">Clear</button>
</div>
```

or you can use the `set` method

```html
<button x-on:click="$wire.set('todo', '')">Clear</button>
```
