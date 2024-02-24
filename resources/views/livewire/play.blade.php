{{-- <x-gt-button wire:click="$toggle('hasErrors')" text="text" /> --}}

{{-- how can a user cancel the update and revert back to the original value? --}}

<div x-data="{ selectedField: $wire.entangle('selected') }">
    <x-gt-input wire:model.blur="form.name"
        x-bind:disabled="$wire.hasErrors && selectedField !== 'form.name'" />
    <x-gt-input type="email" wire:model.blur="form.email"
        x-bind:disabled="$wire.hasErrors && selectedField !== 'form.email'" />
</div>

{{-- <div x-data>
    @if ($errors->any())
        <div x-data="{ selected: $wire.entangle('selected') }"
            x-init="$nextTick(() => $refs[selected].focus())"></div>
    @endif

    <x-gt-button wire:click="play" text="text" />

    <x-gt-input
        wire:click="setSelected('form.name')"
        wire:model.blur="form.name" wire:blur="play"
        wire:dirty.class="bg-rose-50"
        x-ref="form.name"
        for="form.name" class="bdr-blue"
        />

    <x-gt-input
        wire:click="setSelected('form.email')"
        wire:model.blur="form.email" wire:blur="play"
        wire:dirty.class="bg-rose-50"
        x-ref="form.email"
        for="form.email" class="bdr-blue"
        />
</div> --}}
