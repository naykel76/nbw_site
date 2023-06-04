<div>

    <h1>Trix Editor</h1>

    <x-gotime-errors />



    <div class="my">
        <button wire:click.prevent="setValues" class="btn success">Set Values</button>
        <button wire:click.prevent="runValidation" class="btn warning">Test Validation</button>
    </div>

    @foreach($editors as $editor)
        <div
            class="frm-row"
            x-data="{
                value: @entangle('trix1'),
                isFocused() { return document.activeElement !== this.$refs.trix },
                setValue() { this.$refs.trix.editor.loadHTML(this.value) },
            }"
            x-init=" setValue(); $watch('value', () => isFocused() && setValue())"
            x-on:trix-change="value = $event.target.value"
            wire:ignore>
            <input id="x" type="hidden">
            <trix-editor x-ref="trix" input="x"></trix-editor>
        </div>
    @endforeach

    <div
        class="frm-row"
        x-data="{
            value: @entangle('trix1'),
            isFocused() { return document.activeElement !== this.$refs.trix },
            setValue() { this.$refs.trix.editor.loadHTML(this.value) },
        }"
        x-init=" setValue(); $watch('value', () => isFocused() && setValue())"
        x-on:trix-change="value = $event.target.value"
        wire:ignore>
        <input id="x" type="hidden">
        <trix-editor x-ref="trix" input="x"></trix-editor>
    </div>
    <div
        class="frm-row"
        x-data="{
            value: @entangle('trix2'),
            isFocused() { return document.activeElement !== this.$refs.trix },
            setValue() { this.$refs.trix.editor.loadHTML(this.value) },
        }"
        x-init=" setValue(); $watch('value', () => isFocused() && setValue())"
        x-on:trix-change="value = $event.target.value"
        wire:ignore>
        <input id="x" type="hidden">
        <trix-editor x-ref="trix" input="x"></trix-editor>
    </div>



    {{-- <div
        class="rounded-md shadow-sm"
        x-data="{
            value: @entangle('trix1'),
            isFocused() { return document.activeElement !== this.$refs.trix },
            setValue() { this.$refs.trix.editor.loadHTML(this.value) },
        }"
        x-init="setValue(); $watch('value', () => isFocused() && setValue())"
        x-on:trix-change="value = $event.target.value"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    wire:ignore>
    <input id="x" type="hidden">
    <trix-editor x-ref="trix" input="x"></trix-editor>
</div> --}}


@once
@push('head')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
@endpush
@push('scripts')
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
@endpush
@endonce

</div>
