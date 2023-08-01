# Software Development Design Concepts

<!-- TOC -->

- [Use Case](#use-case)
    - [Use Case Description](#use-case-description)
    - [Use Case Diagrams](#use-case-diagrams)

<!-- /TOC -->

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

