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
            @foreach ($courses as $course)
                <tr wire:key="{{ $course->id }}">
                    <td> {{ str($course->title)->limit(40) }} </td>
                    <td class="tar">
                        <x-gt-button wire:click="$dispatch('set-editing-item', {id: {{ $course->id }}})"
                            class="link txt-sky">
                            <x-gt-icon name="pencil-square" class="wh-1.25 opacity-06" />
                        </x-gt-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $courses->links('gotime::pagination.livewire') }}
</div>
