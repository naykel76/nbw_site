# Alpine Accordion

<div>
    <div x-data="{ active: 1, items: [{ id: 1, title: 'Question 1' }, { id: 2, title: 'Question 2' }] }">
        <template x-for="{ id, title } in items" :key="id">
            <div x-data="{
                get expanded() { return this.active === this.id },
                set expanded(value) { this.active = value ? this.id : null },
            }" role="region" class="bx">
                <h3>
                    <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                        <span x-text="title"></span>
                        <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
                        <span x-show="!expanded" aria-hidden="true" class="fw-9">&plus;</span>
                    </button>
                </h3>
                <div x-show="expanded">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, laborum.
                </div>
            </div>
        </template>
    </div>
</div>

```html
<div x-data="{ active: 1, items: [{ id: 1, title: 'Question 1' }, { id: 2, title: 'Question 2' }] }">
    <template x-for="{ id, title } in items" :key="id">
        <div x-data="{
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" role="region" class="bx">
            <h3>
                <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                    <span x-text="title"></span>
                    <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="fw-9">&plus;</span>
                </button>
            </h3>
            <div x-show="expanded">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, laborum.
            </div>
        </div>
    </template>
</div>
```
