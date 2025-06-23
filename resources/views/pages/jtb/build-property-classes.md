# Mixin: `build-property-classes`

Generates utility classes for CSS properties using a configuration map. Supports
responsive variants, automatic value-unit handling, and position-based class.

```scss +torchlight-scss
@mixin build-property-classes($properties-map, $responsive: false)
```



## Parameters

`$properties-map` - A map where each key is a **CSS property**, and each value
is a nested map defining its configuration. This includes available values, an
optional prefix, unit, and support for positions and breakpoints.

`$responsive` - A boolean that determines whether to automatically generate responsive classes.

## Workflow

1. **Iterate over each CSS property, retrieve its configuration map and extract**

    * `map-values`: list of allowed values
    * `map-identifier`: class prefix
    * `map-unit`: optional unit (e.g. px, rem)
    * `map-positions`: optional position variants (e.g. top, bottom)
    * `map-breakpoints`: optional responsive variants

2. **Resolve breakpoints**

    * If `$responsive` is true:
        * Use the breakpoints defined in the map, if any (overrides defaults)
        * Otherwise, use the default breakpoints ('sm', 'md', 'lg', 'xl')

    * If `$responsive` is false:
        * Use the breakpoints from the map if defined
        * If no breakpoints are provided, do not generate responsive classes

3. **Iterate over each value**

    For each `key`, `value` in `values`:

    - Set `$identifier` to the map prefix or omit to use the property name as the class prefix.

    **Normalise the key and value to ensure there is a valid variant and value
    pair for class generation.**

    Use the `normalise-variant-value($key, $value)` function to ensure there is a
    valid variant (safe for class names) and a valid CSS value. This function
    handles inputs as either a single value (used for both) or a key-value pair
    (variant and value). Then assign the returned values to `$variant` and `$value`
    for use in class generation.

    **Create the derived class name and value based on the map values**

        set the unit

        set the value

        set the variant

    



    **Generate classes**

   * If `positions` are defined:

     * Call `make-position-based-class()` using:

       * property, derived value, positions map, prefix, variant, breakpoints
   * If not:

     * Generate class name by combining prefix and variant
     * Clean up suffixes with `strip-class-suffixes()`
     * Call `make-single-property-class()` with:

       * class name, property, value, breakpoints



//  $derived-class: #{$bp}\:#{$identifier};

### Example: `margin-top` values and how they convert to CSS classes

This example demonstrates the different ways to define a value in the
`values` map.

```scss +torchlight-scss
$properties-map: (
    margin-top: (
        prefix: 'mt-',
        values: (0.5, 1, 1.5, 2rem, 3px, (sm: 0.25), (lg: 1rem), (lg: 16px), auto),
        unit: 'rem',
    ),
);
```

Converts decimal values under 1 to 05
