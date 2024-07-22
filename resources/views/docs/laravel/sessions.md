# Session

- [Retrieve Session Data](#retrieve-session-data)
  - [Retrieving all session data](#retrieving-all-session-data)
  - [Retrieving a portion of the session data](#retrieving-a-portion-of-the-session-data)
- [Item Existence](#item-existence)


## Retrieve Session Data

### Retrieving all session data

```php
$data = $request->session()->all();
```

### Retrieving a portion of the session data

```php
$data = $request->session()->only(['username', 'email']);
$data = $request->session()->except(['username', 'email']);
```

## Item Existence

```php
// `true` if the item is present and is not `null`
$isPresent = $request->session()->has('username')

// `true` if item is present in the session, even if its value is null
$exists = $request->session()->exists('users') 

// `true` if the item IS NOT present
$request->session()->missing('users')
```




<!-- 
bool exists(string|array $key)
bool handlerNeedsRequest()
bool has(string|array $key)
bool hasAny(string|array $key)
bool hasMacro(string $name)
bool hasOldInput(string|null $key = null)
bool invalidate()
bool isStarted()
bool isValidId(string|null $id)
bool migrate(bool $destroy = false)
bool missing(string|array $key)
bool regenerate(bool $destroy = false)
bool shouldBlock()
bool start()
int decrement(string $key, int $amount = 1)
int defaultRouteBlockLockSeconds()
int defaultRouteBlockWaitSeconds()
mixed driver(string|null $driver = null)
mixed get(string $key, mixed $default = null)
mixed getOldInput(string|null $key = null, mixed $default = null)
mixed increment(string $key, int $amount = 1)
mixed pull(string $key, mixed $default = null)
mixed remember(string $key, \Closure $callback)
mixed remove(string $key)
string getDefaultDriver()
string getId()
string getName()
string id()
string token()
string|null blockDriver()
string|null previousUrl()
void ageFlashData()
void flash(string $key, mixed $value = true)
void flashInput(array $value)
void flush()
void flushMacros()
void forget(string|array $keys)
void keep(array|mixed $keys = null)
void macro(string $name, object|callable $macro, object|callable $macro = null)
void mixin(object $mixin, bool $replace = true)
void now(string $key, mixed $value)
void passwordConfirmed()
void push(string $key, mixed $value)
void put(string|array $key, mixed $value = null)
void reflash()
void regenerateToken()
void replace(array $attributes)
void save()
void setDefaultDriver(string $name)
void setExists(bool $value)
void setId(string|null $id)
void setName(string $name)
void setPreviousUrl(string $url)
void setRequestOnHandler(\Illuminate\Http\Request $request)
 -->