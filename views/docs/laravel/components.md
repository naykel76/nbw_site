# Components
<!-- TOC -->

- [Slots](#slots)
- [Slot Attributes](#slot-attributes)
    - [Conditionally Merge Attributes](#conditionally-merge-attributes)
    - [Trouble Shooting](#trouble-shooting)
    - [Component not accepting parameters](#component-not-accepting-parameters)
    - [Attributes are not forwarding to component layout](#attributes-are-not-forwarding-to-component-layout)
    - [Component won't accept boolean value?](#component-wont-accept-boolean-value)

<!-- /TOC -->


<a id="markdown-slots" name="slots"></a>

## Slots

```html
<x-slot name="title"> ... </x-slot>
```

<a id="markdown-slot-attributes" name="slot-attributes"></a>

## Slot Attributes

```html
<div {{ $heading->attributes }}>
    {{ $heading }}
</div>
```

```html
<div {{ $heading->attributes->merge(['class' => 'alert']) }}>
    {{ $heading }}
</div>
```

<a id="markdown-conditionally-merge-attributes" name="conditionally-merge-attributes"></a>

### Conditionally Merge Attributes

```html
<div {{ $attributes->class(['p-4', 'bg-red' => $hasError]) }}>
    {{ $message }}
</div>
```

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

### Trouble Shooting

<a id="markdown-component-not-accepting-parameters" name="component-not-accepting-parameters"></a>

### Component not accepting parameters

Run `php artisan optimize:clear`

<a id="markdown-attributes-are-not-forwarding-to-component-layout" name="attributes-are-not-forwarding-to-component-layout"></a>

### Attributes are not forwarding to component layout

Check to make sure the layout has a `$slot` to pass the attributes too.

<a id="markdown-component-wont-accept-boolean-value" name="component-wont-accept-boolean-value"></a>

### Component won't accept boolean value?

PHP expressions and variables should be passed to the component via attributes that use the : character as a prefix:

    <livewire:my-component :myBool=true> -NOT- <livewire.my-component myBool=true>


