# Cleaner Code Examples

<!-- TOC -->

- [If-Else Statements](#if-else-statements)
- [Method Extraction](#method-extraction)

<!-- /TOC -->

<a id="markdown-if-else-statements" name="if-else-statements"></a>

## If-Else Statements

```php
if (session('cart')->total) {
    $value = (session('cart')->total);
} else {
    $value = 50;
}
```

**shorter**
```php
$value = (session('cart')->total) ? (session('cart')->total) : 50;
```


**Shortest**
```php
$value = session('cart')->total ?? 50;
```


<a id="markdown-method-extraction" name="method-extraction"></a>

## Method Extraction

In this example, the expression `'cart.items.' . $this->product($id)` is used multiple times to
retrieve the item key from the session. To improve code readability and reduce duplication it
might be helpful to extract this logic into a separate method.

```php
public function add(int $id, int $qty) {
    $this->session->put('cart.items.' . $this->product($id), $qty);
}

public function remove(int $id) {
    $this->session->remove('cart.items.' . $this->product($id));
}
```

```php
public function add(int $id, int $qty) {
    $this->session->put($this->getCartItemKey($id), $qty);
}

public function remove(int $id) {
    $this->session->remove($this->getCartItemKey($id));
}

private function getCartItemKey(int $id) {
    return 'cart.items.' . $this->product($id);
}
```
