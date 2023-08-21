# ExpressJS

<!-- TOC -->

- [Server Setup](#server-setup)
    - [Install Dependencies](#install-dependencies)
    - [`server.js`](#serverjs)
- [Routing](#routing)
    - [Defining routes](#defining-routes)
    - [Route Parameters](#route-parameters)
    - [Response method quick reference](#response-method-quick-reference)
- [Additional Resources](#additional-resources)

<!-- /TOC -->



<a id="markdown-server-setup" name="server-setup"></a>

## Server Setup

<a id="markdown-install-dependencies" name="install-dependencies"></a>

### Install Dependencies

```bash
npm install express cors dotenv
```

Install the `nodemon` package which automatically detects code changes and restarts the server
whenever we make a code change.

```bash
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

```bash
node server.js
```

```bash
nodmon server.js
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

<a id="markdown-response-method-quick-reference" name="response-method-quick-reference"></a>

### Response method quick reference

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


    curl -X POST -H "Content-Type: application/json" -d '{"id": 3, "text": "Complete the project"}' http://localhost:3008/todos




Express vs Node

Using basic `http` module

```js
const http = require('http');
const PORT_HTTP = process.env.PORT || 5000;

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/html');
    res.end('<h2>Hello there!</h2>');
});

server.listen(PORT_HTTP, () => {
    console.log(`HTTP Server Running on Port ${PORT_HTTP}`);
    console.log('http://localhost:' + PORT_HTTP);
});
```

Using Express.js

```js
const express = require('express');
const app = express();
const PORT_EXPRESS = process.env.PORT || 5000;

app.get('/', (req, res) => {
    res.send('<h2>Hello there!</h2>');
});

app.listen(PORT_EXPRESS, () => {
    console.log(`Express Server Running on Port ${PORT_EXPRESS}`);
    console.log('http://localhost:' + PORT_EXPRESS);
});
```


<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

Express Docs

- <a href="https://expressjs.com/" target="_blank">ExpressJS</a>
- <a href="https://expressjs.com/en/guide/routing.html" target="blank">Routing</a>
