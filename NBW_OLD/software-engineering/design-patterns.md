
The **Observer Pattern** is used to establish a one-to-many dependency between objects so that
when one object changes state, all its dependents are notified and updated automatically.

The **Command Pattern** encapsulates a request as an object, thereby allowing you to parameterize
clients with queues, requests, and operations.

The **Command Pattern** is a behavioral design pattern that helps you encapsulate a request or
action as an object. It allows you to turn a request into a standalone object, which you can then
pass around, store, and execute at a later time.

It separates the sender of a request from the receiver. It does this by defining a command object that encapsulates the request's details, like which action to perform and on which object. Then, you can store, queue, and execute these command objects as needed, making it easier to manage and control complex actions in your application.

So, the Command Pattern is like a remote control for actions in your software, allowing you to decouple the sender and receiver of commands, making your code more flexible and extensible.
