<form wire:submit="save" class="bx">
    <x-gt-input wire:model="form.name" label="name" />
    <x-gt-input wire:model="form.email" label="email" />

    <x-gt-datepicker wire:model.blur="form.email_verified_at" label="Email Verified" withIcon />

    <div class="tar">
        <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
        <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
    </div>
    <pre class="bx light">{{ json_encode($form, JSON_PRETTY_PRINT) }}</pre>
</form>
