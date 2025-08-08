<div>
    <x-gt-table>
        <x-slot:thead>
            <tr>
                <x-gt-table.th wire:click="sortBy('id')" class="w-4"
                    sortable :direction="$this->getSortDirection('id')"> id </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('name')"
                    sortable :direction="$this->getSortDirection('name')"> Name </x-gt-table.th>
                <x-gt-table.th wire:click="sortBy('email')"
                    sortable :direction="$this->getSortDirection('email')"> email </x-gt-table.th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @forelse($items as $item)
                <tr wire:key="{{ $item->id }}">
                    <td>{{ str_pad($item->id, 5, 0, STR_PAD_LEFT) }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
            @empty
                <tr>
                    <td class="tac pxy" colspan="10">No records found...</td>
                </tr>
            @endforelse
        </x-slot:tbody>
    </x-gt-table>
</div>