<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Layout Playground" class="container maxw-xl py-2">

    <h1>Layout Playground</h1>
    
    <p class="lead">Interactive tool to experiment with CSS layout properties in real-time across different viewport sizes.</p>

    @push('styles')
    <style>
        .playground-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            margin: 2rem 0;
        }
        
        @media (min-width: 768px) {
            .playground-container {
                grid-template-columns: 300px 1fr;
            }
        }
        
        .controls-panel {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .viewport-panel {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .control-group {
            margin-bottom: 1rem;
        }
        
        .control-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .control-group select,
        .control-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: white;
            color: #333;
        }
        
        .viewport-container {
            border: 2px solid #333;
            border-radius: 8px;
            position: relative;
            background: white;
            overflow: auto;
            transition: width 0.3s ease;
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
            min-height: 200px;
        }
        
        .demo-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 4px;
            padding: 1rem;
            margin: 0.25rem;
            text-align: center;
            font-weight: bold;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .playground-grid {
            transition: all 0.3s ease;
        }
        
        .code-output {
            background: #2d3748;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            font-size: 0.875rem;
            margin-top: 1rem;
            white-space: pre-wrap;
        }
        
        .viewport-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .viewport-tab {
            padding: 0.5rem 1rem;
            border: 1px solid #ccc;
            background: #f8f9fa;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #333;
        }
        
        .viewport-tab.active {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }
        
        .btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background 0.2s ease;
        }
        
        .btn:hover {
            background: #0056b3;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    </style>
    @endpush

    <div class="playground-container" x-data="layoutPlayground()">
        
        <!-- Controls Panel -->
        <div class="controls-panel">
            <h3>Layout Controls</h3>
            
            <!-- Display Type -->
            <div class="control-group">
                <label>Display Type</label>
                <select x-model="display" @change="updateLayout()">
                    <option value="grid">Grid</option>
                    <option value="flex">Flexbox</option>
                </select>
            </div>
            
            <!-- Grid Controls -->
            <template x-show="display === 'grid'">
                <div class="control-group">
                    <label>Grid Template Columns</label>
                    <select x-model="gridColumns" @change="updateLayout()">
                        <option value="1fr">1 Column</option>
                        <option value="repeat(2, 1fr)">2 Columns</option>
                        <option value="repeat(3, 1fr)">3 Columns</option>
                        <option value="repeat(4, 1fr)">4 Columns</option>
                        <option value="repeat(auto-fit, minmax(120px, 1fr))">Auto-fit (120px min)</option>
                        <option value="repeat(auto-fit, minmax(150px, 1fr))">Auto-fit (150px min)</option>
                        <option value="repeat(auto-fill, minmax(100px, 1fr))">Auto-fill (100px min)</option>
                    </select>
                </div>
                
                <div class="control-group">
                    <label>Grid Gap</label>
                    <select x-model="gap" @change="updateLayout()">
                        <option value="0">No Gap</option>
                        <option value="0.5rem">0.5rem</option>
                        <option value="1rem">1rem</option>
                        <option value="1.5rem">1.5rem</option>
                        <option value="2rem">2rem</option>
                    </select>
                </div>
            </template>
            
            <!-- Flex Controls -->
            <template x-show="display === 'flex'">
                <div class="control-group">
                    <label>Flex Direction</label>
                    <select x-model="flexDirection" @change="updateLayout()">
                        <option value="row">Row</option>
                        <option value="column">Column</option>
                        <option value="row-reverse">Row Reverse</option>
                        <option value="column-reverse">Column Reverse</option>
                    </select>
                </div>
                
                <div class="control-group">
                    <label>Flex Wrap</label>
                    <select x-model="flexWrap" @change="updateLayout()">
                        <option value="nowrap">No Wrap</option>
                        <option value="wrap">Wrap</option>
                        <option value="wrap-reverse">Wrap Reverse</option>
                    </select>
                </div>
                
                <div class="control-group">
                    <label>Justify Content</label>
                    <select x-model="justifyContent" @change="updateLayout()">
                        <option value="flex-start">Flex Start</option>
                        <option value="center">Center</option>
                        <option value="flex-end">Flex End</option>
                        <option value="space-between">Space Between</option>
                        <option value="space-around">Space Around</option>
                        <option value="space-evenly">Space Evenly</option>
                    </select>
                </div>
                
                <div class="control-group">
                    <label>Align Items</label>
                    <select x-model="alignItems" @change="updateLayout()">
                        <option value="stretch">Stretch</option>
                        <option value="flex-start">Flex Start</option>
                        <option value="center">Center</option>
                        <option value="flex-end">Flex End</option>
                        <option value="baseline">Baseline</option>
                    </select>
                </div>
                
                <div class="control-group">
                    <label>Gap</label>
                    <select x-model="gap" @change="updateLayout()">
                        <option value="0">No Gap</option>
                        <option value="0.5rem">0.5rem</option>
                        <option value="1rem">1rem</option>
                        <option value="1.5rem">1.5rem</option>
                        <option value="2rem">2rem</option>
                    </select>
                </div>
            </template>
            
            <!-- Item Count -->
            <div class="control-group">
                <label>Number of Items</label>
                <select x-model="itemCount" @change="updateLayout()">
                    <option value="3">3 Items</option>
                    <option value="4">4 Items</option>
                    <option value="6">6 Items</option>
                    <option value="8">8 Items</option>
                    <option value="12">12 Items</option>
                </select>
            </div>
            
            <!-- Generated CSS -->
            <div class="code-output" x-text="generateCSS()"></div>
            
            <button class="btn btn-sm" @click="copyCSS()" style="margin-top: 0.5rem;">Copy CSS</button>
        </div>
        
        <!-- Viewport Panel -->
        <div class="viewport-panel">
            
            <!-- Viewport Tabs -->
            <div class="viewport-tabs">
                <div class="viewport-tab" 
                     :class="{ active: activeViewport === 'mobile' }"
                     @click="setViewport('mobile')">
                    Mobile
                </div>
                <div class="viewport-tab" 
                     :class="{ active: activeViewport === 'tablet' }"
                     @click="setViewport('tablet')">
                    Tablet
                </div>
                <div class="viewport-tab" 
                     :class="{ active: activeViewport === 'desktop' }"
                     @click="setViewport('desktop')">
                    Desktop
                </div>
            </div>
            
            <!-- Viewport Container -->
            <div class="viewport-container" 
                 :style="getViewportStyle()"
                 x-ref="viewport">
                <div class="viewport-label" x-text="getViewportLabel()"></div>
                <div class="demo-content">
                    <h3>Layout Preview</h3>
                    <div class="playground-grid" 
                         :style="getLayoutStyle()"
                         x-ref="playground">
                        <template x-for="i in parseInt(itemCount)" :key="i">
                            <div class="demo-item" x-text="`Item ${i}`"></div>
                        </template>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>

    @push('scripts')
    <script>
        function layoutPlayground() {
            return {
                // Layout properties
                display: 'grid',
                gridColumns: 'repeat(auto-fit, minmax(150px, 1fr))',
                flexDirection: 'row',
                flexWrap: 'wrap',
                justifyContent: 'flex-start',
                alignItems: 'stretch',
                gap: '1rem',
                itemCount: '6',
                
                // Viewport control
                activeViewport: 'desktop',
                
                init() {
                    this.updateLayout();
                },
                
                updateLayout() {
                    this.$nextTick(() => {
                        const playground = this.$refs.playground;
                        if (playground) {
                            const style = this.getLayoutStyle();
                            Object.assign(playground.style, this.parseStyleString(style));
                        }
                    });
                },
                
                parseStyleString(styleString) {
                    const styles = {};
                    styleString.split(';').forEach(rule => {
                        if (rule.trim()) {
                            const [property, value] = rule.split(':').map(s => s.trim());
                            if (property && value) {
                                styles[property] = value;
                            }
                        }
                    });
                    return styles;
                },
                
                getLayoutStyle() {
                    let style = `display: ${this.display}; gap: ${this.gap};`;
                    
                    if (this.display === 'grid') {
                        style += ` grid-template-columns: ${this.gridColumns};`;
                    } else if (this.display === 'flex') {
                        style += ` flex-direction: ${this.flexDirection};`;
                        style += ` flex-wrap: ${this.flexWrap};`;
                        style += ` justify-content: ${this.justifyContent};`;
                        style += ` align-items: ${this.alignItems};`;
                    }
                    
                    return style;
                },
                
                getViewportStyle() {
                    const sizes = {
                        mobile: '375px',
                        tablet: '768px',
                        desktop: '1200px'
                    };
                    return `width: ${sizes[this.activeViewport]}; max-width: 100%;`;
                },
                
                getViewportLabel() {
                    const labels = {
                        mobile: 'Mobile (375px)',
                        tablet: 'Tablet (768px)',
                        desktop: 'Desktop (1200px)'
                    };
                    return labels[this.activeViewport];
                },
                
                setViewport(viewport) {
                    this.activeViewport = viewport;
                },
                
                generateCSS() {
                    let css = `.layout-container {\n  ${this.getLayoutStyle().replace(/; /g, ';\n  ')}\n}`;
                    
                    if (this.display === 'flex') {
                        css += '\n\n.layout-item {\n  flex: 1;\n  min-width: 0;\n}';
                    }
                    
                    return css;
                },
                
                copyCSS() {
                    const css = this.generateCSS();
                    navigator.clipboard.writeText(css).then(() => {
                        // You could add a toast notification here
                        alert('CSS copied to clipboard!');
                    });
                }
            }
        }
    </script>
    @endpush

</x-gt-app-layout>
