
# What is an interface?

<div class="all-list-spacing-05"></div>

In object-oriented programming, an interface is a contract or a set of methods that a class must
implement. It serves as a blueprint for classes by specifying the methods that must be present,
including their names, parameters, and return types, without providing implementation details.

**Interfaces offer several benefits:**

- **Common Behavior**: Interfaces define common behavior that multiple classes can adhere to,
   promoting consistency across different classes.
- **Loose Coupling**: By relying on interfaces, classes are less dependent on the specific
   implementations of other classes, which promotes loose coupling.
- **Code Reuse and Modularity**: Interfaces facilitate code reuse and modular design, allowing
   classes to share common behavior without duplicating code.
- **Polymorphism**: Interfaces enable polymorphism, allowing objects of different classes to be used
   interchangeably if they implement the same interface. 
- **Contract Enforcement**: Interfaces enforce a contract between classes, ensuring that they
   implement specific methods and adhere to a certain structure.

**Key Points:**

- **Declaration**: An interface is declared using the interface keyword. For example, in PHP: `interface MyInterface { ... }`.
- **Method Signatures**: Interfaces define method signatures (names, parameters, return types) but
  do not provide the method implementations. Methods in an interface are public and abstract.
- **Implementation**: Classes that implement an interface must provide concrete implementations for all
  methods declared in the interface. This is done using the implements keyword in many languages
  (e.g., class MyClass implements MyInterface).
- **Multiple Interfaces**: A class can implement multiple interfaces, allowing it to adhere to
  multiple contracts simultaneously.
- **Inheritance**: Interfaces can extend other interfaces, creating an interface inheritance hierarchy.
  This allows for the creation of more specialized interfaces based on existing ones.
- **Interface Usage**: Interfaces are used as type hints in method parameters, return types, or
  variable declarations. This enhances flexibility, as code can work with any object that implements
  the interface, regardless of its specific class.

## Additional Resources