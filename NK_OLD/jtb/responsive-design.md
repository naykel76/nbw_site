#  Responsive Design

- [Introduction](#introduction)
  - [`{breakpoint}:{identifier}`](#breakpointidentifier)
  - [`on-{breakpoint}:{identifier}`](#on-breakpointidentifier)
  - [`to-{breakpoint}:{identifier}`](#to-breakpointidentifier)
- [Working mobile-first](#working-mobile-first)
- [Breakpoints](#breakpoints)
- [Creating Responsive Classes](#creating-responsive-classes)


## Introduction

Responsive design uses prefixed classes to conditionally apply styles based on the viewport size.
The JTB responsive design system provides tools, including breakpoints, media classes, functions,
and mixins, to help modify an element or layout to fit different viewport sizes.

There are three types of responsive classes:

### `{breakpoint}:{identifier}`

Targets an element 'from' a specific screen size. This uses a media query that sets the `min-width`
to target a specific device and above. This is the default breakpoint and does not need to be
prefixed. For example:

```scss
@media (min-width: 768px)
```

### `on-{breakpoint}:{identifier}`

Targets an element 'on' a specific screen size. This uses a media query that sets both `min-width`
and `max-width` to target a specific viewport size. For example:

```scss
@media (min-width: 768px) and (max-width: 991px)
```

### `to-{breakpoint}:{identifier}`

Targets an element 'up to' (not including) a specific screen size. This uses a media query that sets
the `max-width` to target a specific device and below. For example:

```scss
@media (max-width: 767px)
```

## Working mobile-first

Avoid using `sm` or `mobile` to target mobile devices. Instead, use unprefixed utilities that take
effect on all screen sizes, and override them at larger breakpoints.

For instance, to hide an element on a mobile device, apply the `hide` class, which hides the
element on all devices. Then, add a `sm:display` class, which displays the element from `576px`
onwards.

```html
<div class="hide sm:display"> </div>
```

## Breakpoints

| Breakpoint Prefix | Minimum | Media Query                          |
| ----------------- | ------- | ------------------------------------ |
| `sm`              | 576px   | `@media (min-width: 576px) { ... }`  |
| `md`              | 768px   | `@media (min-width: 768px) { ... }`  |
| `lg`              | 992px   | `@media (min-width: 992px) { ... }`  |
| `xl`              | 1280px  | `@media (min-width: 1280px) { ... }` |
| `2xl`             | 1600px  | `@media (min-width: 1600px) { ... }` |

## Creating Responsive Classes

There are a range of mixins available to help you create responsive classes. Checkout 
the [API documentation](/jtb-api-reference/) for more information.