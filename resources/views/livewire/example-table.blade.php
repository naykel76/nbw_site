<div>

    {{-- <x-gt-modal wire:model="showModal"> --}}

    {{-- :video="$selected" :key="$selected?->id ?? 'new'" @saved="$refresh" --}}
    <livewire:example-form />
    {{-- </x-gt-modal> --}}

    <x-gt-button wire:click="$dispatch('create-item')" text="Create From Parent" />


    <x-gt-table>
        <x-slot:thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('id')" class="w-4"
                    sortable :direction="$this->getSortDirection('id')"> id </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('name')"
                    sortable :direction="$this->getSortDirection('name')"> Name </x-gt-table.th>
                <th></th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @forelse($items as $item)
                <tr wire:key="{{ $item->id }}">
                    <td>{{ str_pad($item->id, 5, 0, STR_PAD_LEFT) }}</td>
                    <td>{{ $item->name }}</td>

                    <td>
                        <div class="flex ha-r space-x-05">
                            {{-- fix to remove id when using local method --}}
                            <x-gt-resource-action action="edit" wire:click="edit({{ $item->id }})" :id="$item->id" />
                            {{-- <x-gt-resource-action action="delete" :id="$item->id" /> --}}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy" colspan="10">No records found...</td>
                </tr>
            @endforelse
        </x-slot:tbody>
    </x-gt-table>
</div>
