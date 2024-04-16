<div class="w-20">
    <div drag-root="reOrder" class="space-y-05">
        @foreach ($things as $item)
            <div drag-item="{{ $item['id'] }}" draggable="true" wire:key="{{ $item['id'] }}"
                class="bx dark rounded-05 pxy-075">
                {{ $item['name'] }}
            </div>
        @endforeach
    </div>
</div>

<script>
    // Select the root element for dragging
    let root = document.querySelector('[drag-root]')

    // For each draggable item
    root.querySelectorAll('[drag-item]').forEach(el => {

        // When the drag starts, set the 'dragging' attribute to true
        el.addEventListener('dragstart', e => {
            e.target.setAttribute('dragging', true)
        })

        // When the dragged item is dropped
        el.addEventListener('drop', e => {
            // Remove the 'bg-yellow-100' and 'txt-orange' classes from the target element
            e.target.classList.remove('bg-yellow-100', 'txt-orange')

            // Get the element that is currently being dragged
            let draggingEl = root.querySelector('[dragging]')

            // Insert the dragged element before the target element
            e.target.before(draggingEl)

            // Get the Livewire component associated with the target element and its ID
            let component = Livewire.find(
                e.target.closest('[wire\\:id]').getAttribute('wire:id'))

            // Get all the drag items and map them to their IDs
            let orderIds = Array.from(root.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'))

            // Get the method to call from the `drag-root` attribute
            let method = root.getAttribute('drag-root')

            // Call the method on the Livewire component, passing the new order
            component.call(method, orderIds)
        })

        el.addEventListener('dragenter', e => {
            e.target.classList.add('bg-yellow-100', 'txt-orange')
            e.preventDefault()
        })

        el.addEventListener('dragover', e => e.preventDefault())

        el.addEventListener('dragleave', e => {
            e.target.classList.remove('bg-yellow-100', 'txt-orange')
        })

        el.addEventListener('dragend', e => {
            e.target.removeAttribute('dragging')
        })
    })
</script>
