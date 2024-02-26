<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="cookbook zebra c-py-3">
    <div class="container">
        <x-toc />
    </div>
    <x-docs.sections.layout title="Basic Drag and Drop Sorting with Inline Editing" withContainer>
        <div class="container-sm">
            <div class="bx">
                <p>Uses CSS to hide the button when dragging.</p>
                <livewire:cookbook.drag-and-drop-sorting-with-inline-editing />
                <p class="txt-xs mt-1">
                    <a href="https://github.com/naykel76/nbw_site/blob/master/app/Livewire/Cookbook/DragAndDropSortingWithInlineEditing.php"
                        target="_blank">Source code</a>
                </p>
            </div>
        </div>
    </x-docs.sections.layout>
    <x-docs.sections.layout title="Basic Drag and Drop Sorting" withContainer>
        <div class="container-sm">
            <div class="bx">
                <p>This example demonstrates a simple drag and drop list. When the list order is rearranged, the
                    database is updated to reflect the new sequence.</p>
                <livewire:cookbook.drag-and-drop-sorting />
                <p class="txt-xs mt-1">
                    <a href="https://github.com/naykel76/nbw_site/blob/master/app/Livewire/DragAndDropSorting.php"
                        target="_blank">Source code</a>
                </p>
            </div>
        </div>
    </x-docs.sections.layout>
    <x-docs.sections.layout title="List with Inline CRUD Functionality" withContainer>
        <div class="container-md">
            <div class="bx">
                <p>This example demonstrates how to display a list or items with inline CRUD functionality. This allows
                    users to perform CRUD operations directly inline in the list, without needing to navigate away from
                    the list. </p>
                <livewire:cookbook.list-with-inline-crud />
                <p class="txt-xs mt-1">
                    Source Code
                    <a href="https://github.com/naykel76/nbw_site/blob/master/app/Livewire/Cookbook/ListWithInlineCrud.php"
                        target="_blank">Livewire Component</a> /
                    <a href="https://github.com/naykel76/nbw_site/blob/master/resources/views/livewire/cookbook/list-with-inline-crud.blade.php"
                        target="_blank">View</a> /
                    <a href="https://github.com/naykel76/nbw_site/blob/master/resources/views/livewire/cookbook/list-with-inline-crud-row.blade.php"
                        target="_blank">List Row</a>
                </p>
            </div>
        </div>
    </x-docs.sections.layout>
    <x-docs.sections.layout title="Real-Time Saving with Error Trapping" withContainer>
        <div class="container-md">
            <div class="bx">
                <p>This example demonstrates how to save data in real-time without needing a submit button. It does this
                    by using the <code>wire:model.blur</code> directive on the input fields which triggers when you
                    click away from an input field. As soon as you move away from a field, the data you entered is
                    validated and saved. If there's an error in your input, it's caught immediately and all other fields
                    are disabled until you correct it. This ensures data integrity and provides immediate feedback.</p>
                <livewire:cookbook.real-time-saving-with-error-trapping />
                <p class="txt-xs mt-1">
                    <a href="https://github.com/naykel76/nbw_site/blob/master/app/Livewire/Cookbook/RealTimeSavingWithErrorTrapping.php"
                        target="_blank">Source code</a> /
                    <a href="https://github.com/naykel76/nbw_site/blob/master/resources/views/diagrams/real-time-saving-with-error-trapping.md"
                        target="_blank">Sequence diagram</a>
                </p>
            </div>
        </div>
    </x-docs.sections.layout>
    <x-docs.sections.layout title="DataTable with In-Page Editing">
        <div class="container-md">
            <div class="bx">
                <p>There are two separate, unrelated components here: a form and a table. These components can be placed
                    on the same page, either side by side or with the form nested inside the table component.</p>
                <p>The table component uses the <code>$dispatch</code> method to emit a <code>set-item-event</code>,
                    passing along an <code>id</code> as a parameter. This event is listened for by the <code>edit</code>
                    method in the <code>Crudable</code> trait, which then sets the form object to the corresponding item
                    with the emitted <code>id</code>.
                </p>
                <livewire:cookbook.basic-data-table />
                <div class="bx mt light">
                    <p>The form, or <code>CreateEdit</code> component, is a Livewire component that uses the
                        <code>Crudable</code> trait. This trait provides the <code>edit</code> method, which listens for
                        the <code>set-item-event</code> emitted by the table component. When the <code>CreateEdit</code>
                        component catches this event, it uses the passed <code>id</code> to fetch the corresponding item
                        and set the <code>editing</code> model on the form object.
                    </p>
                    <livewire:cookbook.basic-form-with-form-object />
                    <div class="txt-red txt-xs fw9">Need to add refresh table after update</div>
                </div>
            </div>
        </div>
    </x-docs.sections.layout>
</x-gotime-app-layout>
