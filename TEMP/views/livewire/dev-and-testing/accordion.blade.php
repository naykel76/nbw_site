<div>

    <h2></h2>
    <a href="{{ route('docs.jtb.components.accordion') }}">JTB Accordion CSS Only Accordion</a>

    <h2>(Alpine) Simple independent accordion with open and close using x-text</h2>
    <section>
        <div x-data="{ expanded: true, title: 'Accordion Title', body: 'This is the accordion body' }" class="bx">

            <h3>
                <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                    <span x-text="title"></span>
                    <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="fw-9">&plus;</span>
                </button>
            </h3>

            <div x-text="body" x-show="expanded"> </div>

        </div>

        <x-markdown class="-ml-7">
            @verbatim
                ```
                <div x-data="{ expanded: true, title: 'accordion title', body: 'accordion body' }" class="bx">

                    <h3>
                        <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between va-c w-full">
                            <span x-text="title"></span>
                            <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
                            <span x-show="!expanded" aria-hidden="true" class="fw-9">&plus;</span>
                        </button>
                    </h3>

                    <div x-text="body" x-show="expanded"> </div>

                </div>
            @endverbatim
        </x-markdown>
    </section>

    <h2>Hard coded array of objects</h2>

    <section>
        <div x-data="{ active: 0, items: [{ id: 1, title: 'Question 1' }, { id: 2, title: 'Question 2' }] }">

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

    </section>

    <hr>

    <h2>$data array from Livewire</h2>

    <x-markdown class="-ml-5">
        @verbatim
            ```
            public $data = [
            ['title' => 'Accordion item one', 'body' => 'Accordion one body'],
            ['title' => 'Accordion item two', 'body' => 'Accordion two body'],
            ];
        @endverbatim
    </x-markdown>

    <div x-data="{ active: 10, items: $wire.get('data') }">

        <template x-for="(item, index) in items" :key="index">

            <div x-data="{
                get expanded() { return this.active === this.index },
                set expanded(value) { this.active = value ? this.index : null },
            }" role="region" class="bx">

                <h3>
                    <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between w-full tal">
                        <span x-text="item.title"></span>
                        <span x-show="expanded" aria-hidden="true" class="fw-9"><span class="txt-muted txt-xl">&minus;</span></span>
                        <span x-show="!expanded" aria-hidden="true" class="fw-9"><span class="txt-muted txt-xl">&plus;</span></span>
                    </button>
                </h3>

                <div x-text="item.body" x-show="expanded"></div>

            </div>

        </template>

    </div>

    <hr>

    <h2>Hard Coded Independent Accordion Example</h2>

    <div x-data="{ active: 1 }" class="space-y-4">
        <div x-data="{
            id: 1,
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" role="region" class="bx pxy-1">
            <h3>
                <button @click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between w-full tal">
                    <span>Accordion #1</span>
                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                </button>
            </h3>

            <div x-show="expanded" x-collapse>
                <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam quod natus deleniti architecto eaque consequuntur ex, illo neque iste repellendus modi, quasi ipsa commodi saepe? Provident ipsa nulla earum.</div>
            </div>
        </div>

        <div x-data="{
            id: 2,
            get expanded() { return this.active === this.id },
            set expanded(value) { this.active = value ? this.id : null },
        }" role="region" class="bx pxy-1">
            <h3>
                <button @click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between w-full tal">
                    <span>Accordion #2</span>
                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                </button>
            </h3>

            <div x-show="expanded" x-collapse>
                <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam quod natus deleniti architecto eaque consequuntur ex, illo neque iste repellendus modi, quasi ipsa commodi saepe? Provident ipsa nulla earum.</div>
            </div>
        </div>
    </div>

    <h2>Independent loop???</h2>
    <div x-data="{
        id: 1,
        get expanded() { return this.active === this.id },
        set expanded(value) { this.active = value ? this.id : null },
    }" role="region" class="bx pxy-1">
        <h3>
            <button @click="expanded = !expanded" :aria-expanded="expanded" class="flex space-between w-full tal">
                <span>Accordion #1</span>
                <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
            </button>
        </h3>

        <div x-show="expanded" x-collapse>
            <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam quod natus deleniti architecto eaque consequuntur ex, illo neque iste repellendus modi, quasi ipsa commodi saepe? Provident ipsa nulla earum.</div>
        </div>
    </div>
</div>
