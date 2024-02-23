<form wire:submit="save">
    <div class="flex gap">
        <x-gt-input wire:model="form.title" for="form.title" rowClass="fg1" autocomplete="off"/>
        <x-gt-button wire:click="save" class="pink" text="Save" />
    </div>
</form>
