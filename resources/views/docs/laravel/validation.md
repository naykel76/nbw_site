# Validation

<!-- TOC -->

- [Things worth noting](#things-worth-noting)
- [Numbers and Currency](#numbers-and-currency)
    - [Phone Number](#phone-number)
- [Unique](#unique)
    - [Ignore a given ID or a specific record](#ignore-a-given-id-or-a-specific-record)
    - [Unique Based on Multiple Conditions](#unique-based-on-multiple-conditions)
- [Conditional Validation](#conditional-validation)
    - [Exclude](#exclude)
        - [`exclude_if` and `exclude_unless`](#exclude_if-and-exclude_unless)
    - [Required](#required)
        - [`required_with` and `required_with_all`](#required_with-and-required_with_all)
        - [`required_if` and `required_unless`](#required_if-and-required_unless)
- [Validate Nested Properties (TBD)](#validate-nested-properties-tbd)

<!-- /TOC -->

<a id="markdown-things-worth-noting" name="things-worth-noting"></a>

## Things worth noting

By default, Laravel includes the `TrimStrings` and `ConvertEmptyStringsToNull` middleware in your
application's global middleware stack. Because of this, you will often need to mark your
"optional" request fields as `nullable` if you do not want the validator to consider `null` values
as invalid.


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


<a id="markdown-conditional-validation" name="conditional-validation"></a>

## Conditional Validation


<a id="markdown-exclude" name="exclude"></a>

### Exclude

<a id="markdown-excludeif-and-excludeunless" name="excludeif-and-excludeunless"></a>

#### `exclude_if` and `exclude_unless`

```php
'field' => 'exclude_if:anotherField,value|required',
'field' => 'exclude_unless:anotherField,value|required',
```
you can check multiple against values using comma separated values.

<a id="markdown-required" name="required"></a>

### Required


<a id="markdown-requiredwith-and-requiredwithall" name="requiredwith-and-requiredwithall"></a>

#### `required_with` and `required_with_all`

```php
'password' => 'required|confirmed|min:6',
'password_confirmation' => 'required_with:password',
```

<a id="markdown-requiredif-and-requiredunless" name="requiredif-and-requiredunless"></a>

#### `required_if` and `required_unless`
```php
'field' => 'required_if:anotherField,value,anotherValue',
'field' => 'required_unless:anotherField,value,anotherValue',
```

<a id="markdown-validate-nested-properties-tbd" name="validate-nested-properties-tbd"></a>

## Validate Nested Properties (TBD)

```php
'blocks.*.title' => [
    'exclude_if:blocks.*.type,apple,banana', 'required'
],
// check nested values using dot notation
'field' => 'required_if:nested.anotherField,value,anotherValue',
'field' => 'required_unless:nested.anotherField,value,anotherValue',
```




    'editing.order_date' => 'required|date',

    // convert to comma separated list of keys
    'editing.status' => 'required|in:' . collect(Order::STATUSES)->keys()->implode(','),



