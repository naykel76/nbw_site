<div>


    <form wire:submit.prevent="save">

        <x-gt-input wire:model.defer="name" for="name" label="Name" />
        <x-gt-input wire:model.defer="email" for="email" label="Email" />

        <x-gt-button wire:click.prevent="doSomething" text="Do Stuff" />
    </form>
</div>
