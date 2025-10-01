# Accordion

- [Introduction](#introduction)
    - [Styling the Accordion](#styling-the-accordion)
- [Alpine Accordion](#alpine-accordion)
    - [Standalone Accordion](#standalone-accordion)
- [CSS Accordion](#css-accordion)
    - [Standalone Accordion (Checkbox Method)](#standalone-accordion-checkbox-method)
    - [Accordion Group (Radio Button Method)](#accordion-group-radio-button-method)
- [Alpine Accordion](#alpine-accordion-1)
- [(WIP)](#wip)

## Introduction

There are two types of accordion components available in the JTB UI Kit:

1. **Basic CSS and HTML Accordion**: This type uses only CSS and HTML to create the accordion effect.
2. **Alpine.js Accordion**: This type uses Alpine.js to enhance the accordion functionality.

### Styling the Accordion

The following classes are used to style the accordion components:

- `accordion`: This class is used to style the accordion container and can be applied to both CSS and Alpine.js accordions.
- `accordion-title`: This class is used to style the title of the accordion, including the icon that is used to show and hide the content.
- `accordion-content`: This class should only be used in the CSS version of the accordion as it is used to show and hide the content of the accordion.

**Note:**

- The `accordion-content` class is specific to the CSS version and should not be used with the Alpine.js accordion.
- All other styles can be applied to either the CSS or Alpine.js accordion to style the accordion as needed.

## Alpine Accordion

### Standalone Accordion

<div x-data="{ expanded: false }" class="accordion">
    <div x-on:click="expanded = !expanded" x-bind:class="expanded ? 'active' : ''" class="accordion-title" x-transition>
        Standalone Accordion Title (Alpine.js)
    </div>
    <div x-show="expanded" x-collapse class="pxy-1" x-transition>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
    </div>
</div>

```html
<div x-data="{ expanded: true }" class="accordion">
    <div x-on:click="expanded = !expanded" x-bind:class="expanded ? 'active' : ''" class="accordion-title" x-transition>
        <!-- title -->
    </div>
    <div x-show="expanded" x-collapse class="pxy-1" x-transition>
        <!-- content -->
    </div>
</div>
```

## CSS Accordion

### Standalone Accordion (Checkbox Method)

The checkbox method uses hidden checkbox inputs and labels for each tab. Selecting a tab
checks the corresponding checkbox, allowing multiple tabs to be open simultaneously.

The `accordion` class provides the basic styles and functionality. Additional styling can
be applied using utility classes.

```html +parse
<x-gt-alert type="warning">
<b>NOTE: </b> Each accordion must have a unique <code>id</code> to function correctly
</x-gt-alert>
```

<div class="accordion">
    <input type="checkbox" id="abc">
    <label class="accordion-title" for="abc"> Standalone Accordion Title (CSS Checkbox)</label>
    <div class="accordion-content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
    </div>
</div>

```html
<div class="accordion">
    <input type="checkbox" id="xyz">
    <label class="accordion-title" for="xyz"> 
        <!-- title -->
    </label>
    <div class="accordion-content">
        <!-- content -->
    </div>
</div>
```

### Accordion Group (Radio Button Method)

The radio button method uses hidden radio inputs and labels for each tab. Selecting a tab
checks the corresponding radio button, allowing only one tab to be open at a time.

```html +parse
<x-gt-alert type="warning">
<b>NOTE: </b> Each accordion in the group must have the same <code>name</code> attribute function correctly.
</x-gt-alert>
```

<div class="accordion">
    <input type="radio" id="accordion-1" name="accordion-radio-group">
    <label class="accordion-title" for="accordion-1">Accordion Title #1</label>
    <div class="accordion-content">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, facilis.
    </div>
</div>
<div class="accordion">
    <input type="radio" id="accordion-2" name="accordion-radio-group">
    <label class="accordion-title" for="accordion-2">Accordion Title #2</label>
    <div class="accordion-content">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
    </div>
</div>

```html
 <div class="accordion">
    <input type="radio" id="accordion-1" name="accordion-radio-group">
    <label class="accordion-title" for="accordion-1">...</label>
    <div class="accordion-content">...</div>
</div>
<div class="accordion">
    <input type="radio" id="accordion-2" name="accordion-radio-group">
    <label class="accordion-title" for="accordion-2">...</label>
    <div class="accordion-content">...</div>
</div>
```

## Alpine Accordion 


## (WIP)

<div x-data="{ active: 1, items: [{ id: 1, title: 'Accordion Title #1' }, { id: 2, title: 'Accordion Title #2' }] }">
    <template x-for="{ id, title } in items" :key="id">
        <div x-data="{
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" role="region" class="accordion">
            <h3 class="accordion-title">
                <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                    <span x-text="title"></span>
                    <span x-show="expanded" aria-hidden="true" class="fw-9">−</span>
                    <span x-show="!expanded" aria-hidden="true" class="fw-9">+</span>
                </button>
            </h3>
            <div class="accordion-body" x-show="expanded">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, laborum.
            </div>
        </div>
    </template>
</div>

```html
<div x-data="{ active: 1, items: [{ id: 1, title: 'Accordion Title #1' }, { id: 2, title: 'Accordion Title #2' }] }">
    <template x-for="{ id, title } in items" :key="id">
        <div x-data="{
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" role="region" class="accordion">
            <h3 class="accordion-title">
                <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                    <span x-text="title"></span>
                    <span x-show="expanded" aria-hidden="true" class="fw-9">−</span>
                    <span x-show="!expanded" aria-hidden="true" class="fw-9">+</span>
                </button>
            </h3>
            <div class="accordion-body" x-show="expanded">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, laborum.
            </div>
        </div>
    </template>
</div>
```

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