# Helper Mixins
<!-- TOC -->

- [Common Attributes](#common-attributes)
- [Class Creator Mixins](#class-creator-mixins)
    - [`singlePropertyClass($class, $property, $value)`](#singlepropertyclassclass-property-value)

<!-- /TOC -->

<a id="markdown-common-attributes" name="common-attributes"></a>

## Common Attributes
 <code-first-col></code-first-col>
| Command   | Description                                    |
| --------- | ---------------------------------------------- |
| $class**  | The full name of the CSS class to be generated |
| $property | The CSS property to be applied to the class    |
| $value    | The value of the CSS property to be assigned   |

** decimals and slashes should be escape in class names when using additional mixins

<a id="markdown-class-creator-mixins" name="class-creator-mixins"></a>

## Class Creator Mixins



<a id="markdown-singlepropertyclassclass-property-value" name="singlepropertyclassclass-property-value"></a>

### `singlePropertyClass($class, $property, $value)`

Create a class with a single property.

This helper function expects the full class name be passed in and value must specify the unit (if
required).

**Example Usage:**

```scss
@include singlePropertyClass(box-title-color, color, #333)
```

**Output:**

```scss
.box-title-color {
    color: #333;
}
```



