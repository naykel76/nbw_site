# Components

- [Things to Know](#things-to-know)
- [Conditionally Add Classes](#conditionally-add-classes)
    - [When a slot is set](#when-a-slot-is-set)
- [Named Slots and Attributes](#named-slots-and-attributes)
- [Trouble Shooting](#trouble-shooting)
    - [Component won't accept boolean value?](#component-wont-accept-boolean-value)

## Things to Know

<div class="adjacent-list-space-1"></div>

- Attributes are anything passed to the component that is not a prop. This includes
  classes, styles, HTML attributes or any arbitrary attributes.

- When a blade component is rendered, it renders the slot first. Then it passes that slot
  into a variable that is available in the component. This variable is called `$slot`.

- Child components are not aware of the parents default props unless you include the
  `@aware` directive. This is because the child component is rendered first and then the
  parent component is rendered so the child component is not aware of the parent's default
  props.

- When you create a new component, it will be placed in the `resources/views/components` directory. 

- Slots and attribute are kind of interchangeable. You can pass a slot as an attribute and
  vice versa. (this is a simplification but it's a good way to think about it)

- Identifying the difference between slots and props can be useful for creating more
  advanced components. 

```html
@props([ 'heading' => 'Some default heading...', ])

<div {{ $attributes->class(['bx']) }} >
    <div>
        @if ($heading instanceof \Illuminate\View\ComponentSlot)
            {{ $heading }}
        @else
            <h2>{{ $heading }}</h2>
        @endif
    </div>

    <div> {{ $slot }} </div>
</div>
```

## Conditionally Add Classes

### When a slot is set

```php +torchlight-php
<div {{ attributes->class(['text-lg', isset($aside) ? 'danger' : 'success']) }}>
    {{ $main }}
</div>
```

## Named Slots and Attributes

Create a named slot with `$attribute` forwarding in the component:

```html
<div {{ $heading->attributes }}> {{ $heading }} </div>
```

Use the named slot in the component using the `x-slot` directive:

```html
<x-slot name="title"> ... </x-slot>
```

You can merge attributes for named slots the same way you would for the default slot.

```html
<div {{ $heading->attributes->class('bg-blue-400') }}> 
    {{ $heading }}
</div>
```

You can also merge attributes based on the presence of slot attributes.

```html
<x-slot name="footer" danger> ... </x-slot>

<div {{ $heading->attributes->class('danger' => $footer->attributes->has('danger')) }}> 
    {{ $heading }}
</div>
```

## Trouble Shooting

### Component won't accept boolean value?

PHP expressions and variables should be passed to the component via attributes that use the : character as a prefix:

    <livewire:my-component :myBool=true> -NOT- <livewire.my-component myBool=true>
