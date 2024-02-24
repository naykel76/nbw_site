<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="cookbook zebra c-py-3">
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

                <p class="mt-05"><small>Mermaid Diagram: diagrams/real-time-saving-with-error-trapping</small></p>
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

    @push('scripts')
        <script type="module">
            import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
            mermaid.initialize({ startOnLoad: true });
        </script>
    @endpush
</x-gotime-app-layout>


