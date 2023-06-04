# Components

<!-- MarkdownTOC -->

- [Slots](#slots)
- [Attributes](#attributes)
    - [Conditionally Merge Attributes](#conditionally-merge-attributes)
    - [Trouble Shooting](#trouble-shooting)
    - [Component not accepting parameters](#component-not-accepting-parameters)
    - [Attributes are not forwarding to component layout](#attributes-are-not-forwarding-to-component-layout)
    - [Component won't accept boolean value?](#component-wont-accept-boolean-value)

<!-- /MarkdownTOC -->


<a id="named-slots"></a>
## Slots

    <x-slot:heading class="font-bold">
        Heading
    </x-slot>

```html
{{ $title }}
<x-slot name="title"> ... </x-slot>
```

<a id="attributes"></a>
## Attributes

```html
<div {{ $attributes->merge(['class' => 'alert']) }}>
    {{ $message }}
</div>
```

### Conditionally Merge Attributes

```html
<div {{ $attributes->class(['p-4', 'bg-red' => $hasError]) }}>
    {{ $message }}
</div>
```

### Trouble Shooting

<a id="component-not-accepting-parameters"></a>
### Component not accepting parameters

Run `php artisan optimize:clear`

<a id="attributes-are-not-forwarding-to-component-layout"></a>
### Attributes are not forwarding to component layout

Check to make sure the layout has a `$slot` to pass the attributes too.

<a id="component-wont-accept-boolean-value"></a>
### Component won't accept boolean value?

PHP expressions and variables should be passed to the component via attributes that use the : character as a prefix:

    <livewire:my-component :myBool=true> -NOT- <livewire.my-component myBool=true>


