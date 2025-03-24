# Alpine Tips, Tricks and Techniques

<!-- TOC -->

- [x-for](#x-for)
        - [Iterate through hard coded array with single values](#iterate-through-hard-coded-array-with-single-values)
        - [Iterate through livewire multi-dimension array](#iterate-through-livewire-multi-dimension-array)
        - [Iterate through livewire multi-dimension array and access indexes](#iterate-through-livewire-multi-dimension-array-and-access-indexes)
- [x-text](#x-text)
        - [`x-ref` with single object](#x-ref-with-single-object)
        - [`x-ref` with single object defined in `script`](#x-ref-with-single-object-defined-in-script)
        - [`x-ref` with array of multiple objects and loop using `x-for`](#x-ref-with-array-of-multiple-objects-and-loop-using-x-for)
        - [`x-ref` with array of multiple objects and loop using `x-for` defined in `script`](#x-ref-with-array-of-multiple-objects-and-loop-using-x-for-defined-in-script)
- [Data Binding](#data-binding)
    - [Accordion (Single Item)](#accordion-single-item)
    - [Accordion (Multiple Items)](#accordion-multiple-items)
- [Trouble Shooting](#trouble-shooting)
    - [Multi-dimension Array](#multi-dimension-array)

<!-- /TOC -->

## x-for

#### Iterate through hard coded array with single values

```html
<ul x-data="{ colors: ['Red', 'Orange', 'Yellow'] }">
    <template x-for="color in colors">
        <li x-text="color"></li>
    </template>
</ul>
```

## x-text

#### `x-ref` with single object

    <div x-data="{
        employee: {
            name: 'John Doe',
            email: 'john@example.com',
            age: '25',
        }}"
        class="space-y-0 my">
        <p x-text="employee.name"></p>
        <p x-text="employee.email"></p>
        <p x-text="employee.age"></p>
    </div>

#### `x-ref` with single object defined in `script`

    <div x-data="employee" class="space-y-0 my">
        <p x-text="name"></p>
        <p x-text="email"></p>
        <p x-text="age"></p>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('employee', () => ({
                name: 'John Doe',
                email: 'john@example.com',
                age: '25',
            }));
        });
    </script>

#### `x-ref` with array of multiple objects and loop using `x-for`

    <ul x-data="employee">
        <template x-for="person in people" :key="person.id">
            <li x-text="person.name"></li>
        </template>
    </ul>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('employee', () => ({
            people: [
                    { id: 1, name: 'Bill' },
                    { id: 2, name: 'Mike' },
                    { id: 3, name: 'Sue' },
                ],
            }));
        });
    </script>

#### `x-ref` with array of multiple objects and loop using `x-for` defined in `script`

## Data Binding

```html
<div x-data="{myValue: 'some value', myOtherValue: 'some other value'}">
    <span x-text="myValue"></span>,
    <span x-text="myOtherValue"></span>,
</div>
```


```html
<div x-data="{
        myValue: 'this is a hard coded value!',
        {{-- define a function --}}
        test() { alert('this worked!') }
    }"
    {{-- initialize and run function --}}
    x-init="test()">

    <div x-text="myValue"></div>
</div>
```


```html
<div x-data="console.log('Hello from Alpine!'), console.log('Hello again from Alpine!')"></div>
```





### Accordion (Single Item)

https://vimeo.com/617233130/3f5a355c0b

**Tip:** bind the `aria-expanded` attribute to the `expanded` property to toggle true and false.

``` html
<div x-data="{expanded: false }" role="region" class="bx">
    <div>
        <button x-on:click="expanded = !expanded"
            aria-expanded="true/false" class="flex items-center space-between w-full">
            <span>Question 1</span>
            <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
            <span x-show="!expanded" aria-hidden="true" class="fw-9">&minus;</span>
        </button>
    </div>

    <div x-show="expanded"></div>
</div>
```

### Accordion (Multiple Items)

**Tip:** bind the `aria-expanded` attribute to the `expanded` property to toggle true and false.

``` html
<div x-data="{expanded: false }" role="region" class="bx">
    <div>
        <button x-on:click="expanded = !expanded"
            aria-expanded="true/false" class="flex items-center space-between w-full">
            <span>Question 1</span>
            <span x-show="expanded" aria-hidden="true" class="fw-9">&minus;</span>
            <span x-show="!expanded" aria-hidden="true" class="fw-9">&minus;</span>
        </button>
    </div>

    <div x-show="expanded"></div>
</div>
```

The js way

``` html
<div>
    <div x-data="{ active: 1, items: [{ id: 1, title: 'Question 1' }, { id: 2, title: 'Question 2' }] }">

        <template x-for="{ id, title } in items" :key="id">

            <div x-data="{
                get expanded() { return this.active === this.id },
                set expanded(value) { this.active = value ? this.id : null },
            }" role="region">
                <div>
                    <button x-on:click="expanded = !expanded" :aria-expanded="expanded" class="">
                        <span x-text="title"></span>
                        <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                        <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                    </button>
                </div>

                <div x-show="expanded" x-collapse>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, laborum.
                </div>
            </div>

        </template>

    </div>
```







### Multi-dimension Array

```php
public $items = [
    ['colour' => 'green', 'size' => 'small'],
    ['colour' => 'yellow', 'size' => 'medium'],
    ['colour' => 'pink', 'size' => 'large']
];
```
