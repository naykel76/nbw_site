<div>
    <x-gt-modal wire:model="showModal">
        <x-gt-button.primary wire:click="fillForm" text="Create New and Fill" />
        <form wire:submit="save">
            <x-gt-input wire:model="form.title" label="title" />
            <div class="grid md:cols-2">
                <x-gt-input wire:model="form.start_date" label="Start Date" />
                <x-gt-input wire:model="form.end_date" label="End Date" />
            </div>
            <div class="tar">
                <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
                <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
            </div>
        </form>
    </x-gt-modal>

    <pre>{{ json_encode($form, JSON_PRETTY_PRINT) }}</pre>
</div>
