


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
