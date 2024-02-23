<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="cookbook zebra c-py-3">
    <section>
        <div class="container-sm">
            <div class="bx">
                <h2>Real-Time Saving With click to change to input</h2>
                <livewire:cookbook.real-time-saving-with-selectable-inputs />
            </div>
        </div>
    </section>
    <section>
        <div class="container-sm">
            <div class="bx">
                <h2>Real-Time Saving</h2>
                <p>This example demonstrates how to save data in real-time without the need for a submit button. It
                    includes real-time validation and uses the 'blur' event to trigger updates.</p>
                <livewire:cookbook.real-time-saving-with-basic-inputs />
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
