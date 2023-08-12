# Accordion

https://www.sliderrevolution.com/resources/css-accordion/

## Independent CSS Accordion (Checkbox Method)

The checkbox method enables users to include hidden checkbox input type and a label to each tab of
the accordion. When users select a tab in the accordion, they also check the corresponding
checkbox added to it. In this method, users can open multiple accordion tabs at the same time.

<div class="bx danger-light">
    <div class="flex">
        <svg class="icon wh-4 mr-2"> <use xlink:href="/svg/naykel-ui.svg#warning"></use> </svg>
        <div>
            <div class="bx-title">IMPORTANT</div>
            <p class="mt-05">Each accordion must have a unique id to function correctly</p>
        </div>
    </div>
</div>

### Usage

<div class="accordion bdr">
    <input type="checkbox" id="xyz">
    <label class="accordion-title" for="xyz"> Accordion Title </label>
    <div class="accordion-content">
        Accordion content
    </div>
</div>

```html
<div class="accordion">
    <input type="checkbox" id="xyz">
    <label class="accordion-title" for="xyz"> ... </label>
    <div class="accordion-content">
        <p> ... </p>
    </div>
</div>
```

## CSS Accordion Group (Radio Button Method)

The radio button method enables users to include a hidden radio input type and a label to each tab
of the accordion. When users select a tab in the accordion, they also check the radio button added
to it. In this method, users can only open one tab at a time.

<div class="bx danger-light">
    <div class="flex">
        <svg class="icon wh-4 mr-2"> <use xlink:href="/svg/naykel-ui.svg#warning"></use> </svg>
        <div>
            <div class="bx-title">IMPORTANT</div>
            <p class="mt-05">Each accordion in the group must have the same 'name' attribute function correctly</p>
        </div>
    </div>
</div>

### Usage

<div class="accordion">
    <input type="radio" id="rd1" name="rd">
    <label for="rd1">Accordion Title #1</label>
    <div class="accordion-content">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, facilis.
    </div>
</div>
<div class="accordion">
    <input type="radio" id="rd2" name="rd">
    <label for="rd2">Accordion Title #2</label>
    <div class="accordion-content">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
    </div>
</div>
<div class="accordion">
    <input type="radio" id="rd3" name="rd">
    <label for="rd3" class="tab-close">Close others &times;</label>
</div>

### Adding Style

<div>
    <div class="bdr accordion">
        <input type="checkbox" id="chck1">
        <label class="accordion-title" for="chck1">Accordion Title #1</label>
        <div class="accordion-content">
            <p class="pxy">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus quisquam, veniam adipisci placeat at sit. Dignissimos soluta harum illo saepe iusto aspernatur sunt neque beatae tempore corporis nobis suscipit deserunt facilis totam, perferendis atque sapiente at ut ratione? Unde minima placeat animi vitae aliquid quo! Ducimus commodi maxime iste deserunt?</p>
        </div>
    </div>
    <div class="bdr bdr-t-0 accordion">
        <input type="checkbox" id="chck2">
        <label class="accordion-title" for="chck2">Accordion Title #2</label>
        <div class="accordion-content">
            <p class="pxy">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus quisquam, veniam adipisci placeat at sit. Dignissimos soluta harum illo saepe iusto aspernatur sunt neque beatae tempore corporis nobis suscipit deserunt facilis totam, perferendis atque sapiente at ut ratione? Unde minima placeat animi vitae aliquid quo! Ducimus commodi maxime iste deserunt?</p>
        </div>
    </div>
</div>

# Alpine Accordion

<div>
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

wA&G1UsbzdRH
