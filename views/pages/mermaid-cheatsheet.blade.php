<h1>MermaidJs Cheatsheet</h1>

{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}
{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}
{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}

<x-toc />

<x-docs.sections.layout title="Quick Reference">
    <h3 id="Notes">Notes</h3>
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            Note right of John: Text in note
            Note over Alice,John: A typical interaction
            Note over Alice,John: A typical interaction<br/>But now in two lines
        @endverbatim
    </x-gt-markdown>

    <pre class="mermaid light inline-block w-400px">
        sequenceDiagram
            Note right of John: Text in note
            Note over Alice,John: A typical interaction
            Note over Alice,John: A typical interaction<br/>But now in two lines
    </pre>
</x-docs.sections.layout>

<x-docs.sections.layout title="Class Diagram">
    <h3 id="Notes">Notes</h3>
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            classDiagram
                class Duck{
                    +String beakColor
                    +swim()
                    +quack()
                }
        @endverbatim
    </x-gt-markdown>

    <pre class="mermaid light inline-block w-400px">
        classDiagram
            class Duck{
                +String beakColor
                +swim()
                +quack()
            }
    </pre>
</x-docs.sections.layout>


<x-docs.sections.layout title="Entity Relationship Diagram">
    <x-gt-markdown class="-ml-6">
        @verbatim
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
        @endverbatim
    </x-gt-markdown>

    <pre class="mermaid light inline-block w-full">
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
    </pre>
</x-docs.sections.layout>

<x-docs.sections.layout title="Flow Chart">
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            flowchart TD
                A[Start] --> B{Is it?}
                B -->|Yes| C[OK]
                C --> D[Rethink]
                D --> B
                B ---->|No| E[End]
        @endverbatim
    </x-gt-markdown>

    <pre class="mermaid light inline-block w-400px">
        flowchart LR
            A[Start] --> B{Is it?}
            B -->|Yes| C[OK]
            C --> D[Rethink]
            D --> B
            B ---->|No| E[End]
    </pre>
</x-docs.sections.layout>

<x-docs.sections.layout title="Sequence Diagram">

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            sequenceDiagram
                participant User
                participant System
                User->>System: Sends Request

                alt is valid?
                System-->>User: Process Request
                else is not valid?
                System-->>User: Show Error Message
                end
        @endverbatim
    </x-gt-markdown>

    <pre class="mermaid light inline-block w-400px">
        sequenceDiagram
            participant User
            participant System
            User->>System: Sends Request
            alt is valid?
                System-->>User: Process Request
            else is not valid?
                System-->>User: Show Error Message
            end
    </pre>

</x-docs.sections.layout>

{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}
{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}
{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}

@push('scripts')
    <script type="module">
        import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
        mermaid.initialize({ startOnLoad: true });
      </script>
@endpush
