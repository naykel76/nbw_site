<!-- TOC -->

- [Numbers and Currency](#numbers-and-currency)
    - [Phone Number](#phone-number)
- [Unique](#unique)
    - [Ignore a given ID or a specific record](#ignore-a-given-id-or-a-specific-record)
- [Things worth noting](#things-worth-noting)
    - [Required (if | unless)](#required-if--unless)
    - [Conditionally Adding Rules (exclude\_if | exclude\_unless)](#conditionally-adding-rules-exclude_if--exclude_unless)
- [Conditional Rules](#conditional-rules)
    - [Nested Properties](#nested-properties)
- [Required (if | when | unless | with | ...)](#required-if--when--unless--with--)
- [Unique](#unique-1)
    - [Unique Based on Multiple Conditions](#unique-based-on-multiple-conditions)

<!-- /TOC -->

<a id="markdown-numbers-and-currency" name="numbers-and-currency"></a>

## Numbers and Currency

This regex pattern will match any string that starts with one or more digits and optionally ends
with a dot followed by exactly two digits.

```php
'price' => 'required|regex:/^\d+(\.\d{2})?$/',
```

- `^` : This asserts the start of a line. The pattern must match at the beginning of the line.
- `\d+` : This matches one or more digits (0-9).
- `(\.\d{2})?` : This is a group that matches a dot (.) followed by exactly two digits. The
  question mark (?) after the group makes this group optional, meaning it can appear once or not
  at all.
- `$` : This asserts the end of a line. The pattern must match at the end of the line.

<a id="markdown-phone-number" name="phone-number"></a>

### Phone Number

```php
'phone_number' => 'required|string|regex:/^[0-9+\s]+$/i|min:10',
```


In this example, we're validating a phone number input called "phone_number" that must be required, a string, and match the regular expression pattern of "^[0-9+\s]+$", which allows only numbers, plus sign, and spaces. We're also setting a minimum length of 10 characters and a maximum length of 20 characters for the phone number.

<a id="markdown-unique" name="unique"></a>

## Unique

`unique:table,column,except,idColumn`


<a id="markdown-ignore-a-given-id-or-a-specific-record" name="ignore-a-given-id-or-a-specific-record"></a>

### Ignore a given ID or a specific record

```php
'code' => 'required|min:3|unique:courses,code,' . $this->course->id,
'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
```

```php
use Illuminate\Validation\Rule;

'code' => ['required', Rule::unique('courses')->ignore($this->course)],
```





<a id="markdown-things-worth-noting" name="things-worth-noting"></a>

## Things worth noting

By default, Laravel includes the `TrimStrings` and `ConvertEmptyStringsToNull` middleware in your
application's global middleware stack. Because of this, you will often need to mark your
"optional" request fields as `nullable` if you do not want the validator to consider `null` values
as invalid.

-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-




<a id="markdown-required-if--unless" name="required-if--unless"></a>

### Required (if | unless)

```php
// you can check multiple comma separated values
'field' => 'required_if:anotherField,value,anotherValue',
'field' => 'required_unless:anotherField,value,anotherValue',
// check nested values using dot notation
'field' => 'required_if:nested.anotherField,value,anotherValue',
'field' => 'required_unless:nested.anotherField,value,anotherValue',
```

The callback function in the `requiredIf` rule field is used to specify additional conditions for
the field to be required.

```php
'editing.config.cerpsE' => Rule::requiredIf(
    fn () => !$this->AllFieldsAreZeroOrEmpty() && $this->editing->isCerpsApproved()
),
```


<a id="markdown-conditionally-adding-rules-excludeif--excludeunless" name="conditionally-adding-rules-excludeif--excludeunless"></a>

### Conditionally Adding Rules (exclude_if | exclude_unless)

```php
'field' => 'exclude_if:published,false|required',
'field' => 'exclude_unless:published,true|required',
```

---
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

    'editing.order_date' => 'required|date',

    // convert to comma separated list of keys
    'editing.status' => 'required|in:' . collect(Order::STATUSES)->keys()->implode(','),


<a id="markdown-conditional-rules" name="conditional-rules"></a>

## Conditional Rules




<a id="markdown-nested-properties" name="nested-properties"></a>

### Nested Properties

```php
'blocks.*.title' => [
    'exclude_if:blocks.*.type,apple,banana', 'required'
],
```


<a id="markdown-required-if--when--unless--with--" name="required-if--when--unless--with--"></a>

## Required (if | when | unless | with | ...)


```php


required_array_keys:foo,bar,...
required_with:foo,bar,...
required_with_all:foo,bar,...
required_without:foo,bar,...
required_without_all:foo,bar,...
```


<a id="markdown-validate-when-database-value-is" name="validate-when-database-value-is"></a>

##### Validate when database value is:


<a id="markdown-unique" name="unique"></a>

## Unique




<a id="markdown-unique-based-on-multiple-conditions" name="unique-based-on-multiple-conditions"></a>

### Unique Based on Multiple Conditions

The following validation rule is checking for uniqueness of the `route_prefix`
value, but only if the `is_category` field is `true`. If `is_category` is
`false`, the validation rule does nothing.

If `is_category` is true, the validation rule checks whether any other record
in the pages table has a `route_prefix` value that matches the `route_prefix`
value of the record being edited (`$this->editing->route_prefix`), and also
has `is_category` set to `true`. If such a record exists, the validation rule
will fail (because the `route_prefix` value must be unique for all
`is_category` records with the same value).

This 'always false' condition is because the unique rule requires a valid
WHERE clause to work, and in this case, when the `is_category` field is
`false`, there is no need to apply any condition to the query.

```php
'editing.route_prefix' => [
    Rule::requiredIf($this->editing->is_category),
    Rule::unique('pages', 'route_prefix')
        ->where(function ($query) {
            if ($this->editing->is_category) {
                return $query->where('route_prefix', $this->editing->route_prefix);
            }
            return $query->whereRaw('1=0'); // always false condition
        })
        ->ignore($this->editing->id)
],
```



