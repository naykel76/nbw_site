# Media Mixins
<!-- TOC -->

- [Target a single breakpoint `on-{bp}`](#target-a-single-breakpoint-on-bp)
- [Target up-to a breakpoint `to-{bp}`](#target-up-to-a-breakpoint-to-bp)
- [Target from a breakpoint `from-{bp}`](#target-from-a-breakpoint-from-bp)
- [Usage Examples](#usage-examples)

<!-- /TOC -->

<a id="markdown-target-a-single-breakpoint-on-bp" name="target-a-single-breakpoint-on-bp"></a>

## Target a single breakpoint `on-{bp}`

```scss
@include on-sm {}
@include on-md {}
@include on-lg {}
@include on-xl {}
@include on-xxl {}
```


<a id="markdown-target-up-to-a-breakpoint-to-bp" name="target-up-to-a-breakpoint-to-bp"></a>

## Target up-to a breakpoint `to-{bp}`

```scss
@include to-sm {}
@include to-md {}
@include to-lg {}
@include to-xl {}
```


<a id="markdown-target-from-a-breakpoint-from-bp" name="target-from-a-breakpoint-from-bp"></a>

## Target from a breakpoint `from-{bp}`

```scss
@include from-sm {}
@include from-md {}
@include from-lg {}
@include from-xl {}
@include from-xxl {}
```

<a id="markdown-usage-examples" name="usage-examples"></a>

## Usage Examples

The **Nested Media Query** method is useful if you want to nest your media queries inside you class to keep them together.

    .my-class {
        @include mobile-only { }
        @include from-lg { }
    }

The **Standalone Media Query** method is useful if you want to create multiple classes for a single media query.

    @include tablet-only {
        .my-class {background: hsl(240, 50%, 30%);}
        .my-other-class {font-size: 1rem;}
    }
