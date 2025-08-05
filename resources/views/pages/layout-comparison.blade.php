<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Layout Comparison" class="container maxw-xl py-2">

    <h1>Layout Comparison Guide</h1>
    
    <p class="lead">Compare different CSS layout methods and see how they behave across viewport sizes.</p>

    @push('styles')
    <style>
        /* Custom grid templates that can't be done with simple Tailwind */
        .grid-areas {
            display: grid;
            grid-template-areas: 
                "header header"
                "sidebar main"
                "footer footer";
            grid-template-columns: 1fr 2fr;
            gap: 0.5rem;
        }
        
        .grid-areas .header { grid-area: header; }
        .grid-areas .sidebar { grid-area: sidebar; }
        .grid-areas .main { grid-area: main; }
        .grid-areas .footer { grid-area: footer; }
        
        /* Float example (for comparison) */
        .float-layout::after {
            content: "";
            display: table;
            clear: both;
        }
        
        .float-item {
            float: left;
            width: 30%;
            margin: 1.66%;
        }
    </style>
    @endpush

    <!-- Layout Method Comparison -->
    <section>
        <h2>Layout Methods Comparison</h2>
        <p>See how different CSS layout methods handle the same content structure.</p>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 my-8">
            
            <!-- CSS Grid - Basic -->
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">CSS Grid - Fixed Columns</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 4</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 5</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 6</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">grid-template-columns: repeat(3, 1fr);</div>
                </div>
            </div>
            
            <!-- CSS Grid - Responsive -->
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">CSS Grid - Auto-Responsive</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="grid gap-2" style="grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 4</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 5</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Item 6</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));</div>
                </div>
            </div>
            
            <!-- Flexbox - Row -->
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Flexbox - Row</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="flex gap-2">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 3</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">display: flex;
gap: 0.5rem;</div>
                </div>
            </div>
            
            <!-- Flexbox - Wrap -->
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Flexbox - Wrap</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="flex flex-wrap gap-2">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 4</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm flex-1 min-w-[80px]">Item 5</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">display: flex;
flex-wrap: wrap;
gap: 0.5rem;</div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Grid Areas Example -->
    <section>
        <h2>CSS Grid Areas - Layout Structure</h2>
        <p>CSS Grid Areas provide semantic layout structure with named grid areas.</p>
        
        <div class="max-w-2xl mx-auto border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
            <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Grid Template Areas</div>
            <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                <div class="grid-areas">
                    <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm header">Header</div>
                    <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm sidebar">Sidebar</div>
                    <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm main">Main Content</div>
                    <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm footer">Footer</div>
                </div>
                <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">grid-template-areas: 
  "header header"
  "sidebar main"
  "footer footer";
grid-template-columns: 1fr 2fr;</div>
            </div>
        </div>
    </section>

    <!-- Viewport Size Simulations -->
    <section>
        <h2>Responsive Behavior Simulation</h2>
        <p>See how a flexible grid layout responds to different container widths.</p>
        
        <div class="space-y-8">
            
            <!-- Mobile Simulation -->
            <div>
                <h3>Mobile Simulation (320px)</h3>
                <div class="w-full max-w-80 mx-auto border border-gray-300 rounded overflow-hidden">
                    <div class="p-4 grid gap-2" style="grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 4</div>
                    </div>
                </div>
            </div>
            
            <!-- Tablet Simulation -->
            <div>
                <h3>Tablet Simulation (600px)</h3>
                <div class="w-full max-w-[600px] mx-auto border border-gray-300 rounded overflow-hidden">
                    <div class="p-4 grid gap-2" style="grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 4</div>
                    </div>
                </div>
            </div>
            
            <!-- Desktop Simulation -->
            <div>
                <h3>Desktop Simulation (900px)</h3>
                <div class="w-full max-w-[900px] mx-auto border border-gray-300 rounded overflow-hidden">
                    <div class="p-4 grid gap-2" style="grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 1</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 3</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Card 4</div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- JTB Framework Classes Demo -->
    <section>
        <h2>JTB Framework Classes in Action</h2>
        <p>Practical examples using your framework's utility classes.</p>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 my-8">
            
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Mobile-First Grid</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="grid gap-2 grid-cols-1">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Base: Single column</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Works on all sizes</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Mobile-first approach</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">/* Base styles - mobile first */
.grid { display: grid; }
.gap { gap: 0.5rem; }</div>
                </div>
            </div>
            
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Responsive Enhancement</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="grid gap-2 grid-cols-2">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">md:cols-2</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">From medium up</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Progressive enhancement</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Better tablet/desktop</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">/* Enhanced for larger screens */
@media (min-width: 768px) {
  .md\:cols-2 { 
    grid-template-columns: repeat(2, 1fr); 
  }
}</div>
                </div>
            </div>
            
            <div class="border-2 border-gray-800 rounded-lg overflow-hidden bg-white">
                <div class="bg-gray-800 text-white px-4 py-3 font-bold text-center">Flexible Grid Pattern</div>
                <div class="p-4 font-sans text-gray-800 min-h-[200px]">
                    <div class="grid gap-2" style="grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));">
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Auto-fit</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Responsive</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">No breakpoints</div>
                        <div class="bg-blue-50 border-2 border-blue-500 rounded px-2 py-2 text-center text-sm">Always optimal</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-300 rounded p-4 my-4 font-mono text-sm whitespace-pre-wrap">.flexible-grid-150 {
  display: grid;
  grid-template-columns: 
    repeat(auto-fit, minmax(150px, 1fr));
}</div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Best Practices -->
    <section>
        <h2>Layout Best Practices</h2>
        <div class="bg-gray-50 p-8 my-8 rounded-lg">
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                
                <div>
                    <h3>🎯 Choose the Right Tool</h3>
                    <ul>
                        <li><strong>CSS Grid:</strong> 2D layouts, page structure</li>
                        <li><strong>Flexbox:</strong> 1D layouts, component alignment</li>
                        <li><strong>Auto-fit/Auto-fill:</strong> Dynamic responsive grids</li>
                        <li><strong>Grid Areas:</strong> Semantic layout structure</li>
                    </ul>
                </div>
                
                <div>
                    <h3>📱 Mobile-First Strategy</h3>
                    <ul>
                        <li>Start with single column layouts</li>
                        <li>Use unprefixed utilities for base styles</li>
                        <li>Enhance with <code>md:</code>, <code>lg:</code> prefixes</li>
                        <li>Test on real devices and viewport sizes</li>
                    </ul>
                </div>
                
                <div>
                    <h3>⚡ Performance Tips</h3>
                    <ul>
                        <li>Use <code>auto-fit</code> for truly responsive grids</li>
                        <li>Minimize layout shifts with consistent sizing</li>
                        <li>Consider container queries for component-level responsiveness</li>
                        <li>Use <code>gap</code> instead of margins for consistent spacing</li>
                    </ul>
                </div>
                
                <div>
                    <h3>🔧 JTB Framework Tips</h3>
                    <ul>
                        <li>Use <code>flexible-grid-150</code> for card layouts</li>
                        <li>Combine <code>grid md:cols-2 lg:cols-3</code> for stepped responsiveness</li>
                        <li>Use <code>to-lg:hidden</code> for mobile-only content</li>
                        <li>Apply <code>on-md:</code> for tablet-specific styles</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>

</x-gt-app-layout>
