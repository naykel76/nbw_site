
# What is an interface?

In object-oriented programming an interface is a contract or a set of methods that a class must
implement. It serves as a blueprint for classes, specifying the methods that must be present and
outlining their signatures (method names, parameters, and return types) without providing the
implementation details.

Interfaces provide a way to define common behavior, promote loose coupling, and facilitate code
reuse and modular design in object-oriented programming. They are particularly useful when you
want to enforce a contract and ensure that classes adhere to a specific API or behavior.

Interfaces allow you to define a common API or behavior that multiple classes can adhere to. They
enable you to establish a contract or agreement between classes, ensuring that they implement
specific methods and follow a certain structure. This helps achieve code consistency, modularity,
and facilitates polymorphism.

<a id="markdown-key-points-about-interfaces" name="key-points-about-interfaces"></a>

## Key points about interfaces:

**Declaration:** An interface is declared using the interface keyword.

**Method Signatures**: Interfaces define method signatures (names, parameters, return types) without
specifying their implementation. The methods within an interface are typically public and
abstract.

**Implementation**: Classes that implement an interface must provide concrete implementations for all
the methods declared in the interface.

**Multiple Interfaces**: A class can implement multiple interfaces, allowing it to adhere to multiple
contracts simultaneously.

**Inheritance**: Interfaces can extend other interfaces, forming an interface inheritance hierarchy.

**Interface Usage**: Interfaces are used as a type or a contract. You can use an interface as a type
hint in method parameters, return types, or variable declarations. This allows for greater
flexibility and polymorphism, as you can work with objects that implement the interface without
worrying about their specific class implementations.
