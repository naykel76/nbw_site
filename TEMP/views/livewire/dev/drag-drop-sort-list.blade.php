<div>

    <p>The item gets placed on top</p>

    {{-- <div class="grid-3 cols-4">
        <div drag-root="reorder" class="space-y-05">
            @foreach($items as $item)
                <div drag-item="{{ $item['order'] }}" draggable="true" wire:key="{{ $item['order'] }}" class="bx pxy-05">
                    {{ $item['title'] }}
                </div>
            @endforeach
        </div>
        <ul>
            @foreach($items as $item)
                <li>{{ $item['order'] }}: {{ $item['title'] }}</li>
            @endforeach
        </ul>

        <pre>
            <?php  print_r(array_values($items))?>
        </pre>
    </div> --}}

    <script>
        let root = document.querySelector('[drag-root]')

        root.querySelectorAll('[drag-item]').forEach(el => {
            el.addEventListener('dragstart', e => {
                e.target.setAttribute('dragging', true)
            })

            el.addEventListener('drop', e => {
                e.target.classList.remove('warning')

                let draggingEl = root.querySelector('[dragging]')

                e.target.before(draggingEl)

                // Refresh the livewire component
                let component = Livewire.find(
                    e.target.closest('[wire\\:order]').getAttribute('wire:order')
                )

                let orderIds = Array.from(root.querySelectorAll('[drag-item]'))
                    .map(itemEl => itemEl.getAttribute('drag-item'))

                let method = root.getAttribute('drag-root')

                component.call(method, orderIds)
            })

            el.addEventListener('dragenter', e => {
                e.target.classList.add('warning')

                e.preventDefault()
            })

            el.addEventListener('dragover', e => e.preventDefault())

            el.addEventListener('dragleave', e => {
                e.target.classList.remove('warning')
            })

            el.addEventListener('dragend', e => {
                e.target.removeAttribute('dragging')
            })
        })

    </script>
</div>
