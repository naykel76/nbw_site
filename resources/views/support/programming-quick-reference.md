# Programming Reference

- [Introduction](#introduction)
- [Type Hinting](#type-hinting)
    - [Livewire](#livewire)
    - [Common Pitfalls](#common-pitfalls)
    - [Quick Decision Guide](#quick-decision-guide)
- [Type Coercion (Casting)](#type-coercion-casting)
    - [Example: Money Values](#example-money-values)


## Introduction

This programming reference centres on universal principles, such as type
hinting, data validation, security, and performance optimisation, rather than
language-specific details. These concepts apply across languages, frameworks,
and tools, making the reference easy to search by problem or concept.

Sections include explanations, examples, and best practices to help apply these
principles effectively.

## Type Hinting

Type hinting (also called type declarations or type annotations) allows you to
declare the expected type of a variable, property, parameter, or return value,
found in PHP, TypeScript, Python, and many other languages. This clarifies
intent, enforces type safety, and improves code readability.

### Livewire

In Livewire components, type hints can be applied to any property to define the
intended type for internal use. Properties retain their type if populated from a
model or programmatically.

```php +torchlight-php
use Livewire\Component;
use Livewire\Attributes\Validate;

class PaymentForm extends Component
{
    // ✅ Name is a string
    public string $name = '';

    // ✅ Amount as float internally
    public float $amount = 0.0;

    // ✅ Optional user ID
    public ?int $userId = null;

    // ✅ Stock as int
    #[Validate('integer|min:0')]
    public int $stock = 0;
}
```

### Common Pitfalls

❌ **Don't:** Assume type hints affect how Livewire receives input. They only
define internal types:

```php
public int $amount; // ❌ Livewire does not coerce values automatically
```

✅ **Do:** Use type hints to enforce internal property types.

### Quick Decision Guide

* **Internal calculation?** → type hint with intended type (`int`, `float`,
  etc.)
* **Optional value?** → nullable (`?int`, `?float`)
* **Property from model?** → type hint normally
* **Database model?** → Use casts or accessors
Perfect, let’s tighten this intro and make it general, not PHP-specific yet. Here’s a refined version:

---

## Type Coercion (Casting)

Type coercion (also called type casting) occurs when a value of one type is
**converted to another type** to perform operations or satisfy type
requirements.

This can happen:

* **Automatically**, by the language during operations (e.g., adding a number to
  a string).
* **Explicitly**, when you intentionally convert a value using a cast or
  conversion function.

Type coercion is common across many languages, including PHP, JavaScript,
Python, and TypeScript, and is particularly important when working with numeric
values, user input, or data from external sources.


### Example: Money Values

Suppose you store money in the database as **integers in cents**:

```php +torchlight-php
$amountCents = 199; // 199 cents
```

If you want to display or calculate in dollars, you need to convert it to a
float:

```php +torchlight-php
$amountDollars = $amountCents / 100; // 1.99
```

**Why type coercion matters:**

* The division converts the integer to a **float** automatically.
* Floating point arithmetic can introduce **precision errors**, e.g., `0.1 + 0.2
  != 0.3` in most languages.
* Using floats for **internal storage or comparisons** can cause subtle bugs.