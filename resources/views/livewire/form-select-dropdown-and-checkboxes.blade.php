<div class="container">
    <x-gt-errors />
    <div class="grid cols-2 va-t">
        <div class="bx maxw-sm">
            <form wire:submit="save">
                <div class="tar mb">
                    <x-gt-button wire:click="cancel" class="btn xs" text="CANCEL" />
                    <x-gt-button wire:click="save" class="btn primary xs" text="SAVE" />
                </div>
                <div class="bx">
                    <div class="bx-title">Slim Select</div>
                    <x-gotime::v2.input.controls.slim-select wire:model.live="form.tags" :options="$countries" multiple />
                    <x-gt-slim-select wire:model.live="form.tags" label="Control Group" :options="$countries" multiple />
                    
                </div>
                <div class="tar">
                    <x-gt-button wire:click="cancel" class="btn xs" text="CANCEL" />
                    <x-gt-button wire:click="save" class="btn primary xs" text="SAVE" />
                </div>
            </form>
        </div>
        <div class="bx">
            <pre>{{ json_encode($form, JSON_PRETTY_PRINT) }}</pre>
            @if ($form->tmpUpload)
                <div class="txt-red">A file has been uploaded</div>
            @endif
        </div>
    </div>
</div>
