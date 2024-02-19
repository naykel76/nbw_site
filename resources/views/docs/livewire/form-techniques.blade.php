<h1>Form Techniques</h1>

<x-toc />

<x-docs.sections.layout title="Real time saving with validation and 'dirty' message">

    <livewire:real-time-saving display="message-on-dirty" />

    <p>This works to switch from the displayed text to the input, however, it will not give the input focus. In order to
        achieve this we can use alpine to automatically focus the input.</p>
</x-docs.sections.layout>


<x-docs.sections.layout title="Usage snippets">
    <x-gt-parsedown path="{{ 'docs/livewire/snippets/real-time-saving' }}" />
</x-docs.sections.layout>
