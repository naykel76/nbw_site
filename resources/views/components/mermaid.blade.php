<pre {{ $attributes->class('mermaid') }}>
    {{ $slot }}
</pre>

{{-- remove the padding because the ER and class diagrams are too small. Not sure if this is a good solution! --}}
@push('styles')
    <style>
        .mermaid>svg {
            padding: 0;
        }
    </style>
@endpush
@pushOnce('scripts')
    <script type="module">
        import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs';
        mermaid.initialise({
            startOnLoad: true
        });
    </script>
@endPushOnce