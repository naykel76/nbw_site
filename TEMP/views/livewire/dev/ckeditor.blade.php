<div>

    <x-gotime-errors />


    <x-gt-ckeditor-full wire:model.lazy="for" for="for" label="Label" editor-id="{{ '_' . rand() }}" />
{{--
    <li>I need to load the script in the module for normal pages where there is a single editor with is initialized when the page loads</li>
    <li>I need to load the script in the main component page to make sure it is available when I am createing a new editor block</li>



    <section>
        <h2>Click to add ckeditor instance</h2>

        <p class="lead">Create a ckeditor instance when the button is clicked, and fetch a value from livewire value using entangle.</p>

        <div x-data class="my">
            <button x-on:click="createEditor('{{ $editorId }}')" class="btn">Create CKEditor Instance</button>
        </div>

        <div x-data="{ value: @entangle('ckeditor1').defer, editor: null }" x-cloak>
            <textarea name="ckeditor1" id="{{ $editorId }}" x-model="value" x-on:input.debounce.500ms hidden></textarea>
        </div>

        <script>
            function createEditor(editorId) {
                ClassicEditor
                    .create(document.querySelector(`#${editorId}`))
                    .then(editor => {
                        this.editor = editor;
                        // this.editor.setData(this.value);
                        this.editor.model.document.on('change:data', () => {
                            this.value = this.editor.getData();
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

        </script>

        <x-markdown class="-ml-7">
            @verbatim
                ```
                <div x-data>
                    <button x-on:click="createEditor('{{ $editorId }}')" class="btn">Create CKEditor</button>
                </div>

                <div x-data="{ value: @entangle('ckeditor1').defer, editor: null }" x-cloak>
                    <textarea name="ckeditor1" id="{{ $editorId }}" x-model="value" x-on:input.debounce.500ms hidden></textarea>
                </div>

                <script>
                    function createEditor(editorId) {
                        ClassicEditor
                            .create(document.querySelector(`#${editorId}`))
                            .then(editor => {
                                this.editor = editor;
                                // this.editor.setData(this.value);
                                this.editor.model.document.on('change:data', () => {
                                    this.value = this.editor.getData();
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }

                </script>
            @endverbatim
        </x-markdown>

    </section>


    @once
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @endonce

    @push('styles')
        <style>
            pre,
            code {
                white-space: pre;
            }

        </style>
    @endpush --}}

</div>
