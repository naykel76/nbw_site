# Accordion


### Multiple Items (single open)

```html +parse
<div x-data="{ active: 1, }" class="space-y">
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">

        <button x-on:click="expanded =! expanded" class="pxy-1 flex space-between items-center bg-yellow-100 w-full">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
            <x-gt-icon x-show="!expanded" name="chevron-right" />
            <x-gt-icon x-show="expanded" name="chevron-down" />
        </button>
        <div x-show="expanded" class="mt-0 pxy bdr">
            Item one content ...
        </div>
    </div>

    <div x-data="{
        id: 2,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded" class="pxy-1 flex space-between items-center bg-yellow-100 w-full">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
            <x-gt-icon x-show="!expanded" name="chevron-right" />
            <x-gt-icon x-show="expanded" name="chevron-down" />
        </button>
        <div x-show="expanded" class="mt-0 pxy bdr">
            Item one content ...
        </div>
    </div>
</div>
```

```html
<div x-data="{ active: 1, }" class="space-y">
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">

        <button x-on:click="expanded =! expanded" class="pxy-1 flex space-between items-center bg-yellow-100 w-full">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
            <x-gt-icon x-show="!expanded" name="chevron-right" />
            <x-gt-icon x-show="expanded" name="chevron-down" />
        </button>
        <div x-show="expanded" class="mt-0 pxy bdr">
            Item one content ...
        </div>
    </div>

    <div x-data="{
        id: 2,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null }
    }">
        <button x-on:click="expanded =! expanded" class="pxy-1 flex space-between items-center bg-yellow-100 w-full">
            <span x-show="!expanded">Open Item One</span>
            <span x-show="expanded">Close Item One</span>
            <x-gt-icon x-show="!expanded" name="chevron-right" />
            <x-gt-icon x-show="expanded" name="chevron-down" />
        </button>
        <div x-show="expanded" class="mt-0 pxy bdr">
            Item one content ...
        </div>
    </div>
</div>
```

## Looping

```html
<div x-data="{ active:  }" class="space-y">
    @foreach ($items as $item)
        <div x-data="{
            id: {{ $item->id }},
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" class="accordion">
            <div x-on:click="expanded = !expanded" x-bind:class="expanded ? 'active' : ''" class="accordion-title items-center" x-transition>
                ...
            </div>
            <div x-show="expanded" x-collapse class="px-1" x-transition>
                ...
            </div>
        </div>
    @endforeach
</div>
```