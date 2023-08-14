# ExpressJS

<!-- TOC -->

- [Server Setup](#server-setup)
- [Cors support (WIP)](#cors-support-wip)
- [Routes](#routes)
    - [Route Parameters](#route-parameters)

<!-- /TOC -->

Express Docs

- <a href="https://expressjs.com/" target="_blank">ExpressJS</a>
- <a href="https://expressjs.com/en/guide/routing.html" target="blank">Routing</a>

<a id="markdown-server-setup" name="server-setup"></a>

## Server Setup

```bash
npm install express dotenv
npm install nodemon --save-dev
```

`server.js`

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

<a id="markdown-cors-support-wip" name="cors-support-wip"></a>

## Cors support (WIP)

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
