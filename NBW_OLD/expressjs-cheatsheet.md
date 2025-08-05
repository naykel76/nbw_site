# ExpressJS

<!-- TOC -->

- [Server Setup](#server-setup)
    - [Install Dependencies](#install-dependencies)
    - [`server.js`](#serverjs)
    - [path](#path)
- [Routing](#routing)
    - [Defining routes](#defining-routes)
    - [Route Parameters](#route-parameters)
- [Response method quick reference and examples](#response-method-quick-reference-and-examples)
    - [Send a JSON response `res.json()`](#send-a-json-response-resjson)
    - [Send a HTML (file) response `res.sendFile()`](#send-a-html-file-response-ressendfile)
        - [Using static (TBD)](#using-static-tbd)
        - [Using path](#using-path)
- [Trouble shooting](#trouble-shooting)
    - [Endpoint not working as expected](#endpoint-not-working-as-expected)
    - [ReferenceError: \_\_dirname is not defined](#referenceerror-__dirname-is-not-defined)
- [Additional Resources](#additional-resources)

<!-- /TOC -->



<a id="markdown-server-setup" name="server-setup"></a>

## Server Setup

<a id="markdown-install-dependencies" name="install-dependencies"></a>

### Install Dependencies

```bash +torchlight-bash
npm install express cors dotenv
```

Install the `nodemon` package which automatically detects code changes and restarts the server
whenever we make a code change.

```bash +torchlight-bash
npm install nodemon --save-dev
```

<a id="markdown-serverjs" name="serverjs"></a>

### `server.js`

```js
const express = require('express')
const app = express()

const PORT = process.env.PORT || 5000

require('dotenv').config(); // load environment variables

/**
 * Middleware
 * ================================================================
 * You can add middleware here, such as body parsing for JSON data,
 * authentication, error handling middleware, etc.
 */

app.use(express.json()); // Middleware to parse JSON requests

/**
 * Start the server
 * ================================================================
 * Listen on the port specified in the .env file or default to 5000
 */

app.listen(PORT, () => {
  console.log(`Server Running on Port ${PORT}`)
})
```

You can either start the server using the regular `Node.js` command or use `nodemon` for automatic
server restarts when the code changes.

```bash +torchlight-bash
node server.js
```

```bash +torchlight-bash
nodmon server.js
```


<a id="markdown-path" name="path"></a>

### path

```js
import * as url from 'url';
const __filename = url.fileURLToPath(import.meta.url);
const __dirname = url.fileURLToPath(new URL('.', import.meta.url));
```

<a id="markdown-routing" name="routing"></a>

## Routing

**Routing** involves defining routes on the server to handle incoming requests from clients
(usually browsers or other applications) and deciding how the server should respond to a
particular endpoint, which is a URI (or path) and a specific HTTP request method (GET, POST, and
so on).

- Route paths, in combination with a request method, define the endpoints for a requests
- Route paths can be strings, string patterns, or regular expressions


<a id="markdown-defining-routes" name="defining-routes"></a>

### Defining routes

Routes are defined using various HTTP methods (GET, POST, PUT, DELETE, etc.) and URL patterns.
Each route corresponds to a specific endpoint on your server.

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

<a id="markdown-response-method-quick-reference-and-examples" name="response-method-quick-reference-and-examples"></a>

## Response method quick reference and examples

<a id="markdown-send-a-json-response-resjson" name="send-a-json-response-resjson"></a>

### Send a JSON response `res.json()`

``` js
// http://localhost:3232/api/json-response

app.get('/api/json-response', (req, res) => {
    res.json({ message: 'Hey there!' })
})
```

<a id="markdown-send-a-html-file-response-ressendfile" name="send-a-html-file-response-ressendfile"></a>

### Send a HTML (file) response `res.sendFile()`

<a id="markdown-using-static-tbd" name="using-static-tbd"></a>

#### Using static (TBD)
```js
express.static(root, [options])

app.use(express.static('public'))
```

<a id="markdown-using-path" name="using-path"></a>

#### Using path
```js
import path from 'path';

app.get('/my-html', (req, res) => {
    const path = path.join(__dirname, 'path', 'to', 'your', 'file.html');
    res.sendFile(path);
});
```

| Method              | Description                                               |
| ------------------- | --------------------------------------------------------- |
| `res.send()`        | Send a response of various data types (e.g., JSON, HTML). |
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

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble shooting

<a id="markdown-endpoint-not-working-as-expected" name="endpoint-not-working-as-expected"></a>

### Endpoint not working as expected

Make sure you have the correct `HTTP` method (`GET`, `POST`, `PUT`, `DELETE`, etc.)

<a id="markdown-referenceerror-dirname-is-not-defined" name="referenceerror-dirname-is-not-defined"></a>

### ReferenceError: __dirname is not defined

The `__dirname` variable is not available in ES6 modules like it is in CommonJS modules. Instead,
you can use the `import.meta.url` property to get the current module's URL and then extract the
directory path from it.

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

- <a href="https://expressjs.com/" target="_blank">ExpressJS</a>
- <a href="https://expressjs.com/en/guide/routing.html" target="blank">Routing</a>
