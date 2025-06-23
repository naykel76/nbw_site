<div>
    <form wire:submit="save">
        <x-gt-input wire:model="form.name" label="name" />
        <div class="tar">
            <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
            <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
        </div>
    </form>
</div>
