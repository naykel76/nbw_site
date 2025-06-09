<div class="container">
    <div class="grid cols-2">
        <div class="bx maxw-sm">
            <x-gt-button wire:click="doStuff" text="Do Stuff" class="pink xs" />
            <x-gt-button wire:click="create" text="Create" class="dark xs " />
            <form wire:submit="save">
                <div class="bx-title">Inputs</div>
                <x-gt-input wire:model="form.name" label="name" />
                <x-gt-input.email wire:model="form.email" label="email" />
                <x-gt-input.password wire:model="form.password" label="password" />
                <hr class="bdr-purple">
                
                <div class="bx-title">Select, Radio and Checkbox</div>
                <x-gt-select wire:model="form.country" label="Country" :options="$countries" />
                <x-gt-checkbox for="agree" text="I agree to the terms and conditions" />
                <hr class="bdr-purple">

                <x-gt-choices wire:model="form.tags" label="Select Tags" :options="$tags"/>

                <div class="bx-title">Editors</div>
                <x-gt-ckeditor wire:model="form.bio" label="Bio" editorId="{{ '_' . Str::uuid() }}" />
                <x-gt-ckeditor wire:model.blur="form.bio" label="Description"
                    editorId="{{ '_' . Str::uuid() }}" editorType="inline" editorConfig="basic">
                    <x-slot name="tooltip">
                        Custom box displayed at the top of the page. This is an ideal place to provide a brief summary of the content the user can expect.
                    </x-slot>
                </x-gt-ckeditor>

                <hr class="bdr-purple">

                {{-- <div class="bx-title">File Uploads</div>
                <x-gt-filepond wire:model="form.tmpUpload" type="video" maxFileSize="150000" /> --}}
                <hr class="bdr-purple">
                <div class="tar">
                    <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
                    <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
                </div>

                <div class="tar">
                    <x-gt-button wire:click="cancel" class="btn sm" text="CANCEL" />
                    <x-gt-button wire:click="save" class="btn primary sm" text="SAVE" />
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
