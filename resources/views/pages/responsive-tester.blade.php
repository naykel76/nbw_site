<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Layout Examples" class="container-xxl py-3">

    @push('styles')
        <style>
            /* Interactive Resizable Container */
            .responsive-tester {
                border: 3px solid #007bff;
                border-radius: 8px;
                margin: 2rem 0;
                position: relative;
                background: white;
                min-width: 320px;
                min-height: 200px;
                width: 800px;
                height: 500px;
                overflow: auto;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .responsive-tester::before {
                content: attr(data-width) ' × ' attr(data-height);
                position: absolute;
                top: -30px;
                left: 0;
                background: #007bff;
                color: white;
                padding: 4px 8px;
                font-size: 0.75rem;
                border-radius: 4px;
                font-family: monospace;
            }

            .tester-content {
                padding: 1rem;
                height: 100%;
                overflow: auto;
            }

            /* Drag Handles */
            .drag-handle {
                position: absolute;
                background: #007bff;
                opacity: 0.7;
                transition: opacity 0.2s;
            }

            .drag-handle:hover {
                opacity: 1;
            }

            .drag-handle-corner {
                bottom: 0;
                right: 0;
                width: 20px;
                height: 20px;
                cursor: nw-resize;
                border-radius: 8px 0 5px 0;
            }

            .drag-handle-corner::after {
                content: '';
                position: absolute;
                bottom: 3px;
                right: 3px;
                width: 0;
                height: 0;
                border-left: 8px solid transparent;
                border-bottom: 8px solid white;
            }

            .drag-handle-right {
                top: 50%;
                right: 0;
                width: 6px;
                height: 40px;
                transform: translateY(-50%);
                cursor: ew-resize;
                border-radius: 3px 0 0 3px;
            }

            .drag-handle-bottom {
                bottom: 0;
                left: 50%;
                width: 40px;
                height: 6px;
                transform: translateX(-50%);
                cursor: ns-resize;
                border-radius: 3px 3px 0 0;
            }

            .preset-buttons {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                margin: 1rem 0;
            }
            
            .preset-btn {
                background: #6c757d;
                color: white;
                border: none;
                padding: 0.25rem 0.75rem;
                border-radius: 4px;
                cursor: pointer;
                font-size: 0.875rem;
            }
            
            .preset-btn:hover {
                background: #5a6268;
            }
            
            .breakpoint-indicator {
                position: absolute;
                top: -30px;
                right: 0;
                background: #28a745;
                color: white;
                padding: 4px 8px;
                font-size: 0.75rem;
                border-radius: 4px;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tester = document.getElementById('responsive-tester');
                
                if (!tester) {
                    console.warn('Responsive tester element not found');
                    return;
                }
                
                const indicator = tester.querySelector('.breakpoint-indicator');
                let isResizing = false;
                let currentHandle = null;
                let startX = 0;
                let startY = 0;
                let startWidth = 0;
                let startHeight = 0;

                function updateSizeDisplay() {
                    const width = tester.offsetWidth;
                    const height = tester.offsetHeight;

                    tester.setAttribute('data-width', width + 'px');
                    tester.setAttribute('data-height', height + 'px');

                    // Update breakpoint indicator
                    let breakpoint = 'XS';
                    if (width >= 1200) breakpoint = 'XL';
                    else if (width >= 992) breakpoint = 'LG';
                    else if (width >= 768) breakpoint = 'MD';
                    else if (width >= 576) breakpoint = 'SM';

                    indicator.textContent = breakpoint;
                    indicator.style.background = getBreakpointColor(breakpoint);
                }

                function getBreakpointColor(breakpoint) {
                    const colours = {
                        'XS': '#dc3545',
                        'SM': '#fd7e14',
                        'MD': '#ffc107',
                        'LG': '#28a745',
                        'XL': '#007bff'
                    };
                    return colours[breakpoint] || '#6c757d';
                }

                // Drag functionality
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

                // Initial update
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

    <div class="space-y-3">
        <!-- Interactive Responsive Tester -->
        <section>
            <h2>Interactive responsive tester</h2>
            <p>Drag the handles to resize and test how your layout responds to different viewport sizes.</p>
            
            <div class="preset-buttons">
                <button class="preset-btn" data-width="375" data-height="667">iPhone (375px)</button>
                <button class="preset-btn" data-width="768" data-height="1024">iPad (768px)</button>
                <button class="preset-btn" data-width="1024" data-height="768">iPad landscape</button>
                <button class="preset-btn" data-width="1200" data-height="800">Desktop (1200px)</button>
                <button class="preset-btn" data-width="1440" data-height="900">Large desktop</button>
            </div>
            
            <div id="responsive-tester" class="responsive-tester" data-width="" data-height="">
                <div class="breakpoint-indicator">XS</div>
                <div class="tester-content">
                    <h3>Test content</h3>
                    <p>This content will respond to the container size. Resize the container to see how your layouts adapt.</p>
                    
                    <div style="display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 4px;">Card 1</div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 4px;">Card 2</div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 4px;">Card 3</div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 4px;">Card 4</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</x-gt-app-layout>