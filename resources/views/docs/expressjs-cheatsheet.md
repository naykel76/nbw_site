# ExpressJS

<!-- TOC -->

- [Routes](#routes)
    - [Route Parameters](#route-parameters)

<!-- /TOC -->

Express Docs

- <a href="https://expressjs.com/" target="_blank">ExpressJS</a>
- <a href="https://expressjs.com/en/guide/routing.html" target="blank">Routing</a>


<a id="markdown-routes" name="routes"></a>

## Routes


- Route paths, in combination with a request method, define the endpoints for a requests
- Route paths can be strings, string patterns, or regular expressions

<a id="markdown-route-parameters" name="route-parameters"></a>

### Route Parameters

```js
Request URL: http://domain.com/users/27
```

```js
app.get('/users/:id/books/:bookId', (req, res) => {
  res.send(req.params)
})
```


| Method              | Description                                               |
| ------------------- | --------------------------------------------------------- |
| `res.send()`        | Send a response of various data types (e.g., JSON, HTML). |
| `res.json()`        | Send a JSON response.                                     |
| `res.sendFile()`    | Send a file as an octet stream.                           |
| `res.sendStatus()`  | Set the response status code and send its string version. |
| `res.redirect()`    | Redirect to a specified URL.                              |
| `res.render()`      | Render a view template with optional data.                |
| `res.download()`    | Prompt a file download with the given file path.          |
| `res.end()`         | End the response process without sending any data.        |
| `res.setHeader()`   | Set a single header value for the response.               |
| `res.set()`         | Set multiple header values for the response.              |
| `res.get()`         | Get the value of a response header.                       |
| `res.status()`      | Set the HTTP status code for the response.                |
| `res.type()`        | Set the Content-Type for the response.                    |
| `res.cookie()`      | Set a cookie in the response header.                      |
| `res.clearCookie()` | Clear a previously set cookie.                            |
| `res.locals`        | An object for passing data to view templates.             |
| `res.append()`      | Append additional headers to the response.                |
| `res.redirect()`    | Redirect the request to another URL.                      |
