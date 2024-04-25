# Function Properties and methods

- [Function Properties (`name`, `length`, `prototype`)](#function-properties-name-length-prototype)
- [Function, prototype, and instance relationships](#function-prototype-and-instance-relationships)
- [Prototype chain diagram](#prototype-chain-diagram)
- [Function Methods](#function-methods)
  - [`Function.apply()`](#functionapply)
  - [`Function.call()`](#functioncall)
  - [What is the difference between `call()` and `apply()`?](#what-is-the-difference-between-call-and-apply)
  - [`Function.bind()`](#functionbind)
- [Additional Resources](#additional-resources)



## Function Properties (`name`, `length`, `prototype`)

Function properties are properties that are available to all functions in JavaScript.
They are used to access information about the function, such as the name of the
function, the number of arguments it takes, and the prototype of the function.

- The `name` property returns the name of the function.
- The `length` property returns the number of arguments the function takes.
- The `prototype` property returns the prototype of the function.

```js
function myFunc(a, b) {
    return a + b;
}

console.log(myFunc.name); // myFunc
console.log(myFunc.length); // 2
console.log(myFunc.prototype);
```

```js
// High-level overview of the prototype chain
{
    myFunc: { // the constructor function
        prototype: { // the prototype object
            constructor: myFunc,
            // other properties and methods inherited by instances...
        }
    },
    obj: { // an instance of myFunc
        __proto__: { // the prototype object
            constructor: myFunc,
            // other properties and methods inherited from myFunc.prototype...
        }
    }
}
```

Yea I know right, wrap your head around that one!

**FYI, I need to preface the following diagram with "I think"**

## Function, prototype, and instance relationships

```mermaid +parse
<x-mermaid>
graph LR
    myFunc[myFunc Function] -->|has| FunctionProperties[Function Properties]
    myFunc -->|has| FunctionMethods[Function Methods]
    myFunc -->|has| FunctionPrototype[myFunc.prototype]
    FunctionPrototype -->|has| Constructor[constructor: myFunc]
    FunctionPrototype -->|has| OtherProperties[Other properties and methods]
    obj[obj Instance] -->|has| InstanceProto[obj.__proto__]
    InstanceProto -->|points to| FunctionPrototype
</x-mermaid>
```

## Prototype chain diagram

```mermaid +parse
<x-mermaid>
    graph LR
        Constructor -->|has| Prototype[Prototype]
        Prototype -->|has| BasePrototype[Base Prototype]
        Constructor -->|creates| Instance
        Instance -->|links| Prototype
        BasePrototype -->|__proto__ points to| Null[null]
</x-mermaid>
```

## Function Methods

Function methods are methods that are available to all functions in JavaScript. They are
used to manipulate the function, such as calling the function, binding the function to a
specific context, and applying the function to an array of arguments.

### `Function.apply()`

The `apply()` method calls a function with a given `this` value and arguments provided
as an array.

Below are examples of calling `greet()` with `apply()`, and the equivalent using a class.

<div class="compare"></div>

```js
function greet(greeting) {
    return `${greeting} ${this.name}`;
}

const user = { name: 'John' };
console.log(greet.apply(user, ['Hello,']));
// Outputs: Hello John
```
```js
class UserClass {
    constructor(name) {
        this.name = name;
    }
    greet(greeting) {
        return `${greeting}, ${this.name}`;
    }
}

const user = new UserClass('John');
console.log(user.greet('Hello,')); 
// Outputs: Hello, John
```
<div class="clear"></div>


### `Function.call()`

The `call()` method calls a function with a given `this` value and arguments provided individually.


<div class="compare"></div>

```js
function greet(greeting) {
    return `${greeting} ${this.name}`;
}

const user = { name: 'John' };
console.log(greet.call(user, 'Hello,'));
// Outputs: Hello, John
```

```js
class UserClass {
    constructor(name) {
        this.name = name;
    }
    greet(greeting) {
        return `${greeting}, ${this.name}`;
    }
}

const user = new UserClass('John');
console.log(user.greet('Hello,')); 
// Outputs: Hello, John
```
<div class="clear"></div>

### What is the difference between `call()` and `apply()`?

The `call()` and `apply()` methods in JavaScript are both used to call a function with a
specific this value and arguments. The difference between them lies in how they handle
function arguments:

- `call()` takes arguments individually: `func.call(thisArg, arg1, arg2, ...)`
- `apply()` takes arguments as an array: `func.apply(thisArg, [arg1, arg2, ...])`

### `Function.bind()`

The `bind()` method in JavaScript creates a new function that, when called, has its
`this` keyword set to the provided value. The `bind()` method also allows you to
partially apply arguments to the function, meaning you can fill in some arguments and
leave the rest to be filled in later when the bound function is called.

```js
function introduce(greeting, punctuation) {
    return `${greeting}, my name is ${this.name} and I am ${this.age} ${punctuation}`;
}

const user = { name: 'John', age: 30 };

const introduceUser = introduce.bind(user, 'Hello');
console.log(introduceUser('!')); 
// Outputs: Hello, my name is John and I am 30!
```

This is the equivalent using a class:

```js
class User {
    constructor(name, age) {
        this.name = name;
        this.age = age;
        this.introduce = (greeting, punctuation) => {
            return `${greeting}, my name is ${this.name} and I am ${this.age} ${punctuation}`;
        };
    }
}

const user = new User('John', 30);
console.log(user.introduce('Hello', '!')); 
// Outputs: Hello, my name is John and I am 30!
```

## Additional Resources

- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function" target="blank">Function</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function/apply" target="blank">Function.prototype.apply</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function/call" target="blank">Function.prototype.call</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function/bind" target="blank">Function.prototype.bind</a>
- <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Function/prototype" target="blank">Function.prototype</a>

