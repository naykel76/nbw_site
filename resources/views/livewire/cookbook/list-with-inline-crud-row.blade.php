{{-- this is a form row snippet for the list-with-inline-crud component --}}
<div class="flex gap-05 va-t">
    <x-gt-input wire:model="form.code" class="w-6" />
    <x-gt-input wire:model="form.title" rowClass="fg1" />
    <x-gt-button wire:click="save" text="save" class="pink" />
    <x-gt-button wire:click="resetActions" text="cancel" />
</div>
