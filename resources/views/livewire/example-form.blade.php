<div class="container">
    <x-gt-errors />
    <div class="grid cols-2">
        <div class="bx maxw-sm">
            <form wire:submit="save">
                <div class="mb">
                    <x-gt-button wire:click="doStuff" text="Do Stuff" class="secondary xs" />
                    <x-gt-button wire:click="cancel" class="btn xs" text="CANCEL" />
                    <x-gt-button wire:click="save" class="btn primary xs" text="SAVE" />
                </div>


                {{-- <div class="bx-title">Inputs</div>
                <x-gt-input wire:model="form.name" label="name" />
                <x-gt-input.email wire:model="form.email" label="email" />
                <x-gt-input.password wire:model="form.password" label="password" />
                <hr class="bdr-purple">

                <div class="bx-title">Select, Radio and Checkbox</div>
                <x-gt-select wire:model="form.country" label="Country" :options="$countries" />
                <x-gt-checkbox for="agree" text="I agree to the terms and conditions" />
                <hr class="bdr-purple">   

                <div class="bx-title">Editors</div>
                <x-gt-ckeditor wire:model="form.bio" label="Bio" editorId="{{ '_' . Str::uuid() }}" />
                <x-gt-ckeditor wire:model.blur="form.bio" label="Description"
                    editorId="{{ '_' . Str::uuid() }}" editorType="inline" editorConfig="basic">
                    <x-slot name="tooltip">
                        Custom box displayed at the top of the page. This is an ideal place to provide a brief summary of the content the user can expect.
                    </x-slot>
                </x-gt-ckeditor>
                <hr class="bdr-purple"> --}}

                <!-- Access Livewire Properties with Alpine -->
                <div class="bx">
                    <div class="bx-title">Access Livewire Properties with Alpine</div>
                    <div class="wire-example">
                        <input wire:model="form.name" type="text">
                        <small> Character count: <span x-text="$wire.form.name.length"></span> </small>
                    </div>
                    <pre>
                     <x-torchlight-code language="blade">
                    <input wire:model="form.name" type="text" >
                    <span x-text="$wire.form.name.length"></span>
                    </x-torchlight-code>
                   </pre>
                </div>
                <div class="bx">
                    <div class="bx-title">Mutating Livewire Properties with Alpine</div>
                    <div class="wire-example">
                        <input wire:model="form.name" type="text">
                        <x-gt-button x-on:click="$wire.form.name = ''" text="Clear" />
                    </div>
                    <pre>
                    <x-torchlight-code language="blade">
                    <input wire:model="form.name" type="text">
                    <button x-on:click="$wire.form.name = ''">Clear</button> 
                    </x-torchlight-code>
                   </pre>
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
