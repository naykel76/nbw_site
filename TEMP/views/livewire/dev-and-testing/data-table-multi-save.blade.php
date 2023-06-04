<div class="bx bdr-blue">

    @push('styles')

        <style>
            td:nth-child(1) {
                width: 4rem;
            }

            tbody>*:nth-child(2n + 2) {
                background: rgb(245, 245, 245);
            }

        </style>
    @endpush

    <h2>Multiple update and save</h2>

    <h5>To enable editing:</h5>
    <ul class="mt-05">
        <li>Click on the 'edit' button.</li>
        <li>All updatable fields will be converted to inputs and Save and Cancel buttons will appear.</li>
    </ul>

    @if($editMode)
        <x-gt-button-save wire:click.prevent="save" text="Save All" withIcon />
        <x-gt-button wire:click.prevent="cancel" text="Cancel" class="dark" />
    @else
        <x-gt-button-edit wire:click.prevent="$set('editMode', true)" withIcon class="success outline" />
    @endif

    <table class="w-full abc">

        <thead>
            @foreach($columns as $column)
                <x-gt-table.th sortable wire:click="sortField('{{ $column }}')"
                    :direction="$sortField === '{{ $column }}' ? $sortDirection : null">
                    {{ Str::title($column) }}
                </x-gt-table.th>
            @endforeach
            <th width="50px"></th>
        </thead>

        <tbody wire:loading.class="txt-muted">

            @forelse($items as $i => $item)

                <tr>
                    <td>{{ $item['id'] }}</td>
                    @if($editMode)
                        <td>
                            <x-gt-input wire:dirty.class="warning-light" wire:model.defer="items.{{ $i }}.title" />
                        </td>
                        <td>
                            <x-gt-input wire:dirty.class="warning-light" wire:model.defer="items.{{ $i }}.code" class="w-5" />
                        </td>
                    @else
                        <td>{{ $item['title'] }}</td>
                        <td class="w-10">{{ $item['code'] }}</td>
                    @endif
                    <td class="tar">
                        <!-- delete button component -->
                        {{-- <x-gt-button-delete wire:click.prevent="setActionItemId({{ $editing->id }})" /> --}}
                        <!-- delete modal component -->
                        {{-- <x-gt-modal.delete wire:model="actionItemId" id="{{ $actionItemId }}"/> --}}
                        <x-gt-button wire:click.prevent="action" withIcon="trash-o" class="link txt-muted" iconClass="pxy-025" noOpinion />
                    </td>
                </tr>
            @empty

                <tr>
                    <td class="tac pxy txt-lg" colspan="6">No items found...</td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>
