# Things That Open and Close

- [Simple Toggle](#simple-toggle)
- [Transition and Styles](#transition-and-styles)
  - [Multiple Items (single open)](#multiple-items-single-open)

## Simple Toggle

```html +parse
<div class="flex space-x">
    <div x-data="{ open: false }">
        <button class="btn mb-05 w-10" x-on:click="open = ! open">
            <span x-text="open ? 'Click to Close' : 'Click to Open'"></span>
        </button>
        <div x-show="open">
            Hey there!
        </div>
    </div>
    
    <div x-data="{ open: false }" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
        <button class="btn mb-05 w-10" x-on:click="open = ! open">
            <span x-text="open ? 'Move Away' : 'Hover to Open'"></span>
        </button>
        <div x-show="open">
            Hey there!
        </div>
    </div>
</div>
```

Optionally, you can add `x-on:mouseenter` and `x-on:mouseleave`  attributes in the parent element to
switch the open state when hovering.

```html
<div x-data="{ open: false }">
    <!-- Toggle -->
    <button class="btn blue" x-on:click="open = ! open">
        <span x-text="open ? 'Close' : 'Open'"></span>
    </button>

    <div x-show="open">
       <!-- Content -->
    </div>
</div>
```

## Transition and Styles

Add `x-collapse` to the `x-show` directive to animate the opening and closing of the accordion.

```html +parse
<div class="flex space-x">
    <div x-data="{ open: false }">
        <button class="btn blue mb-05" x-on:click="open = ! open">
            <span x-text="open ? 'Click to Close' : 'Click to Open'" class="w-6 mr-075"></span>
            <x-gt-icon name="chevron-down" class="wh-1" x-cloak x-show="!open" />
            <x-gt-icon name="chevron-up" class="wh-1" x-cloak x-show="open" />
        </button>
        <div x-show="open" x-transition class="pxy-1 bx">
            Hey there!
        </div>
    </div>
    
    <div x-data="{ open: false }" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
        <button class="btn blue mb-05" x-on:click="open = ! open">
            <span x-text="open ? 'Move Away' : 'Hover to Open'" class="w-6 mr-075"></span>
            <x-gt-icon name="chevron-down" class="wh-1" x-cloak x-show="!open" />
            <x-gt-icon name="chevron-up" class="wh-1" x-cloak x-show="open" />
        </button>
        <div x-show="open" x-transition class="pxy-1 bx">
            Hey there!
        </div>
    </div>
</div>
```

### Multiple Items (single open)

```html +parse
<div x-data="{ active: 0, }" class="space-y">
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
    <div x-data="{
        id: 2,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item Two</span>
            <span x-show="expanded">Close Item Two</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
</div>
```
```html 
<div x-data="{ active: 0, }" class="space-y">
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
    <div x-data="{
        id: 2,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded"
            :aria-expanded="expanded" class="btn primary">
            <span x-show="!expanded">Open Item Two</span>
            <span x-show="expanded">Close Item Two</span>
        </button>
        <div x-show="expanded">
            Hey there!
        </div>
    </div>
</div>
```