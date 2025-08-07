<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Layout Examples" class="container-xxl py-3">


    

    <div class="grid lg:cols-4 md:cols-2">
        <div class="bx pink">here</div>
        <div class="bx pink">here</div>
        <div class="bx pink">here</div>
        <div class="bx pink">here</div>
    </div>

    <h1>Responsive Layout Examples</h1>
    
    <p class="lead">View how layouts respond across different screen sizes without resizing your browser.</p>

    @push('styles')
    <style>
        .viewport-container {
            border: 2px solid #333;
            border-radius: 8px;
            margin: 1rem 0;
            overflow: auto;
            position: relative;
            background: white;
        }
        .viewport-label {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #333;
            color: white;
            padding: 2px 8px;
            font-size: 0.75rem;
            border-radius: 0 6px 0 4px;
            z-index: 10;
        }
        
        .demo-content {
            padding: 1rem;
            font-family: system-ui;
            color: #333;
            line-height: 1.4;
        }
        
        .demo-grid {
            display: grid;
            gap: 1rem;
            margin: 1rem 0;
        }
        
        .demo-card {
            background: #f5f5f5;
            padding: 1rem;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .demo-nav {
            background: #007bff;
            color: white;
            padding: 0.75rem 1rem;
            margin: -1rem -1rem 1rem -1rem;
        }
        
        .demo-nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem;
        }
        
        .demo-nav a {
            color: white;
            text-decoration: none;
        }
        
        /* Responsive grid examples */
        .mobile-grid {
            grid-template-columns: 1fr;
        }
        
        .tablet-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .desktop-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        
        /* Flexbox examples */
        .demo-flex {
            display: flex;
            gap: 1rem;
            margin: 1rem 0;
        }
        
        .mobile-flex {
            flex-direction: column;
        }
        
        .tablet-flex {
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .desktop-flex {
            flex-direction: row;
            flex-wrap: nowrap;
        }
        
        .flex-item {
            background: #e9ecef;
            padding: 1rem;
            border-radius: 4px;
            flex: 1;
            min-width: 200px;
        }
    </style>
    @endpush

    <div class="space-y-3">
        
        <!-- Grid Layout Example -->
        <section>
            <h2>Responsive Grid Layout</h2>
            <p>See how grid layouts adapt from mobile (1 column) to tablet (2 columns) to desktop (3 columns).</p>
            
            <!-- Mobile View -->
            <div class="viewport-container viewport-mobile">
                <div class="viewport-label">Mobile (375px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">☰ Menu</a></li>
                        </ul>
                    </nav>
                    <h3>Product Grid</h3>
                    <div class="demo-grid mobile-grid">
                        <div class="demo-card">
                            <h4>Product 1</h4>
                            <p>Full width on mobile for better readability and touch interaction.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 2</h4>
                            <p>Each card takes the full container width.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 3</h4>
                            <p>Vertical scrolling is optimal for mobile browsing.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablet View -->
            <div class="viewport-container viewport-tablet">
                <div class="viewport-label">Tablet (768px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                    <h3>Product Grid</h3>
                    <div class="demo-grid tablet-grid">
                        <div class="demo-card">
                            <h4>Product 1</h4>
                            <p>Two columns provide good balance between content density and readability.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 2</h4>
                            <p>Perfect for landscape tablet viewing.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 3</h4>
                            <p>Cards are appropriately sized for touch interaction.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 4</h4>
                            <p>Grid automatically wraps to next row.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop View -->
            <div class="viewport-container viewport-desktop">
                <div class="viewport-label">Desktop (1200px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Portfolio</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                    <h3>Product Grid</h3>
                    <div class="demo-grid desktop-grid">
                        <div class="demo-card">
                            <h4>Product 1</h4>
                            <p>Three columns maximize screen real estate on desktop while maintaining readability.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 2</h4>
                            <p>Desktop users can process more information at once.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 3</h4>
                            <p>Horizontal scrolling is minimized for better UX.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 4</h4>
                            <p>Additional content fits comfortably in the viewport.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 5</h4>
                            <p>Grid system scales effectively across devices.</p>
                        </div>
                        <div class="demo-card">
                            <h4>Product 6</h4>
                            <p>Consistent spacing and alignment maintained.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Flexbox Layout Example -->
        <section>
            <h2>Responsive Flexbox Layout</h2>
            <p>Flexbox layouts adapt direction and wrapping behavior across different screen sizes.</p>
            
            <!-- Mobile Flexbox -->
            <div class="viewport-container viewport-mobile">
                <div class="viewport-label">Mobile (375px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">☰ App</a></li>
                        </ul>
                    </nav>
                    <h3>Content Sections</h3>
                    <div class="demo-flex mobile-flex">
                        <div class="flex-item">
                            <h4>Main Content</h4>
                            <p>Stacked vertically for easy reading on narrow screens.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Sidebar</h4>
                            <p>Moves below main content on mobile.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Additional Info</h4>
                            <p>All sections stack for optimal mobile experience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablet Flexbox -->
            <div class="viewport-container viewport-tablet">
                <div class="viewport-label">Tablet (768px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </nav>
                    <h3>Content Sections</h3>
                    <div class="demo-flex tablet-flex">
                        <div class="flex-item">
                            <h4>Main Content</h4>
                            <p>Flexbox allows wrapping when items don't fit horizontally.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Sidebar</h4>
                            <p>Can sit beside main content or wrap to next line.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Additional Info</h4>
                            <p>Flexible arrangement based on content width.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop Flexbox -->
            <div class="viewport-container viewport-desktop">
                <div class="viewport-label">Desktop (1200px)</div>
                <div class="demo-content">
                    <nav class="demo-nav">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">Users</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </nav>
                    <h3>Content Sections</h3>
                    <div class="demo-flex desktop-flex">
                        <div class="flex-item">
                            <h4>Main Content</h4>
                            <p>All sections arranged horizontally with equal spacing on desktop.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Sidebar</h4>
                            <p>Consistent horizontal layout maximizes screen usage.</p>
                        </div>
                        <div class="flex-item">
                            <h4>Additional Info</h4>
                            <p>Desktop real estate allows for complex layouts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JTB Framework Examples -->
        <section>
            <h2>JTB Framework Responsive Classes</h2>
            <p>Examples using your framework's responsive class system with mobile-first approach.</p>
            
            <!-- Mobile with Framework Classes -->
            <div class="viewport-container viewport-mobile">
                <div class="viewport-label">Mobile (375px)</div>
                <div class="demo-content">
                    <h3>Framework Grid Example</h3>
                    <div style="display: grid; gap: 1rem; grid-template-columns: 1fr;">
                        <div class="demo-card">
                            <h4>Base: <code>grid</code></h4>
                            <p>Single column layout on mobile (unprefixed utility)</p>
                        </div>
                        <div class="demo-card">
                            <h4>Navigation</h4>
                            <p>Hamburger menu pattern for mobile</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablet with Framework Classes -->
            <div class="viewport-container viewport-tablet">
                <div class="viewport-label">Tablet (768px)</div>
                <div class="demo-content">
                    <h3>Framework Grid Example</h3>
                    <div style="display: grid; gap: 1rem; grid-template-columns: repeat(2, 1fr);">
                        <div class="demo-card">
                            <h4>Tablet: <code>md:cols-2</code></h4>
                            <p>Two columns starting from medium breakpoint</p>
                        </div>
                        <div class="demo-card">
                            <h4>Navigation</h4>
                            <p>Horizontal navigation bar with more space</p>
                        </div>
                        <div class="demo-card">
                            <h4>Content Area</h4>
                            <p>Better content density for tablet viewing</p>
                        </div>
                        <div class="demo-card">
                            <h4>Sidebar</h4>
                            <p>Can display alongside main content</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop with Framework Classes -->
            <div class="viewport-container viewport-desktop">
                <div class="viewport-label">Desktop (1200px)</div>
                <div class="demo-content">
                    <h3>Framework Grid Example</h3>
                    <div style="display: grid; gap: 1rem; grid-template-columns: repeat(3, 1fr);">
                        <div class="demo-card">
                            <h4>Desktop: <code>lg:cols-3</code></h4>
                            <p>Three columns for large screens using your framework's responsive system</p>
                        </div>
                        <div class="demo-card">
                            <h4>Full Navigation</h4>
                            <p>Complete navigation with all menu items visible</p>
                        </div>
                        <div class="demo-card">
                            <h4>Main Content</h4>
                            <p>Primary content area with optimal width</p>
                        </div>
                        <div class="demo-card">
                            <h4>Sidebar</h4>
                            <p>Secondary content or navigation</p>
                        </div>
                        <div class="demo-card">
                            <h4>Related Content</h4>
                            <p>Additional information or widgets</p>
                        </div>
                        <div class="demo-card">
                            <h4>Call to Action</h4>
                            <p>Promotional content or important actions</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Framework Breakpoint Reference -->
        <section>
            <h2>JTB Framework Breakpoint Reference</h2>
            <div class="demo-card" style="background: #f8f9fa; margin: 1rem 0;">
                <h3>Responsive Class Patterns</h3>
                <div style="display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                    <div>
                        <h4>Mobile-First (Default)</h4>
                        <ul>
                            <li><code>grid</code> - Base grid</li>
                            <li><code>cols-1</code> - Single column</li>
                            <li><code>flex</code> - Base flexbox</li>
                            <li><code>hidden</code> - Hidden by default</li>
                        </ul>
                    </div>
                    <div>
                        <h4>From Breakpoint</h4>
                        <ul>
                            <li><code>md:cols-2</code> - 2 cols from medium up</li>
                            <li><code>lg:cols-3</code> - 3 cols from large up</li>
                            <li><code>md:flex</code> - Flex from medium up</li>
                            <li><code>lg:block</code> - Block from large up</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Target Specific Range</h4>
                        <ul>
                            <li><code>on-md:cols-2</code> - Only on medium</li>
                            <li><code>to-lg:hidden</code> - Hidden up to large</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>

</x-gt-app-layout>
