{{-- THIS COMPONENT HAS MANY EXAMPLES --}}
<div class="mx-auto maxw-lg">


    <livewire:dev-and-testing.data-table-multi-save></livewire:dev-and-testing.data-table-multi-save>

    <section class="bx bdr-blue">

        <h2>Single field edit mode</h2>

        <p>This method allows for quick and easy editing of a single field, without the need to edit the entire row or table. However, it does pose a risk of accidental changes without an option to undo.</p>

        <div class="bx danger">There is currently a bug where changes are save even if nothing is changed and you need to be in the active input to cancel out, this need to be updated to manage 'dirty' state.</div>
        <div class="bx info">This need a bit more work!</div>

        <h5>Here are the steps to enter "edit mode" and update a field:</h5>
        <ul class="mt-05">
            <li>Double-click on the field you want to update.</li>
            <li>The field will be converted to an input, allowing you to make changes.</li>
            <li>After making the changes, click away from the field to save the changes to the database, and the view will return to the default table mode.</li>
        </ul>

        <h5>To cancel changes:</h5>
        <ul class="mt-05">
            <li>Press the "Escape" key to cancel any changes and return to the default table mode.</li>
        </ul>

        <hr>
        <div class="grid cols-2">
            <div>
                <h5>Pros:</h5>
                <ul>
                    <li>Changes can be made easily by double-clicking, updating, and then clicking away.</li>
                    <li>Saves automatically, preventing the risk of forgetting to save changes.</li>
                </ul>
            </div>
            <div>
                <h5>Cons:</h5>
                <ul>
                    <li>Increased risk of making accidental changes due to the ease of editing without an option to undo.</li>
                    <li>Can be slower when multiple changes are necessary.</li>
                </ul>
            </div>
        </div>

        <hr>

        {{ $editing }}
        <table class="w-full">

            <thead>
                @foreach($columns as $column)
                    <x-gt-table.th sortable wire:click="sortField('{{ $column }}')"
                        :direction="$sortField === '{{ $column }}' ? $sortDirection : null">
                        {{ Str::title($column) }}
                    </x-gt-table.th>
                @endforeach
                <th></th>
            </thead>

            <tbody wire:loading.class="txt-muted">

                @forelse($items as $index => $item)

                    <tr>

                        <td>{{ $item->id }}</td>

                        <td>
                            @if($item->id == $editing->id && $editingField == 'title')

                                <x-gt-input wire:model.defer="editing.title" wire:dirty.class="danger-light" x-on:click.away="$wire.save()" wire:keydown.escape="resetEditing" />

                            @else
                                <div wire:dblclick="setEditingField({{ $item->id }}, 'title')">{{ $item->title }}</div>
                            @endif
                        </td>

                        <td>
                            @if($item->id == $editing->id && $editingField == 'code')
                                <x-gt-input wire:model.defer="editing.code" for="editing.code" class="w-5" />
                            @else
                                <div wire:dblclick="setEditingField({{ $item->id }}, 'code')">{{ $item->code }}</div>
                            @endif
                        </td>

                        <td class="tar w-10">
                            @if($item->id == $editing->id)
                                <x-gt-button wire:click.prevent="resetEditing" text="Cancel" />
                            @endif
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td class="tac pxy txt-lg" colspan="6">No items found...</td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $items->links('gotime::pagination.livewire') }}

    </section>

    <section class="bx bdr-blue">

        <h2>Single row edit mode</h2>

        <h5>To enable editing:</h5>
        <ul class="mt-05">
            <li>Click on the 'edit' button.</li>
            <li>The updatable fields will be converted to input fields and Save and Cancel buttons will appear.</li>
        </ul>

        <h5>To save changes:</h5>
        <ul class="mt-05">
            <li>After making changes, click on the 'Save' button.</li>
            <li>The changes will be saved to the database, and the view will return to the default table mode.</li>
        </ul>

        <h5>To cancel changes:</h5>
        <ul class="mt-05">
            <li>Click on the 'Cancel' button.</li>
            <li>Any changes made will be ignored and the view will return to the default table mode.</li>
        </ul>
        <hr>
        <div class="grid cols-2">
            <div>
                <h5>Pros:</h5>
                <ul>
                    <li>Provides safety by requiring a manual click on the "Save" button, reducing the risk of accidental updates.</li>
                    <li>Enables easy switching to another item while ignoring changes, without the need to click on the "Cancel" button.</li>
                </ul>
            </div>
            <div>
                <h5>Cons:</h5>
                <ul>
                    <li>Requires several clicks to make changes, which could be cumbersome.</li>
                    <li>Changes could be lost if you accidentally click on "Edit" for another item without saving the changes.</li>
                </ul>
            </div>
        </div>

        <hr>

        <table class="w-full">

            <thead>
                @foreach($columns as $column)
                    <x-gt-table.th sortable wire:click="sortField('{{ $column }}')"
                        :direction="$sortField === '{{ $column }}' ? $sortDirection : null">
                        {{ Str::title($column) }}
                    </x-gt-table.th>
                @endforeach
                <th></th>
            </thead>

            <tbody wire:loading.class="txt-muted">

                @forelse($items as $index => $item)

                    <tr>
                        <td>{{ $item->id }}</td>

                        <td>
                            @if($item->id == $editing->id)
                                <x-gt-input wire:model.defer="editing.title" for="editing.title" />
                            @else
                                {{ $item->title }}
                            @endif
                        </td>

                        <td>
                            @if($item->id == $editing->id)
                                <x-gt-input wire:model.defer="editing.code" for="editing.code" class="w-5" />
                            @else
                                {{ $item->code }}
                            @endif
                        </td>

                        <td class="tar w-10">
                            @if($item->id == $editing->id)
                                <x-gt-button-save wire:click.prevent="save" />
                                <x-gt-button wire:click.prevent="resetEditing" text="Cancel" />
                            @else
                                <x-gt-button-edit wire:click.prevent="edit({{ $item->id }})" class="xs" />
                            @endif
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td class="tac pxy txt-lg" colspan="6">No items found...</td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        {{ $items->links('gotime::pagination.livewire') }}

    </section>

</div>
