
# Just The Basics (JTB)

<!-- TOC -->

- [Overview](#overview)
- [Design approach](#design-approach)
  - [Utility classes](#utility-classes)
  - [Component classes](#component-classes)
  - [Utility classes vs. base component classes](#utility-classes-vs-base-component-classes)
- [Customise component class 'identifier'](#customise-component-class-identifier)
- [Naming Conventions](#naming-conventions)
  - [Position and Axis Based Naming Conventions](#position-and-axis-based-naming-conventions)

<!-- /TOC -->

<a id="markdown-overview" name="overview"></a>

## Overview

CSS frameworks often become bloated and require excessive classes to achieve basic styling, making
it difficult to maintain readability.

JTB focuses on practicality by offering a sensible set of base classes, utility classes, scss
functions, and mixins allowing you to easily override, build, and create your own styles.

<a id="markdown-design-approach" name="design-approach"></a>

## Design approach

There are two approaches for managing styles:

<a id="markdown-utility-classes" name="utility-classes"></a>

### Utility classes

Utility classes follow an opt-in approach, meaning you explicitly add the classes you need to
create the desired style. This allows you to pick and choose specific utility classes that apply
to your components or elements.

<a id="markdown-component-classes" name="component-classes"></a>

### Component classes

In contrast to utility classes, component classes follows both an opt-out, and opt-out approach to
styling. This means that you can use the component classes to quickly style your components, but
you can also opt in or out of certain styles by adding utility classes to override the component
styles.

<a id="markdown-utility-classes-vs-base-component-classes" name="utility-classes-vs-base-component-classes"></a>

### Utility classes vs. base component classes

Both approaches have their pros and cons.

**Utility classes** are great for creating styles on the fly direct in your html. However, they
can become verbose and difficult to read when you need to apply multiple classes to a single
element.

**Component classes** are great for quickly styling your components and improve readability, but
may require more time to setup and customise.

JTB uses both approaches to give you the best of both worlds. For example, consider creating a
button with a blue theme. Using utility classes at the very least you would need to add the
following classes to your button:

```html
<button class="px-1 py-05 txt-white bg-blue-500 hover:blue-700">Click Me</button>
```

Using component classes you would need to add the following classes to your button:

```html
<button class="btn primary">Click Me</button>
```

The component classes are much cleaner and easier to read than the utility classes, but you may
need to customise the themes to get the styles you want.

<a id="markdown-customise-component-class-identifier" name="customise-component-class-identifier"></a>

## Customise component class 'identifier'

`src/base/vars_identifier.scss` contains a list of identifiers for each component class. The
identifier is simply a string that is in the component class names. JTB allows you to customise
the identifier to suit your needs. For example, you can set the identifier for a button to `btn`
or `button`:

```scss
// Set the identifier for the button component class to 'btn'
$btn-identifier: 'btn';

// Set the identifier for the button component class to 'button'
$btn-identifier: 'button';
```

This allow you to create short or long class names depending on your preference.

## Naming Conventions

### Position and Axis Based Naming Conventions

| Position or Axis |       CSS Position(s)       |
| :--------------: | :-------------------------: |
|       `x`        |       left and right        |
|       `y`        |       top and bottom        |
|       `xy`       | top, bottom, left and right |
|       `t`        |             top             |
|       `b`        |           bottom            |
|       `l`        |            left             |
|       `r`        |            right            |