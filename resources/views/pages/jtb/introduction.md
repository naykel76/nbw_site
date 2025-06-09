# JTB – Just the Basics

## Introduction

JTB is a lightweight Sass framework that sets clear, opinionated defaults for web projects
while giving developers full control to override or extend styles. It focuses on clarity,
consistency, and practicality—ideal for projects that don’t need the bulk of a full CSS
framework.

## Philosophy

* **Defaults only where it matters** – base styles provide a functional foundation without
  styling decisions getting in your way.
* **Utilities first** – core utilities cover the majority of layout and design needs.
* **Override-friendly** – everything is modular, scoped, and written with customisation in
  mind.
* **No unnecessary abstractions** – maps, mixins, and variables are structured to be
  readable and maintainable.
* **Build-time logic only** – no runtime styling or complex theme engines.

## Structure & Override Priority

JTB is split into several key areas, each with a clear hierarchy of override priority:

1. **Base styles** – Reset and base HTML element styles with predictable margins,
   typography, and layout spacing. These provide a functional foundation without excessive
   styling choices.
2. **Component styles** – These optional, minimal UI patterns (e.g., buttons, forms,
   lists) can be overridden by utility classes or custom user-defined styles.
3. **Utility classes** – The most granular level of styling, where you can control
   specific properties like margin, padding, display, etc. These utilities can override
   both base and component styles.
4. **Maps & Mixins** – Used for utility generation and custom builds, maps and mixins are
   processed during build-time, providing a clean and maintainable way to define
   repetitive styles.

This structure ensures a predictable, clear order of precedence when overriding styles:

* **Base styles** set the foundation.
* **Component styles** define specific UI elements.
* **Utility classes** give you granular control over layout and design.
* **Maps & mixins** drive the build process and allow for easy customization.


## Naming Conventions

## Maps and Variables

<!-- the build map consists of one ore many other maps -->

- `$values`: A default list of values representing different options or scales
  (such as spacing, sizing, colors, etc.). 
- `$variants`: A map that assigns semantic names (such as `xs`, `sm`, `md`,
  `lg`, `xl`, `full`) to specific values, making it easier to use meaningful
  names in your stylesheets.
- `$map`: Combines the values and variants into a single map using
  `smart-merge`, allowing for flexible and consistent access to settings
  throughout your project.



$values: (0, 1, 2, ...) !default; $variants: (sm: 0.25rem, md: 0.5rem, lg: 1rem)
!default; $map: smart-merge($values, $variants) !default;

These values can be used to generate
  utility classes or referenced in other style definitions.