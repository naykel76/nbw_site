# Software Development Design Concepts

<!-- TOC -->

- [Requirements](#requirements)
    - [Functional Requirements](#functional-requirements)
    - [Non-functional Requirements](#non-functional-requirements)
- [Use Case](#use-case)
    - [Use Case Description](#use-case-description)
    - [Use Case Diagrams](#use-case-diagrams)
- [Class Diagrams](#class-diagrams)

<!-- /TOC -->

Software Engineering Principles

**Modularity:** Breaking down a software system into smaller, manageable modules to promote
reusability, maintainability, and easier collaboration.

**Abstraction:** Hiding complex implementation details while exposing only necessary features,
making the system easier to understand and use.

**Encapsulation:** Bundling data and methods that operate on that data within a single unit (class
or object), preventing direct access to internal details and promoting data integrity.

**Separation of Concerns:** Dividing a software system into distinct components, each addressing a
specific aspect or functionality, to enhance maintainability and comprehensibility.

**SOLID Principles:** A set of five design principles that promote clean and maintainable code:

   - Single Responsibility Principle (SRP)
   - Open/Closed Principle (OCP)
   - Liskov Substitution Principle (LSP)
   - Interface Segregation Principle (ISP)
   - Dependency Inversion Principle (DIP)


<a id="markdown-requirements" name="requirements"></a>

## Requirements

<a id="markdown-functional-requirements" name="functional-requirements"></a>

### Functional Requirements
Functional requirements: These define what the system should do and specify the functionalities and features the software or system must have. They describe the system's behaviour and the actions it should perform when given certain inputs.

<a id="markdown-non-functional-requirements" name="non-functional-requirements"></a>

### Non-functional Requirements

Non-functional requirements: These specify how well the system should perform its functions rather than what those functions are. Non-functional requirements focus on qualities such as performance, usability, security, scalability, maintainability, and reliability.



<a id="markdown-use-case" name="use-case"></a>

## Use Case

<a id="markdown-use-case-description" name="use-case-description"></a>

### Use Case Description

**Actor** – anyone or anything that performs a behavior (who is using the system)

**Stakeholder** – someone or something with vested interests in the behavior of the system

**Actor** – stakeholder who initiates an interaction with the system to achieve a goal

**Triggering Event** is the event that causes the use case to be initiated.

**Preconditions:** represent the conditions that must be true or fulfilled before the use case runs.

**Postconditions:** represent the state of the system after the successful execution of the use case.

**Exception Conditions** -

<a id="markdown-use-case-diagrams" name="use-case-diagrams"></a>

### Use Case Diagrams

**Extends** indicates an optional or alternative behavior that extends a base use case.

The **Extends** relationship shows that one use case can extend another use case under certain
conditions. It allows for optional or alternative behavior in the extended use case based on the
occurrence of a specific condition in the extending use case. The extended use case will be
executed independently of the extending use case.

---

**Includes** indicates a common set of steps included in multiple use cases to avoid duplication and
improve modularity.

The **Includes** relationship shows that one use case includes the behavior of another use case.
It represents a common set of steps that occur in multiple use cases. By using "includes," you can
avoid duplicating the same steps in different use cases, making the diagram more modular and
easier to understand.



<a id="markdown-class-diagrams" name="class-diagrams"></a>

## Class Diagrams

<a href="https://www.youtube.com/watch?v=UI6lqHOVHic" target="blank">UML Class Diagram Tutorial</a>
