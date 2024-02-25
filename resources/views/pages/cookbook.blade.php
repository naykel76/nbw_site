<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="cookbook zebra c-py-3">
    <section>
        <div class="container-md">
            <div class="bx">
                <h2>List with Inline CRUD Functionality</h2>
                <p>This example demonstrates how to display a list or items with inline CRUD functionality. This allows
                    users to perform CRUD operations directly inline in the list, without needing to navigate away from
                    the list. </p>
                    <p>This can be easily adapted to include real-time saving and drag-and-drop sorting.</p>
                    <livewire:cookbook.list-with-inline-crud />
                    <p class="txt-sm fw9 txt-red mt">Currently supports editing only, create and delete functionality to be added.</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container-md">
            <div class="bx">
                <h2>Real-Time Saving with Error Trapping</h2>
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
    </section>
    <section>
        <div class="container-md">
            <div class="bx">
                <h2>DataTable with In-Page Editing</h2>
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
    </section>
</x-gotime-app-layout>
