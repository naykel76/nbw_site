
# Errors, Messages and Notifications

<!-- MarkdownTOC -->

- [Flash Messages](#flash-messages)
    - [Redirecting With Flashed Session Data](#redirecting-with-flashed-session-data)
    - [Displaying The Flash Message](#displaying-the-flash-message)
- [Error Messages](#error-messages)

<!-- /MarkdownTOC -->

<a id="flash-messages"></a>
## Flash Messages

<a id="redirecting-with-flashed-session-data"></a>
### Redirecting With Flashed Session Data

```php
// specify key and message
->with('key', 'Message to be displayed');
// shorthand
->withKey('Message to be displayed');
// can chain together
->withKey('Message to be displayed')->withAnotherKey('Message to be displayed');
```
<a id="displaying-the-flash-message"></a>
### Displaying The Flash Message

<pre>role=&quot;alert&quot;&gt;role=&quot;alert&quot;&gt;&lt;div class=&quot;bx success&quot; role=&quot;alert&quot;&gt;&lt;div class=&quot;bx success&quot;role=&quot;alert&quot;&gt;role=&quot;alert&quot;&gt;&lt;div class=&quot;bx success&quot; role=&quot;alert&quot;&gt;&lt;div class=&quot;bx success&quot;</pre>

```php
@if(session()->has('key'))
    <div class="bx success" role="alert">
        {{ session('key') }}
    </div>
@endif
```

<a id="error-messages"></a>
## Error Messages

```php
// `$errors->any()` same as `session()->has('errors')`
@if ($errors->any())
    <div class="bx danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

    <?php
    // Determining if Messages Exist for a Field
    $emailHasError = $errors->has('form.email');
    // Retrieving the First Error Message for a Field
    $getFirstError = $errors->first('form.email');
    ?>



