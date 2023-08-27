# Socket.IO Quick Reference
<!-- TOC -->

- [Server Side](#server-side)
    - [Emitting events](#emitting-events)
- [Client Side](#client-side)
    - [Broadcasting (TBD)](#broadcasting-tbd)

<!-- /TOC -->

<a id="markdown-server-side" name="server-side"></a>

## Server Side

```bash
npm install socket.io
```

You need to explicitly enable Cross-Origin Resource Sharing


```js
import { Server } from 'socket.io';
import http from 'http';

const server = http.createServer(app);      // Create an HTTP server instance
const io = new Server(server, {             // Create a Socket.IO server instance
    cors: {
        origin: ['http://localhost:4200', 'https://example.com'],
        methods: ['GET', 'POST'],
    },
});
```

<a id="markdown-emitting-events" name="emitting-events"></a>

### Emitting events

```js
io.on('connection', (socket) => {
    socket.emit('fish', 'This is the fish event');
});
```

```js
io.on('connection', (socket) => {
    socket.on('chat message', (msg) => {
        console.log('message: ' + msg);
    });
});
```

io.on('connection', (socket) => {
    socket.emit('fish', 'This is the fish event');
    socket.emit('message', 'This is the message event');
    socket.on('message', (msg) => {
        console.log('message: ' + msg);
    });
});

<a id="markdown-client-side" name="client-side"></a>

## Client Side

```bash
npm install socket.io-client
```






<a id="markdown-broadcasting-tbd" name="broadcasting-tbd"></a>

### Broadcasting (TBD)
