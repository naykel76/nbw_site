# Class Diagrams

<!-- TOC -->

- [Realization/Implements (uses-a relationship)](#realizationimplements-uses-a-relationship)
- [Generalization/Extends/Inherits (is-a relationship)](#generalizationextendsinherits-is-a-relationship)
    - [Inheritance](#inheritance)
- [Association (uses-a relationship)](#association-uses-a-relationship)
- [Dependency (uses-a relationship)](#dependency-uses-a-relationship)
- [What is the difference between a dependency and an association?](#what-is-the-difference-between-a-dependency-and-an-association)
- [What is the difference between implements and inheritance?](#what-is-the-difference-between-implements-and-inheritance)
- [What is an interface?](#what-is-an-interface)
- [What is an abstract class?](#what-is-an-abstract-class)
- [What is the difference between an abstract class and an interface?](#what-is-the-difference-between-an-abstract-class-and-an-interface)
- [Composition (has-a relationship)](#composition-has-a-relationship)
- [Aggregation (may-have-a relationship)](#aggregation-may-have-a-relationship)
- [What is the difference between composition and aggregation?](#what-is-the-difference-between-composition-and-aggregation)

<!-- /TOC -->

<a id="markdown-realizationimplements-uses-a-relationship" name="realizationimplements-uses-a-relationship"></a>

## Realization/Implements (uses-a relationship)

Realization is a relationship between the blueprint class and the object containing its respective
implementation level details. This object is said to realize the blueprint class.

In class diagrams, "realization" is used when a class provides a concrete implementation of
methods declared in an interface or abstract class. It indicates that the implementing class
realizes the interface or abstract class by providing actual code for its methods.

Realization is represented by a dashed line with a closed, hollow arrowhead pointing from the
implementing class to the interface or abstract class.

![class-diagram-realization-implements](/images/docs/class-diagram-realization-implements.jpg)

<a id="markdown-generalizationextendsinherits-is-a-relationship" name="generalizationextendsinherits-is-a-relationship"></a>

## Generalization/Extends/Inherits (is-a relationship)

In class diagrams, "generalization" is a relationship that represents an inheritance or
specialization relationship between classes or classifiers. It is used to model the concept of one
class being a more specialized version of another class, creating a hierarchy of classes.

Inheritance is represented by a solid line with a closed, hollow arrowhead pointing from the
ParentClass to the ChildClass.

![class-diagram-generalization-extends-inherits](/images/docs/class-diagram-generalization-extends-inherits.jpg)

<a id="markdown-inheritance" name="inheritance"></a>

### Inheritance

<question>What is inheritance?</question>


Inheritance is a mechanism that allows a class to inherit the properties and methods of another
class. The class that inherits the properties and methods is called the subclass, and the class
whose properties and methods are inherited is called the superclass. Inheritance allows us to
reuse the code defined in other classes without having to write the code again.

For example, a doctor is-a person, a farmer is-a person, and a student is-a person.


<a id="markdown-association-uses-a-relationship" name="association-uses-a-relationship"></a>

## Association (uses-a relationship)

In a class diagram, "association" represents a structural relationship between two or more classes
or objects where all objects have their own lifecycle and there is no owner. This type of
association signifies that there is a connection or interaction between the classes, but it
doesn't imply ownership or a specific direction of access. Each class involved in the association
is considered independent, and their instances can exist and interact without strict ownership or
containment.

Association is represented by a solid line with no arrowhead. (unless it is a directed association
where a direction arrow is added to the line).

![class-diagram-association](/images/docs/class-diagram-association.jpg)

<question>When do you use arrow on association?</question>

The correct notation depends on the nature of the relationship you want to represent between the
"Library" and "Book" classes:

**Library --> Book**: <br>
This notation indicates a unidirectional association where the "Library" class has a reference to
or contains "Book" objects, but the reverse (books having a direct reference to the library) may
not be true.

This is commonly used to represent situations where a class contains or uses instances of another
class.

**Library -- Book**: <br>
This notation represents a bidirectional or mutual association, indicating that both the "Library"
and "Book" classes can access each other. This is used to show that there is a two-way
relationship between the classes, where books are associated with a library, and the library
contains books.

**Library <-- Book**:  <br>
This notation suggests a reverse unidirectional association where "Book" objects have a reference
to or contain information about the "Library" they belong to, but the library itself does not have
a direct reference to individual books. This could be used in cases where books store information
about the library they are part of.

<a id="markdown-dependency-uses-a-relationship" name="dependency-uses-a-relationship"></a>

## Dependency (uses-a relationship)

In a class diagram, a "dependency" represents a relationship between two elements, typically
classes, where one element, known as the "client," relies on or uses another element, known as the
"supplier," in some way. Dependencies are used to show how elements in a system or model are
interconnected or how one element depends on another to perform its function.

Dependency is represented by a dashed line with an open arrowhead pointing from the client to the
supplier.

![class-diagram-dependency](/images/docs/class-diagram-dependency.jpg)

<a id="markdown-what-is-the-difference-between-a-dependency-and-an-association" name="what-is-the-difference-between-a-dependency-and-an-association"></a>

## What is the difference between a dependency and an association?

A dependency is a relationship between two or more objects where an object is dependent on another
object(s) for its specification or implementation. An association represents a relationship
between two or more objects where all objects have their own lifecycle and there is no owner.

<a id="markdown-what-is-the-difference-between-implements-and-inheritance" name="what-is-the-difference-between-implements-and-inheritance"></a>

## What is the difference between implements and inheritance?

Inheritance is a mechanism that allows a class to inherit the properties and methods of another
class. The class that inherits the properties and methods is called the subclass, and the class
whose properties and methods are inherited is called the superclass. Inheritance allows us to
reuse the code defined in other classes without having to write the code again.

- A class can implement multiple interfaces, but a class can only inherit from one superclass.
- An interface cannot have instance variables, while a class can.
- An interface cannot have constructors, while a class can.
- An interface cannot have private methods, while a class can.
- An interface cannot have public methods, while a class can.


<a id="markdown-what-is-an-interface" name="what-is-an-interface"></a>

## What is an interface?

An interface is a contract that specifies the methods that a class must implement. An interface
can also contain constants, default methods, static methods, and nested types. An interface
cannot be instantiated directly. Its methods are implemented by a class that implements the
interface.

<a id="markdown-what-is-an-abstract-class" name="what-is-an-abstract-class"></a>

## What is an abstract class?

An abstract class in object-oriented programming is a class that cannot be instantiated directly
but serves as a blueprint for other classes. Abstract classes are used to define a common
interface or set of methods that must be implemented by any concrete (non-abstract) subclass.

<a id="markdown-what-is-the-difference-between-an-abstract-class-and-an-interface" name="what-is-the-difference-between-an-abstract-class-and-an-interface"></a>

## What is the difference between an abstract class and an interface?

Abstract classes and interfaces are both allow you to define common structures and behaviors for
classes. However, they have some fundamental differences in terms of their purpose and usage:

- An abstract class can have instance variables, while an interface cannot.
- An abstract class can have non-abstract methods, while an interface cannot.
- An abstract class can have a constructor, while an interface cannot.
- An abstract class can have private methods, while an interface cannot.
- An abstract class can have public methods, while an interface cannot.

<a id="markdown-composition-has-a-relationship" name="composition-has-a-relationship"></a>

## Composition (has-a relationship)

The key characteristic of composition is that the part cannot exist independently without the
whole, and there is a strong ownership relationship. For example, a house has rooms, and a room is
a part of a house. A room cannot exist without a house, and if the house is destroyed, the rooms
are also destroyed.

Composition is represented by a solid line with a closed, filled diamond pointing from the whole
to the part.

![class-diagram-composition](/images/docs/class-diagram-composition.jpg)


<a id="markdown-aggregation-may-have-a-relationship" name="aggregation-may-have-a-relationship"></a>

## Aggregation (may-have-a relationship)

Aggregation represents a "whole-part" relationship between objects or classes. It's a form of
association that denotes that one class (the whole) contains or is composed of other classes or
objects (the parts), but the parts can exist independently of the whole.


Aggregation is a weaker form of association compared to composition, where the part cannot exist
without the whole.

Aggregation is a weaker form of association where one class is associated with another class, but
there is no strong ownership. In the case of aggregation, the part can exist independently of the
whole. For example, a university is associated with students. If the university ceases to exist,
the students can still exist and attend other universities. This represents a weaker, more
flexible relationship compared to composition.

![class-diagram-aggregation](/images/docs/class-diagram-aggregation.jpg)

<a id="markdown-what-is-the-difference-between-composition-and-aggregation" name="what-is-the-difference-between-composition-and-aggregation"></a>

## What is the difference between composition and aggregation?

THe difference between composition and aggregation is that composition implies ownership, while
aggregation does not. In composition, the part cannot exist without the whole, while in
aggregation, the part can exist without the whole.

