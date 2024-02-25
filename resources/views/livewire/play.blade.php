<div class="space-y-0">
    @foreach ($courses as $course)
        @if (isset($form->editing) && $form->editing->id == $course->id)
            <div class="flex gap-05 va-t">
                <x-gt-input wire:model="form.code" class="w-6" />
                <x-gt-input wire:model="form.title" rowClass="fg1" />
                <x-gt-button wire:click="save" text="save" class="pink" />
                <x-gt-button wire:click="cancel" text="cancel" />
            </div>
        @else
            <div class="control-padding">
                <a wire:click="edit({{ $course->id }})">{{ $course->title }}</a>
            </div>
        @endif
    @endforeach
</div>
{{-- <div class="divide-y">
    @foreach ($courses as $course)
        @if (isset($form->editing) && $form->editing->id == $course->id)
            <div class="flex gap-05 va-c my-0 ">
                <x-gt-input wire:model="form.code" rowClass="my-0 my-1" class="w-6" />
                <x-gt-input wire:model="form.title" rowClass="my-0 fg1 my-1" />
                <x-gt-button wire:click="save" text="save" class="pink" />
                <x-gt-button wire:click="cancel" text="cancel" />
            </div>
        @else
            <div class="frm-row my-0 control-padding">
                <a wire:click="edit({{ $course->id }})">{{ $course->title }}</a>
            </div>
        @endif
    @endforeach
</div> --}}


{{-- <div wire:sortable="updateSortOrder">
@foreach ($mediaItems as $media)
    <div wire:sortable.item="{{ $media->id }}" wire:key="media-{{ $media->id }}"
        class="flex va-c pxy-05 mxy-0 hover:bg-gray-50">
        <div wire:sortable.handle class="cursor-move pxy-025 mr-05 opacity-05">
            <x-gt-icon name="drag-vertical" class="wh-1" />
        </div>
        <div class="flex space-between va-c fg1">
            <div class="flex va-c fg1 gap-05">
                <x-media-icon-selector type="{{ $media->type }}" />
                {{ $media->title }}
            </div>
            <x-resource-action-button wire:click="setActionId({{ $media->id }})" action="delete" />
        </div>
    </div>
@endforeach
<x-gt-modal.delete wire:model="actionId" id="{{ $actionId }}" />
</div> --}}
