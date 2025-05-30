# JavaScript Fetch API

<!-- TOC -->

- [Options](#options)
- [Other Examples](#other-examples)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API" target="blank">MDN Fetch API Docs</a>

```js
fetch(path, {options});
```

The fetch api return a promise that contains the response data. This response data contains
properties for the status as well as methods for converting the raw response data to JSON, text,
or other formats.

Typically, for JSON API data fetching with the Fetch API, you would start by fetching the URL,
converting the response to JSON, and then using the data in the final `.then` block.

```js
fetch("https://jsonplaceholder.typicode.com/users")
    .then(res => res.json())  // call the json method on the response
    .then(data => console.log(data)) // get the data from the json method
```

<a id="markdown-options" name="options"></a>

## Options

Often times you, will need to pass additional options to fetch in order to configure it. The fetch
function takes a second `options` object parameter which contains a large list of potential options.

```js
let options = {
    method: {GET|POST|PUT|DELETE}, // HTTP verb
    headers: *,
    body: *,
    mode: {cors|no-cors|same-origin},
    credentials: *,
    cache: *,
    redirect: *,
    referrer: *,
    integrity: *,
    keepalive: *,
    signal: *,
}
```

<code class="txt-xl">body</code>

The `body` option is used to send data with your request. It's important to know that the `body`
does not accept objects directly. To send `JSON` data to your API, you must first convert the
object to a `JSON` string using `JSON.stringify()`. This ensures that the data is properly
formatted and sent to the server.

<code class="txt-xl">headers</code>

You must set the appropriate `headers` to inform the API about the JSON data being sent. The `headers`
option allows you to specify any HTTP header you need to include in the request, including the one
to indicate that JSON data is being sent.

By setting the `'Content-Type': 'application/json'` header, you inform the API that the request body
contains JSON data. This ensures that the server can properly process the data being sent.

```js
fetch("https://jsonplaceholder.typicode.com/users", {
    method: "POST",
    body: JSON.stringify({ name: "Timmy" }),
    headers: { "Content-Type": "application/json" },
})
```

Note, to send `multipart/form-data`, you don't need to explicitly set the header; it's
automatically added when you use a `FormData` object.

<code class="txt-xl">mode</code>

The mode option allows you to specify if the request should be a `cors`, `no-cors`, or
`same-origin` request. By default all fetch requests are setup as `cors` requests so you can access
resources on other origins, but if you want you can force the fetch to only allow same-origin
requests which will throw an error if you try to fetch a URL that is not on the same origin.

1. cors: This is the default mode, allowing you to make requests to resources on different origins (domains).
2. no-cors: In this mode, the browser will prevent CORS checks, and you can only access resources
   on the same origin as the current page. It's useful when you don't need the response data, like
   when making a simple request for tracking purposes.
3. same-origin: With this mode, the request is allowed only if the target URL has the same origin
   as the current page. It provides more strict same-origin policy enforcement.


<a id="markdown-other-examples" name="other-examples"></a>

## Other Examples

```js
fetch("https://jsonplaceholder.typicode.com/users")
    .then(res => {
    console.log(res.ok) // true
    console.log(res.status) // 200
    return res.json() // call the json method on the response
    })
```

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources


- <a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API" target="blank">MDN Docs</a>
- <a href="https://blog.webdevsimplified.com/2022-01/js-fetch-api/" target="blank">https://blog.webdevsimplified.com/2022-01/js-fetch-api/</a>
