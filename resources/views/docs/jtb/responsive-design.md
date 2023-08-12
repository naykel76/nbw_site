#  Responsive Design System

<!-- TOC -->

- [Introduction](#introduction)
- [Breakpoints](#breakpoints)
- [Responsive Design](#responsive-design)
- [Working mobile-first](#working-mobile-first)

<!-- /TOC -->

<a id="markdown-introduction" name="introduction"></a>

## Introduction

The JTB responsive design system offers a variety of tools, such as breakpoints, media classes,
functions, and mixins, to manage how an element or layout adapts based on different viewport
sizes.

<a id="markdown-breakpoints" name="breakpoints"></a>

## Breakpoints

| Breakpoint Prefix | Minimum | Media Query                          |
| ----------------- | ------- | ------------------------------------ |
| `sm`              | 576px   | `@media (min-width: 576px) { ... }`  |
| `md`              | 768px   | `@media (min-width: 768px) { ... }`  |
| `lg`              | 992px   | `@media (min-width: 992px) { ... }`  |
| `xl`              | 1280px  | `@media (min-width: 1280px) { ... }` |
| `2xl`             | 1600px  | `@media (min-width: 1600px) { ... }` |

<a id="markdown-responsive-design" name="responsive-design"></a>

## Responsive Design

Responsive design enables the use of prefixed classes to target specific devices or apply styles
`from`, `on` and `up-to` specified breakpoints. On the other hand, un-prefixed utilities will take
effect on all screen sizes without any device-specific targeting.

There are three type of responsive classes, each with a different set of rules to target specific
viewport sizes.

`on-{breakpoint}:{identifier}` - uses a media query which sets the `min` and `max` width to target a
specific device, For example:

```scss
@media (min-width: 768px) and (max-width: 991px) {
  .on-md\:bg-green {
    background-color: #1ec73d !important;
  }
}
```

`to-{breakpoint}:{identifier}` - uses a media query which sets the `max:width` to target any
device up to the specified device, For example:

```scss
@media (max-width: 767px) {
  .to-md\:bg-green {
    background-color: #1ec73d !important;
  }
}
```

`{breakpoint}:{identifier}` - uses a media query which sets the `min:width` to target a
specific device and above, For example:

```scss
@media (min-width: 768px) {
  .md\:bg-green {
    background-color: #1ec73d !important;
  }
}
```

Refer to [responsive mixins](/docs/jtb/mixins-responsive) page for more mixin usage and examples.

<a id="markdown-working-mobile-first" name="working-mobile-first"></a>

## Working mobile-first

Don't use `sm` or `mobile` to target mobile devices, use unprefixed utilities that take effect on
all screen sizes, and override them at larger breakpoints.

For example, if you want to hide an element on a mobile device, you would apply the `hide` class
which hides the element on all devices, then add a `sm:display` which displays from `576px`

```html
<div class="hide sm:display"> </div>
```


