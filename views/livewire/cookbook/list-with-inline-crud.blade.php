<div class="space-y-0">
    @foreach ($courses as $course)
        @if (isset($form->editing) && $form->editing->id == $course->id)
            @include('livewire.cookbook.list-with-inline-crud-row')
        @else
            <div class="control-padding">
                <a wire:click="edit({{ $course->id }})">{{ $course->title }}</a>
            </div>
        @endif
    @endforeach

    @if ($isCreateMode)
        @include('livewire.cookbook.list-with-inline-crud-row')
    @else
        <x-gt-button.base wire:click="create"
            class="flex va-c pxy-05 mxy-0 opacity-05 hover:opacity-08">
            <x-gt-icon name="plus" class="icon inline-flex" />
            <span>Add Course</span>
        </x-gt-button.base>
    @endif
</div>
