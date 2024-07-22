# MermaidJs Cheatsheet

- [Quick Reference](#quick-reference)
  - [Notes](#notes)
- [Class Diagram](#class-diagram)
- [Entity Relationship Diagram](#entity-relationship-diagram)
- [Flow Chart](#flow-chart)
- [Sequence Diagram](#sequence-diagram)

## Quick Reference

### Notes

```
Note right of John: Text in note
Note over Alice,John: A typical interaction
Note over Alice,John: A typical interaction<br/>But now in two lines
```

```mermaid +parse
<x-mermaid>
    sequenceDiagram
        Note right of John: Text in note
        Note over Alice,John: A typical interaction
        Note over Alice,John: A typical interaction<br/>But now in two lines
</x-mermaid>
```

## Class Diagram

```
classDiagram
    class Duck{
        +String beakColor
        +swim()
        +quack()
    }
```
    
```mermaid +parse
<x-mermaid>
    classDiagram
        class Duck{
            +String beakColor
            +swim()
            +quack()
        }
</x-mermaid>
```

## Entity Relationship Diagram
```
erDiagram
    CAR {
        string registrationNumber PK
        string make
        string model
        string[] parts
    }
    PERSON {
        string driversLicense PK "The license #"
        string(99) firstName "Only 99 characters are allowed"
        string lastName
        string phone UK
        int age
    }
    NAMED-DRIVER {
        string carRegistrationNumber PK, FK
        string driverLicence PK, FK
    }
```
    
```mermaid +parse
<x-mermaid>
    erDiagram
        CAR {
            string registrationNumber PK
            string make
            string model
            string[] parts
        }
        PERSON {
            string driversLicense PK "The license #"
            string(99) firstName "Only 99 characters are allowed"
            string lastName
            string phone UK
            int age
        }
        NAMED-DRIVER {
            string carRegistrationNumber PK, FK
            string driverLicence PK, FK
        }
</x-mermaid>
```

## Flow Chart

```
flowchart TD
    A[Start] --> B{Is it?}
    B -->|Yes| C[OK]
    C --> D[Rethink]
    D --> B
    B ---->|No| E[End]
```

```mermaid +parse
<x-mermaid>
    flowchart LR
        A[Start] --> B{Is it?}
        B -->|Yes| C[OK]
        C --> D[Rethink]
        D --> B
        B ---->|No| E[End]
</x-mermaid>
```  

## Sequence Diagram

```
sequenceDiagram
    actor User
    participant System
    User->>System: Sends Request

    alt is valid?
    System-->>User: Process Request
    else is not valid?
    System-->>User: Show Error Message
    end
```

```mermaid +parse
<x-mermaid>
    sequenceDiagram
        actor User
        participant System
        User->>System: Sends Request
        System-->>User: Process Request
        alt is valid?
            System-->>User: Process Request
        else is not valid?
            System-->>User: Show Error Message
        end
</x-mermaid>
```