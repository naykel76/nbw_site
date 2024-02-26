<div wire:sortable="updateSortOrder" class="divide-y">
    @foreach ($courses as $course)
        <div wire:sortable.item="{{ $course->id }}" wire:key="course-{{ $course->id }}">
            <div class="flex va-c">
                <div wire:sortable.handle class="cursor-move pxy-025 mr-05 opacity-05">
                    <x-gt-icon name="drag-vertical" class="wh-1" />
                </div>
                <div>{{ $course->title }} </div>
            </div>
        </div>
    @endforeach
</div>
