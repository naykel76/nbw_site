# ExpressJS

<!-- TOC -->

- [Initial Server Setup](#initial-server-setup)
- [Cors support (WIP)](#cors-support-wip)
- [Routes](#routes)
    - [Route Parameters](#route-parameters)

<!-- /TOC -->

Express Docs

- <a href="https://expressjs.com/" target="_blank">ExpressJS</a>
- <a href="https://expressjs.com/en/guide/routing.html" target="blank">Routing</a>



<a id="markdown-initial-server-setup" name="initial-server-setup"></a>

## Initial Server Setup

```bash
npm install express
npm install nodemon--save-dev
```

```js
const express = require('express');
const app = express(); // Create an Express instance

// Middleware
// ================================================================
// You can add middleware here, such as body parsing for JSON data,
// authentication, error handling middleware, etc.

app.use(express.json()); // Middleware to parse JSON requests

// Routes
// ================================================================

// Define a route for the root URL
app.get('/', (req, res) => {
    res.send('Hey there!');
});

// Define a route for '/about' URL
app.get('/about', (req, res) => {
    res.send('This is the about page.');
});

// Run
// ================================================================
// Start the server and listen on a specific port

const port = 3008;

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});

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
