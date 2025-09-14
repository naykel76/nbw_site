# Casts

- [FloatAsInteger](#floatasinteger)
    - [How It Works](#how-it-works)
    - [Basic Usage](#basic-usage)
    - [Choosing Decimals](#choosing-decimals)

## FloatAsInteger

The `FloatAsInteger` cast converts decimal numbers to integers for database 
storage while presenting them as floats in your application. This eliminates 
floating-point precision errors and is perfect for financial calculations.

### How It Works

The cast uses powers of 10 to shift decimal places:
- **Storage**: Multiply by 10^decimals and store as integer
- **Retrieval**: Divide by 10^decimals to restore decimal places

```php +torchlight-php
// 2 decimals: $12.34
12.34 × (10 ** 2) = 1234 (stored) → 1234 ÷ 100 = 12.34 (retrieved)

// 4 decimals: 12.3456
12.3456 × (10 ** 4) = 123456 (stored) → 123456 ÷ 10000 = 12.3456 (retrieved)
```

### Basic Usage

```php +torchlight-php
use Naykel\Gotime\Casts\FloatAsInteger;

class Product extends Model
{
    protected $casts = [
        // Examples that work with 2 decimals
        'price' => FloatAsInteger::class,                // 19.99 → stored as 1999 ($19.99)
        'weight' => FloatAsInteger::class . ':2',        // 2.75 → stored as 275 (2.75 kg)
        'tax_rate' => FloatAsInteger::class . ':2',      // 8.25 → stored as 825 (8.25%)

        // Examples that need more precision
        'interest_rate' => FloatAsInteger::class . ':3', // 1.925 → stored as 1925 (1.925%)
    ];
}
```

### Choosing Decimals

Use enough decimal places to store your values exactly:
```php +torchlight-php
// 1.925% needs 3 decimals, not 2
'rate' => FloatAsInteger::class . ':3',  // Stores exact 1.925%
```