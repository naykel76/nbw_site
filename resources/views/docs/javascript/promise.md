# An Exercise for a Boolean Based Promise

<p class="lead">This is an exercise I went through because I could not understand why an async/await function that returns a boolean promise resolved to true or false but when logging the value to the console it still returned an object instead of the true or false value I was expecting. </p>

Say we have a basic function that returns `true` or `false`

```js
isLoggedIn() {
    return condition ? true : false;
}
```

Will this async function resolve the same boolean value of `true` or `false`?

```js
async isLoggedIn(): Promise<boolean> {
    return (await this.storageService.get('isLoggedIn')) ?? false;
}
```

The `isLoggedIn()` function and the `async isLoggedIn()`  function with `await` have different behaviors.

The basic function `isLoggedIn()` simply returns the value `true` or `false` based on the condition.

On the other hand, the `async isLoggedIn()` function with `await` will return a promise that
resolves to a boolean value.

WTF? The promise still needs to be resolved when you use it, is it not already handled?.

Apparently not!

```js
async canActivate() {
    if (! await this.userService.isLoggedIn()) {
        return false;
    }
    return true;
}
```

```js
canActivate() {
    return this.userService.isLoggedIn()
        .then((isLoggedIn) => {
            if (!isLoggedIn) {
                return false;
            }
            return true;
        }).catch((error) => {
            console.error(error);
            return false;
        });
}
```

<!-- In both cases, when you use these functions in an logical evaluation, they will both evaluate to
`true` if the conditions are met.

When you log a promise object to the console, it will display as an object representation rather
than the resolved value. In this case, the promise object is being logged instead of the resolved
boolean value.

The difference lies in how the value is obtained or determined. The first function, `isLoggedIn()`,
directly returns true without any asynchronous operations. It is a synchronous function.

On the other hand, the second function, `isLoggedIn()`, uses `await` to pause the execution and
wait for the resolution of the promise returned by `this.storageService.get('isLoggedIn')`. It is
an asynchronous function returning a `Promise<boolean>`.

The moral of the story is when using asynchronous methods don't waste time logging and looking for
values that will not exist, understand what's going on and spend less time getting sidetracked. -->
