# Livewire Quick Reference

<!-- TOC -->

- [Make a child component "reactive" based on parent changes.](#make-a-child-component-reactive-based-on-parent-changes)
- [HTML Directives](#html-directives)
- [Entangle](#entangle)
- [Tips and Tricks](#tips-and-tricks)

<!-- /TOC -->

<a id="markdown-make-a-child-component-reactive-based-on-parent-changes" name="make-a-child-component-reactive-based-on-parent-changes"></a>

## Make a child component "reactive" based on parent changes.

This technique forces the child to mount each time the parent is updated. Read more [here](https://github.com/livewire/livewire/discussions/2097)

```html
<livewire:create-question-answers key="{{ Str::random()}}" :quiz-id="$editing->id" />
```

<a id="markdown-html-directives" name="html-directives"></a>

## HTML Directives

```html
<!-- display element when sending a request -->
<div wire:loading> Saving post... </div>
<!-- remove element when sending a request -->
<div wire:loading.remove>...</div>
<!-- toggle class during request -->
<button wire:loading.class="txt-muted">Save</button>
```

Target specific elements with `wire:target` and `wire:loading.class` or `wire:loading.attr`

```html
<button wire:click="save" wire:loading.attr="disabled" wire:target="save">Save</button>
```


<a id="markdown-entangle" name="entangle"></a>

## Entangle

Livewire's `@entangle` directive is used to create a two-way data binding between a Livewire
component's property and an AlpineJs component's data. This means that when the Livewire property
changes, the AlpineJs data will automatically update to reflect the change, and vice versa.

In the following example, AlpineJs binds the `content` property to the Livewire component's `editor1` property.

```html
<div x-data="{content: @entangle('editor1')}">
    <div x-text="content"></div>
</div>
```

It may not always be practical to bind directly to a Livewire component's property. In the
following example, AlpineJs binds the content property to a dynamic Livewire component's
property. The property name is determined by the model attribute passed to the component.

```html
<div x-data="{content: @entangle($attributes->wire('model'))}">
    <div x-text="content"></div>
</div>
```

<a id="markdown-tips-and-tricks" name="tips-and-tricks"></a>

## Tips and Tricks

