# Deleting Items

- [Usage](#usage)
    - [Add the Delete Button and Modal](#add-the-delete-button-and-modal)
- [Design Notes](#design-notes)
    - [Delete Item Sequence Diagram (modal)](#delete-item-sequence-diagram-modal)
- [Delete Using the Actions Toolbar Component (**REVIEW**)](#delete-using-the-actions-toolbar-component-review)

## Usage

To enable delete functionality, include the `WithFormActions` trait in your component.
This trait provides the `selectedId` property, which manages the modal's visibility
and identifies the item to delete.

### Add the Delete Button and Modal

When using the resource action buttons you only need to pass the `action` and `id`
attributes, the click event is automatically set in the component.

```html
<x-gt-resource-action action="delete" :id="$item->id" />
```

Then, add a modal bound to the `selectedId` property. When `selectedId` is set, the modal will open.

```html
<x-gt-modal.delete wire:model="selectedId" :$selectedId />
```

## Design Notes

### Delete Item Sequence Diagram (modal)

```mermaid +parse
<x-mermaid>
    sequenceDiagram
        actor User
        participant Trait as Component Trait

        User->>Trait: Click delete button <br> $set('selectedId', $id)
        note right of User: The selectedId is bound to the delete modal <br>so when it is set, the modal opens
        Trait->>User: Display modal
        User->>Trait: Confirm Delete
        alt confirmed?
            Trait->>Trait: Delete item and reset selectedId
        else cancel?
            Trait->>Trait: Reset selectedId
        end
        Trait->>User: Close modal
</x-mermaid>
```

## Delete Using the Actions Toolbar Component (**REVIEW**)

When using this method you only need to include the delete modal modal and add the `withRedirect`
attribute. Thats it!

```php
<x-gt-actions-toolbar :$routePrefix :$editing :$selectedId/>
```

```html
<x-gt-modal.delete wire:model.live="selectedId" id="{{ $selectedId }}" withRedirect/>
```
