# Menu

<p class="lead">Navigation menu component with flexible layouts and icon support.</p>

- [Usage](#usage)
    - [Pattern 1: List-based (recommended)](#pattern-1-list-based-recommended)
    - [Pattern 2: Flat structure](#pattern-2-flat-structure)
- [Menu With Icons](#menu-with-icons)
- [Menu Title](#menu-title)
- [Utilities Only](#utilities-only)

**Features:**
- Automatic icon detection and alignment
- Nested submenu support with proper indentation
- Works with or without `<ul>` structure
- Hover, active, and focus states included
- Minimal default styling for maximum flexibility

## Usage

Menu layouts created using the `menu` class.

**Note** the menu class does not add background or border styles by default, these
should be added via utility classes or class overrides as needed.

Two supported patterns:

### Pattern 1: List-based (recommended)
```html +torchlight-html
<nav class="menu">
    <ul>
        <li><a href="#">Item</a></li>
        <li>
            <button>Parent</button>
            <ul>
                <li><a href="#">Child</a></li>
            </ul>
        </li>
    </ul>
</nav>
```

### Pattern 2: Flat structure
```html +torchlight-html
<nav class="menu">
    <a href="#">Item</a>
    <div>
        <button>Parent</button>
        <ul>
            <li><a href="#">Child</a></li>
        </ul>
    </div>
</nav>
```


<nav class="menu w-20 pxy bdr-2 bdr-blue rounded-075">
    <ul>
        <li>
            <a href="#">
                <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                Item
            </a>
        </li>
        <li x-data="{ open: true }">
            <button x-on:click="open = ! open">
                <span>
                    <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                    Parent <span x-text="open ? '(opened)' : '(closed)'"></span>
                </span>
                <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="m6 15 6-6 6 6" />
                </svg>
            </button>
            <!-- what is the best way to get a nice dropdown transition here -->
            <ul x-show="open" x-collapse>
                <li> <a href="#"> Child Item </a> </li>
                <li> <a href="#"> Child Item </a> </li>
                <li> <a href="#"> Child Item </a> </li>
            </ul>
        </li>
    </ul>
</nav>








**Example**

<nav class="menu w-20 pxy bdr-2 bdr-blue rounded-075">
    <div class="menu-title">Menu Class</div>
    <ul>
        <li>
            <a href="#"> Item </a>
        </li>
        <li>
            <a href="#"> Active </a>
        </li>
        <li>
            <button>
                Parent Toggle (Opened)
                <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="m6 15 6-6 6 6" />
                </svg>
            </button>
            <ul>
                <li>
                    <a href="#"> Child Item </a>
                </li>
                <li>
                    <a href="#"> Child Item </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                Parent Link (Closed)
                <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </a>
        </li>
    </ul>
</nav>

## Menu With Icons

<nav class="menu w-20 pxy bdr-2 bdr-blue rounded-075">
    <div class="menu-title">Menu Class With Icons</div>
    <ul>
        <li>
            <a href="#">
                <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                Item
            </a>
        </li>
        <li>
            <a href="#">
                <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                Active
            </a>
        </li>
        <li>
            <button>
                <span>
                    <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                    Parent Toggle (Opened)
                </span>
                <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="m6 15 6-6 6 6" />
                </svg>
            </button>
            <ul>
                <li>
                    <a href="#"> Child Item </a>
                </li>
                <li>
                    <a href="#"> Child Item </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span>
                    <svg class="bdr bdr-blue bg-stripes-blue"></svg>
                    Parent Link (Closed)
                </span>
                <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </a>
        </li>
    </ul>
</nav>

When using icons with a parent item (no the dropdown indicator), wrap the icon and text in a `<span>`

<div class="flex justify-between bdr bdr-gray-300 pxy-05 rounded-025 w-24">
    <div class="flex gap-075 outline outline-dashed outline-2">
        <div class="wh-1.5 bdr-2 bdr-pink bg-stripes-pink"></div>
        <div class="w-10 bdr-2 bdr-pink bg-stripes-pink"></div>
    </div>
    <div class="wh-1.5 bdr-2 bdr-pink bg-stripes-pink"></div>
</div>

```html +torchlight-html
<button>
    <span>
        <svg></svg>
        Parent
    </span>
    <svg><!-- dropdown indicator --></svg>
</button>
```

**Note:** The menu automatically detects icons and adjusts submenu indentation accordingly.

## Menu Title

Add section titles with the `.menu-title` class:

```html +torchlight-html
<nav class="menu">
    <div class="menu-title">Section One</div>
    <ul><!-- items --></ul>
    
    <div class="menu-title">Section Two</div>
    <ul><!-- items --></ul>
</nav>
```

## Utilities Only

For full control, build menus using only utility classes:

<div class="grid sm:cols-2 gap">
    <h4 class="col-span-2">Example</h4>
    <nav class="bx pxy-1 bdr bdr-pink w-18">
        <ul class="txt-sm space-y-1 green">
            <li>
                <a href="#" class="flex items-center gap-075 px-075 py-05 rounded-lg txt-green-900 hover:bg-gray-100">
                    <svg class="wh-1.25 bdr bdr-pink bg-stripes-pink"></svg>
                    Item
                </a>
            </li>
            <li>
                <a href="#" class="bg-gray-200 flex items-center gap-075 px-075 py-05 rounded-lg txt-green-900">
                    <svg class="wh-1.25 bdr bdr-pink bg-stripes-pink"></svg>
                    Active
                </a>
            </li>
            <li>
                <button
                    class="flex items-center justify-between w-full px-075 py-05 rounded-lg txt-green-900 hover:bg-gray-100">
                    <span class="flex items-center gap-075">
                        <svg class="wh-1.25 bdr bdr-pink bg-stripes-pink"></svg>
                        Parent Toggle (Opened)
                    </span>
                    <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="m6 15 6-6 6 6" />
                    </svg>
                </button>
                <ul class="pl-2">
                    <li>
                        <a href="#"
                            class="flex items-center gap-075 px-075 py-05 rounded-lg txt-green-900 hover:bg-gray-100">
                            Child Item
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center gap-075 px-075 py-05 rounded-lg txt-green-900 hover:bg-gray-100">
                            Child Item
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-between w-full gap-075 px-075 py-05 rounded-lg txt-green-900 hover:bg-gray-100">
                    <span class="flex items-center gap-075">
                        <svg class="wh-1.25 bdr bdr-pink bg-stripes-pink"></svg>
                        Parent Link (Closed)
                    </span>
                    <svg class="wh-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>

