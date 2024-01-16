# Validation


<!-- MarkdownTOC -->

- [Things To Know](#things-to-know)
- [Validation Examples](#validation-examples)
    - [Required (if | unless)](#required-if--unless)
    - [Conditionally Adding Rules (exclude\_if | exclude\_unless)](#conditionally-adding-rules-exclude_if--exclude_unless)
- [Conditional Rules](#conditional-rules)
    - [Nested Properties](#nested-properties)
- [Required (if | when | unless | with | ...)](#required-if--when--unless--with--)
- [Unique](#unique)
    - [Unique Based on Multiple Conditions](#unique-based-on-multiple-conditions)
- [Numbers and Currency](#numbers-and-currency)
    - [Phone Number](#phone-number)

<!-- /MarkdownTOC -->

<a id="things-to-know"></a>
## Things To Know

By default, Laravel includes the `TrimStrings` and `ConvertEmptyStringsToNull` middleware in your
application's global middleware stack. Because of this, you will often need to mark your
"optional" request fields as `nullable` if you do not want the validator to consider `null` values
as invalid.

<a id="validation-examples"></a>
## Validation Examples

Make sure you include the "dot notation" to validate nested attributes within an array.

<a id="required-if-%7C-unless"></a>
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

<a id="conditionally-adding-rules-exclude_if-%7C-exclude_unless"></a>
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

<a id="conditional-rules"></a>
## Conditional Rules



<a id="nested-properties"></a>
### Nested Properties

```php
'blocks.*.title' => [
    'exclude_if:blocks.*.type,apple,banana', 'required'
],
```

<a id="required-if-%7C-when-%7C-unless-%7C-with-%7C-"></a>
## Required (if | when | unless | with | ...)


```php


required_array_keys:foo,bar,...
required_with:foo,bar,...
required_with_all:foo,bar,...
required_without:foo,bar,...
required_without_all:foo,bar,...
```

##### Validate when database value is:

<a id="unique"></a>
## Unique



<a id="unique-based-on-multiple-conditions"></a>
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

<a id="numbers-and-currency"></a>
## Numbers and Currency

```php
'price' => 'numeric',
'qoh' => 'integer',
// must add nullable or will get 'must be an integer' error
'sort_order'' => 'nullable|integer'
```

<a id="phone-number"></a>
### Phone Number

    'firstname' => 'required|string|max:128',
    'lastname' => 'required|string|max:128',
    'lastname' => 'required|string',
    'phone_number' => 'required|string|regex:/^[0-9+\s]+$/i|min:10',


In this example, we're validating a phone number input called "phone_number" that must be required, a string, and match the regular expression pattern of "^[0-9+\s]+$", which allows only numbers, plus sign, and spaces. We're also setting a minimum length of 10 characters and a maximum length of 20 characters for the phone number.
