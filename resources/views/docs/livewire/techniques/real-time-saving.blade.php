<h1>Form Techniques</h1>

<x-toc />

<div class="bx warning-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2">
        <use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use>
    </svg>
    <div>There are multiple examples on this page. Refer to the snippets for full coded examples. </div>
</div>

<x-docs.sections.layout title="Real time saving with validation and 'dirty' message">

    <livewire:real-time-saving display="message-on-dirty" />

    <p>This works to switch from the displayed text to the input, however, it will not give the input focus. In order to
        achieve this we can use alpine to automatically focus the input.</p>
</x-docs.sections.layout>

<hr>

<x-docs.sections.layout title="Real time saving with form object">
    <livewire:real-time-saving-with-form-object />
</x-docs.sections.layout>


{{-- <x-docs.sections.layout title="Usage snippets">
    <x-gt-parsedown path="{{ 'docs/livewire/snippets/real-time-saving' }}" />
</x-docs.sections.layout> --}}
