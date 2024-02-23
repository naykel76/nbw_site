<div>
    <table class="bdr bg-white">
        <thead class="bdr-b">
            <tr>
                <x-gt-table.th wire:click="sortBy('Title')" sortable
                    :direction="$this->getSortDirection('Title')"> Course Title </x-gt-table.th>
                <x-gt-table.th> </x-gt-table.th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach ($users as $user)
                <tr wire:key="{{ $user->id }}">
                    {{-- <td> {{ str($user->title)->limit(40) }} </td> --}}
                    <td class="tar">
                        <x-gt-button wire:click="$dispatch('set-editing-item', {id: {{ $user->id }}})"
                            class="link txt-sky">
                            <x-gt-icon name="pencil-square" class="wh-1.25 opacity-06" />
                        </x-gt-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('gotime::pagination.livewire') }}
</div>




