# Working with JSON Arrays in Laravel

This guide explains how to store and update an array of values (e.g. tags or codes) using a JSON column in a Laravel model.

#### 1. Cast the Field in Your Model

To automatically convert the JSON field to and from an array, define a cast in your model:

```php +code
protected $casts = [
    'tags' => 'array',
];
```

#### 2. Storing Values

To store an array of values in the database:

```php +code
$user = User::find($id);
$user->tags = ['CSS', 'Javascript', 'PHP'];
$user->save();
```

#### 3. Updating the Array

**Add a new value:**

```php +code
$user = User::find($id);
$tags = $user->tags ?? [];
$tags[] = 'Laravel';
$user->tags = array_unique($tags);
$user->save();
```

**Remove an existing value:**

```php +code
$user = User::find($id);
$user->tags = array_values(array_diff($user->tags ?? [], ['PHP']));
$user->save();
```

Use this approach for simple cases where a full relational table isn’t needed. JSON arrays offer flexibility with minimal overhead.
