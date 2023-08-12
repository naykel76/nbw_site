# Responsive Class Mixins
<!-- TOC -->

- [Introduction](#introduction)
    - [Understanding Responsive Classes](#understanding-responsive-classes)
- [Target a single breakpoint `makeOnBreakpoint()`](#target-a-single-breakpoint-makeonbreakpoint)
- [Target up-to a breakpoint `makeToBreakpoint()`](#target-up-to-a-breakpoint-maketobreakpoint)
- [Target from a breakpoint `makeFromBreakpoint()`](#target-from-a-breakpoint-makefrombreakpoint)

<!-- /TOC -->

<a id="markdown-introduction" name="introduction"></a>

## Introduction

Responsive class mixins can be used to create responsive classes for specific CSS properties at
different breakpoints.

```scss
@include make[Target]Breakpoint($property, $value, $identifier, $breakpoints...);
```

You can create multiple responsive classes by adding multiple breakpoints separated by a comma
when calling a responsive mixin. This allows you to define distinct styles for various viewport
sizes.

<code-first-col></code-first-col>
| Command      | Description                                            |
| ------------ | ------------------------------------------------------ |
| $property    | The CSS property to be styled.                         |
| $value       | The value to be applied to the property.               |
| $identifier  | An identifier to be used in the generated class names. |
| $breakpoints | One or more breakpoints to apply the styles on.        |

<a id="markdown-understanding-responsive-classes" name="understanding-responsive-classes"></a>

### Understanding Responsive Classes

Refer to [responsive design](/docs/jtb/responsive-design).

<a id="markdown-target-a-single-breakpoint-makeonbreakpoint" name="target-a-single-breakpoint-makeonbreakpoint"></a>

## Target a single breakpoint `makeOnBreakpoint()`

`on-{breakpoint}:{identifier}`

**Example Usage:**
```scss
@include makeOnBreakpoint(display, none, "hide", "sm", "md");
```

**Output:**
```scss
@media (min-width: 576px) and (max-width: 767px) {
  .on-sm\:hide {
    display: none;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .on-md\:hide {
    display: none;
  }
}
```

<a id="markdown-target-up-to-a-breakpoint-maketobreakpoint" name="target-up-to-a-breakpoint-maketobreakpoint"></a>

## Target up-to a breakpoint `makeToBreakpoint()`

`to-{breakpoint}:{identifier}`

**Example Usage:**
```scss
@include makeToBreakpoint(display, none, "hide", "sm", "md");
```

**Output:**
```scss
@media (max-width: 575px) {
  .to-sm\:hide {
    display: none;
  }
}
@media (max-width: 767px) {
  .to-md\:hide {
    display: none;
  }
}
```

<a id="markdown-target-from-a-breakpoint-makefrombreakpoint" name="target-from-a-breakpoint-makefrombreakpoint"></a>

## Target from a breakpoint `makeFromBreakpoint()`

`{breakpoint}:{identifier}`



**Example Usage:**
```scss
@include makeFromBreakpoint(display, none, "hide", "sm", "md");
```

**Output:**
```scss
@media (min-width: 576px) {
  .sm\:hide {
    display: none;
  }
}
@media (min-width: 768px) {
  .md\:hide {
    display: none;
  }
}
```


