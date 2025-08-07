<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Layout Examples" class="container-xxl py-3">

    <div class="grid lg:cols-4 md:cols-2">
        <div class="bx pink">Card 1</div>
        <div class="bx pink">Card 2</div>
        <div class="bx pink">Card 3</div>
        <div class="bx pink">Card 4</div>
    </div>

    <section class="space-y">
        <h2>Interactive responsive tester</h2>
        <p>Drag the handles to resize and test how your layout responds to different viewport sizes.</p>

        <div class="preset-buttons">
            <button class="btn primary preset-btn" data-width="375" data-height="667">Mobile (375px)</button>
            <button class="btn primary preset-btn" data-width="768" data-height="1024">Tablet (768px)</button>
            <button class="btn primary preset-btn" data-width="1024" data-height="768">Tablet Landscape</button>
            <button class="btn primary preset-btn" data-width="1200" data-height="800">Desktop (1200px)</button>
            <button class="btn primary preset-btn" data-width="1440" data-height="900">Large Desktop</button>
        </div>

        <pre>
            <x-torchlight-code language="blade">
                <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                    <div class="bx pink">Card 1</div>
                    <div class="bx pink">Card 2</div>
                    <div class="bx pink">Card 3</div>
                    <div class="bx pink">Card 4</div>
                </div>
            </x-torchlight-code>
        </pre>

        <div id="responsive-tester-container" class="responsive-tester bx bdr-red bdr-5 mt-5" data-width="" data-height="">
            <div class="size-display secondary"></div>
            <div class="breakpoint-indicator"></div>
            <div class="bx">
                <h3>Test content</h3>
                <p>This content will respond to the container size. Resize the container to see how your layouts adapt.</p>
                <div class="grid lg:cols-4 md:cols-2">
                    <div class="bx pink">Card 1</div>
                    <div class="bx pink">Card 2</div>
                    <div class="bx pink">Card 3</div>
                    <div class="bx pink">Card 4</div>
                </div>

            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tester = document.getElementById('responsive-tester-container');
                const indicator = tester.querySelector('.breakpoint-indicator');
                const sizeDisplay = tester.querySelector('.size-display');

                if (!tester) {
                    console.warn('Responsive tester element not found');
                    return;
                }

                let isResizing = false;
                let currentHandle = null;
                let startX = 0;
                let startY = 0;
                let startWidth = 0;
                let startHeight = 0;

                function updateSizeDisplay() {
                    const width = tester.offsetWidth;
                    const height = tester.offsetHeight;

                    sizeDisplay.textContent = `${width}px x ${height}px`;

                    let breakpoint = 'XS';
                    let colourClass = 'red';

                    if (width >= 1200) {
                        breakpoint = 'XL';
                        colourClass = 'blue';
                    } else if (width >= 992) {
                        breakpoint = 'LG';
                        colourClass = 'green';
                    } else if (width >= 768) {
                        breakpoint = 'MD';
                        colourClass = 'purple';
                    } else if (width >= 576) {
                        breakpoint = 'SM';
                        colourClass = 'orange';
                    }

                    indicator.textContent = breakpoint;
                    indicator.className = 'breakpoint-indicator ' + colourClass;
                }

                function startResize(e, handle) {
                    isResizing = true;
                    currentHandle = handle;
                    startX = e.clientX;
                    startY = e.clientY;
                    startWidth = parseInt(window.getComputedStyle(tester).width, 10);
                    startHeight = parseInt(window.getComputedStyle(tester).height, 10);

                    document.addEventListener('mousemove', doResize);
                    document.addEventListener('mouseup', stopResize);
                    e.preventDefault();
                }

                function doResize(e) {
                    if (!isResizing) return;

                    const deltaX = e.clientX - startX;
                    const deltaY = e.clientY - startY;

                    if (currentHandle === 'corner') {
                        const newWidth = Math.max(320, startWidth + deltaX);
                        const newHeight = Math.max(200, startHeight + deltaY);
                        tester.style.width = newWidth + 'px';
                        tester.style.height = newHeight + 'px';
                    } else if (currentHandle === 'right') {
                        const newWidth = Math.max(320, startWidth + deltaX);
                        tester.style.width = newWidth + 'px';
                    } else if (currentHandle === 'bottom') {
                        const newHeight = Math.max(200, startHeight + deltaY);
                        tester.style.height = newHeight + 'px';
                    }

                    updateSizeDisplay();
                }

                function stopResize() {
                    isResizing = false;
                    currentHandle = null;
                    document.removeEventListener('mousemove', doResize);
                    document.removeEventListener('mouseup', stopResize);
                }

                // Add drag handles
                const cornerHandle = document.createElement('div');
                cornerHandle.className = 'drag-handle drag-handle-corner';
                cornerHandle.addEventListener('mousedown', (e) => startResize(e, 'corner'));
                tester.appendChild(cornerHandle);

                const rightHandle = document.createElement('div');
                rightHandle.className = 'drag-handle drag-handle-right';
                rightHandle.addEventListener('mousedown', (e) => startResize(e, 'right'));
                tester.appendChild(rightHandle);

                const bottomHandle = document.createElement('div');
                bottomHandle.className = 'drag-handle drag-handle-bottom';
                bottomHandle.addEventListener('mousedown', (e) => startResize(e, 'bottom'));
                tester.appendChild(bottomHandle);

                updateSizeDisplay();

                // Preset size buttons
                document.querySelectorAll('.preset-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const width = this.dataset.width;
                        const height = this.dataset.height || '500';

                        tester.style.width = width + 'px';
                        tester.style.height = height + 'px';

                        setTimeout(updateSizeDisplay, 10);
                    });
                });
            });
        </script>
    @endpush
</x-gt-app-layout>
