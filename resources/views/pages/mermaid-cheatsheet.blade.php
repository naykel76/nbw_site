<h1>MermaidJs Cheatsheet</h1>

{{-- *** DO NOT USE AUTO FORMAT ON THIS PAGE *** --}}

<x-toc />

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

@push('scripts')
    <script type="module">
        import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
        mermaid.initialize({ startOnLoad: true });
      </script>
@endpush
