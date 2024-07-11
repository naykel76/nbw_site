# Authorization

<!-- 
isEmpty()
isNotEmpty()
is()
isNot() 
-->


#### Determine if the two models have the same ID and belong to the same table

If this user 'is' the currently authenticated user, then you are authorized.

```php
$user->is(Auth::user());
$user->isNot(Auth::user());

$user->is($post->user);
$user->isNot($post->user);


$user->can();
$user->cannot();
```

## Policies (TBD)

## Gates (TBD)

```html +parse

```

if auth and ! user