```mermaid
graph TD
    UserInterfaceComponent
    BusinessLogicComponent
    DataAccessComponent

    UserInterfaceComponent --> BusinessLogicComponent
    BusinessLogicComponent --> DataAccessComponent


```

```mermaid
graph TD
    subgraph "Web Server"
        A[User Interaction]
        B[Authentication]
    end

    subgraph "Application Server"
        C[Account Data]
        D[Transaction Processing]
    end

    subgraph "Database Server"
        E[Account Data]
    end

    A --> B
    B --> C
    A --> D
    D --> E

```

```mermaid
graph TD
    subgraph "Client Devices"
        A[Web Browser]
        B[Mobile App]
    end

    subgraph "Web Server"
        C[Authentication Server]
        D[Application Server]
    end

    subgraph "Database Server"
        E[Account Database]
    end

    A --> C
    B --> C
    C --> D
    D --> E

```



```mermaid
graph TD
    subgraph "Test Harness"
        TH[Test Harness]
    end

    subgraph "Modules under Test"
        M1[Module 1]
        M2[Module 2]
        M3[Module 3]
    end

    M1 --> TH
    M2 --> TH
    M3 --> TH

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid

```

```mermaid
classDiagram
  class User
  class Account
  class Transaction
  class InternetBankingSystem
  
  User "1" --> "*" Account
  User "1" --> "*" Transaction
  Account "1" --> "*" Transaction
  InternetBankingSystem "1" --> "*" User
  InternetBankingSystem "1" --> "*" Account
  InternetBankingSystem "1" --> "*" Transaction


```

A pattern to me implies some sort of workflow or diagram (much like the observer patter), I now understand that these really are just concepts and as stated above there is no tangible way to implement them. 