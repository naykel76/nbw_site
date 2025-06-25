# Session

<div class="small-headings"></div>

- [Storing Data](#storing-data)
  - [`push(string $key, mixed $value)` - add a value to an array](#pushstring-key-mixed-value---add-a-value-to-an-array)
  - [`put(string|array $key, mixed $value = null)` - store or update data in the session](#putstringarray-key-mixed-value--null---store-or-update-data-in-the-session)
- [Retrieve Session Data](#retrieve-session-data)
  - [`all(): array` - get all session data](#all-array---get-all-session-data)
  - [`except(array $keys): array` - get all session data except for specific keys](#exceptarray-keys-array---get-all-session-data-except-for-specific-keys)
  - [`get(string $key, mixed $default = null)` - get a value from the session](#getstring-key-mixed-default--null---get-a-value-from-the-session)
  - [`only(array $keys): array` - get a portion of the session data](#onlyarray-keys-array---get-a-portion-of-the-session-data)
- [Removing Data](#removing-data)
  - [`flush(): void` - remove all session data](#flush-void---remove-all-session-data)
  - [`forget(string|array $keys): void` - remove multiple key-value pairs](#forgetstringarray-keys-void---remove-multiple-key-value-pairs)
  - [`pull(string $key, mixed $default = null)` - remove a single key-value pair and return the value](#pullstring-key-mixed-default--null---remove-a-single-key-value-pair-and-return-the-value)
  - [`remove(string $key)` - remove a single key-value pair](#removestring-key---remove-a-single-key-value-pair)
- [Item Existence](#item-existence)
  - [`exists(string|array $key): bool` - check if an item exists in the session, even if its value is null](#existsstringarray-key-bool---check-if-an-item-exists-in-the-session-even-if-its-value-is-null)
  - [`has(string|array $key): bool` - check if an item exists in the session and is not `null`](#hasstringarray-key-bool---check-if-an-item-exists-in-the-session-and-is-not-null)
  - [`hasAny(string|array $key): bool` - check if any of the items exist in the session](#hasanystringarray-key-bool---check-if-any-of-the-items-exist-in-the-session)
  - [`missing(string|array $key): bool` - check if an item is missing from the session](#missingstringarray-key-bool---check-if-an-item-is-missing-from-the-session)

```html +parse
<x-alert type="info">
These examples are using the <code>Session</code> facade. You can also use the <code>session()</code> helper function.
</x-alert>
```

## Storing Data

### `push(string $key, mixed $value)` - add a value to an array

```php +torchlight-php
Session::push('users', 'Sam Smith');
```

### `put(string|array $key, mixed $value = null)` - store or update data in the session

```php +torchlight-php
// Store a single key-value pair
Session::put('name', 'Mike Dingle'); 

// Store multiple key-value pairs
Session::put(['name' => 'Mike Dingle', 'age' => '30']);

// Store an array of values
Session::put('name', ['Mike Dingle', 'Sue Mcallen']);
```

## Retrieve Session Data

### `all(): array` - get all session data

```php +torchlight-php
$data = Session::all();
```

### `except(array $keys): array` - get all session data except for specific keys

```php +torchlight-php
$data = Session::except(['username', 'email']);
```

### `get(string $key, mixed $default = null)` - get a value from the session

```php +torchlight-php
// Get the value of a specific key
$username = Session::get('username');

// Get the value of a specific key, or a default value if the key is not present
$username = Session::get('username', 'default value');

// Get the value of a specific key, or execute a callback if the key is not present
$username = Session::get('username', function () {
    return 'default value';
});
```

### `only(array $keys): array` - get a portion of the session data

```php +torchlight-php
$data = Session::only(['username', 'email']);
```

## Removing Data

### `flush(): void` - remove all session data

```php +torchlight-php
flush(): void
```

### `forget(string|array $keys): void` - remove multiple key-value pairs

```php +torchlight-php
Session::forget(['username', 'email']);
```

### `pull(string $key, mixed $default = null)` - remove a single key-value pair and return the value
    
```php +torchlight-php
$username = Session::pull('username');
```

### `remove(string $key)` - remove a single key-value pair

```php +torchlight-php
Session::remove('username');
```

## Item Existence

### `exists(string|array $key): bool` - check if an item exists in the session, even if its value is null

### `has(string|array $key): bool` - check if an item exists in the session and is not `null`

### `hasAny(string|array $key): bool` - check if any of the items exist in the session

### `missing(string|array $key): bool` - check if an item is missing from the session


<!-- ## Storing Session Data in Database -->

<!-- 
ageFlashData(): void
bool isValidId(string|null $id)
bool migrate(bool $destroy = false)
bool regenerate(bool $destroy = false)
bool start()
driver(string|null $driver = null)
except(array $keys): array
flash(string $key, mixed $value = true): void
flashInput(array $value): void
flushMacros(): void
getDrivers(): array
getOldInput(string|null $key = null, mixed $default = null)
getSessionConfig(): array
handlerNeedsRequest(): bool
hasMacro(string $name): bool
hasOldInput(string|null $key = null): bool
increment(string $key, int $amount = 1)
int decrement(string $key, int $amount = 1)
int defaultRouteBlockLockSeconds()
int defaultRouteBlockWaitSeconds()
invalidate(): bool
isStarted(): bool
keep(array|mixed $keys = null): void
macro(string $name, object|callable $macro, object|callable $macro = null): void
mixin(object $mixin, bool $replace = true): void
now(string $key, mixed $value): void
passwordConfirmed(): void
reflash(): void
regenerateToken(): void
remember(string $key, \Closure $callback)
replace(array $attributes): void
save(): void
setDefaultDriver(string $name): void
setExists(bool $value): void
setId(string|null $id): void
setName(string $name): void
setPreviousUrl(string $url): void
setRequestOnHandler(\Illuminate\Http\Request $request): void
string getDefaultDriver()
string getId()
string getName()
string id()
string token()
string|null blockDriver()
string|null previousUrl()
 * -->

