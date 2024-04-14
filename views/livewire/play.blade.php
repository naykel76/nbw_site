<div wire:sortable="updateSortOrder" class="space-y-0">
    @foreach ($courses as $course)
        @if (isset($form->editing) && $form->editing->id == $course->id)
            @include('livewire.cookbook.list-with-inline-crud-row')
        @else
            <div wire:sortable.item="{{ $course->id }}" wire:key="course-{{ $course->id }}" class="flex va-c">
                <div wire:sortable.handle class="cursor-move pxy-025 mr-05 opacity-05">
                    <x-gt-icon name="drag-vertical" class="wh-1" />
                </div>
                <div class="flex space-between control-padding fg1">
                    {{ $course->title }}
                    <a class="transparent-on-drag" wire:click="edit({{ $course->id }})">Edit</a>
                </div>
            </div>
        @endif
    @endforeach
</div>

