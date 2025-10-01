# Casts

- [FloatAsInteger](#floatasinteger)
    - [How It Works](#how-it-works)
    - [Usage](#usage)
    - [Choosing Decimals](#choosing-decimals)
- [MoneyCast](#moneycast)
    - [How It Works](#how-it-works-1)
    - [Usage](#usage-1)
    - [Validation](#validation)


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

### Usage

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


## MoneyCast

The `MoneyCast` cast converts monetary values between their database storage
format (integer cents) and application format (float dollars). This approach
avoids floating-point precision issues that can occur when storing decimal
currency values directly.


### How It Works

<!-- is this accurate? -->
- **Database Storage**: Money is stored as integers representing cents (e.g., 1999 = $19.99)
- **Application Access**: Values are automatically converted to floats representing dollars (e.g., 19.99)
- **Precision**: Uses integer storage to avoid floating-point precision issues
- **Null Handling**: Supports nullable columns - null values remain null

### Usage

**Add to Your Model**

```php +torchlight-php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Naykel\Gotime\Casts\MoneyCast;

class Product extends Model
{
    protected $casts = [
        'price' => MoneyCast::class,
    ];
}
```

**Migration (store as integer):**

```php +torchlight-php
Schema::create('products', function (Blueprint $table) {
    $table->integer('price')->nullable(); // or ->default(0) for non-nullable
});
```



### Validation

```php

        'price' => 'required|numeric|min:0|max:999999.99',
```







