# Blade
<!-- TOC -->

- [Conditionally add classes](#conditionally-add-classes)
    - [When a slot is set](#when-a-slot-is-set)
- [Slots](#slots)
    - [Slot attributes](#slot-attributes)

<!-- /TOC -->

<a id="markdown-conditionally-add-classes" name="conditionally-add-classes"></a>

## Conditionally add classes

<a id="markdown-when-a-slot-is-set" name="when-a-slot-is-set"></a>

### When a slot is set

```php
<div {{ attributes->class(['text-lg', isset($aside) ? 'danger' : 'success']) }}>
    {{ $main }}
</div>
```

<a id="markdown-slots" name="slots"></a>

## Slots


<a id="markdown-slot-attributes" name="slot-attributes"></a>

### Slot attributes

```php
<div {{ $attributes->class(['border']) }}>

    <h1 {{ $heading->attributes->class(['text-lg']) }}>
        {{ $heading }}
    </h1>

    {{ $slot }}

</div>
```



