# JTB – Just the Basics

- [Introduction](#introduction)
- [Philosophy](#philosophy)
- [Structure \& Override Priority](#structure--override-priority)
- [What makes JTB different?](#what-makes-jtb-different)
    - [Consistent Theming Across Components](#consistent-theming-across-components)
- [Build-Time Focused](#build-time-focused)
- [Getting Started](#getting-started)


## Introduction

JTB is a lightweight Sass framework that sets clear, opinionated defaults for
web projects while giving developers full control to override or extend styles.
It focuses on clarity, consistency, and practicality—ideal for projects that
don't need the bulk of a full CSS framework.

## Philosophy

* **Defaults only where it matters** – Base styles provide a functional
  foundation without styling decisions getting in your way.
* **Utilities first** – Core utilities cover the majority of layout and design
  needs.
* **Override-friendly** – Everything is modular, scoped, and written with
  customisation in mind.
* **No unnecessary abstractions** – Maps, mixins, and variables are structured
  to be readable and maintainable.
* **Build-time logic only** – No runtime styling or complex theme engines.

## Structure & Override Priority

JTB is split into four key areas with clear override hierarchy:

1. **Base styles** – Reset and base HTML element styles. Provides functional
   foundation.
2. **Component styles** – Optional, minimal UI patterns (buttons, forms, lists).
   Can be overridden by utilities.
3. **Utility classes** – Granular control over specific properties. Override
   both base and component styles.
4. **Maps & Mixins** – Build-time tools for utility generation and custom
   configurations.

Override order: Base → Components → Utilities (highest priority)

## What makes JTB different?

Unlike Bootstrap which comes with heavy component styling and theme bloat, or
Tailwind which can result in unreadable utility soup, JTB offers a balanced
middle ground that prioritises developer experience and maintainability.

<!-- - Focus on sensible defaults without over-styling -->

- numbers have meaning 1 = 1rem, 2 = 2rem etc
- decimal is only used for values greater than 1rem e.g. 05 = 0.5rem, 1.5 =
  1.5rem

### Consistent Theming Across Components


<!-- I want to explain here that certain classes work across all components e.g.
primary, secondary, success, warning, sky, rose are all theme classes and they
work the same when applied to any component e.g. button, box, input etc

we no longer need special classes like btn-primary, box-primary, we split and
add `btn` and `primary` so they can be used together or separately -->


One of JTB's key features is unified theming. Components share the same theme
classes, creating visual consistency with minimal cognitive overhead.

<div class="grid cols-2">
    <div class="bx primary">
        This is a primary themed box.
    </div>
    <div class="bx teal">
        This is a teal themed box.
    </div>
</div>

```html +torchlight-html
<div class="bx primary">
    This is a primary themed box.
</div>
<div class="bx teal">
    This is a teal themed box.
</div>
```

<button class="btn primary">Primary Button</button> <button class="btn
teal">Teal Button</button>

```html +torchlight-html
<button class="btn primary">Primary Button</button>
<button class="btn teal">Teal Button</button>
```

The same theme classes work across all components apply `.primary` to a button,
box, or badge and get consistent branding throughout your interface.

<!-- should this be under its own heading? -->
Consider this tailwind button:

```html +torchlight-html    
<button  class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300" type="button"> Button </button>
```

These classes can be categorised as follows:

- **Layout** - `relative`, `inline-flex`, `items-center`
- **Spacing** - `px-4`, `py-2` 
- **Typography** - `text-sm`, `font-medium`, `leading-5` 
- **Border** - `border`, `border-gray-300`, `rounded-md` 
- **Colors (Light mode)** - `text-gray-700`, `bg-white` 
- **States (Light mode)** - `hover:text-gray-500`, `focus:outline-none`,
  `focus:ring`, `focus:ring-blue-300`, `focus:border-blue-300`,
  `active:bg-gray-100`, `active:text-gray-700`
- **Colors (Dark mode)** - `dark:bg-gray-800`, `dark:border-gray-600`,
  `dark:text-gray-300` 
- **States (Dark mode)** - `dark:focus:border-blue-700`,
  `dark:active:bg-gray-700`, `dark:active:text-gray-300` 
- **Transitions** - `transition`, `ease-in-out`, `duration-150`


<!-- this needs to be relocated somewhere sensible -->

## Build-Time Focused

JTB emphasises compile-time generation over runtime complexity:

- **Mixins and variables** generate utilities and components at build time
- **No JavaScript dependencies** for styling or theming
- **Customisable maps** let you define your own color palettes, spacing scales,
  and breakpoints
- **Modular imports** so you only include what you need

## Getting Started

```scss +torchlight-scss
// Import only what you need
@import 'jtb/base';
@import 'jtb/utilities';
@import 'jtb/components/buttons';

// Or import everything
@import 'jtb';
```

JTB gives you the foundation to build fast, maintainable interfaces without the
overhead of larger frameworks or the verbosity of pure utility approaches.