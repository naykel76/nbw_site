# Alpine Tips, Tricks and Techniques

<!-- MarkdownTOC -->

- [x-for](#x-for)
        - [Iterate through hard coded array with single values](#iterate-through-hard-coded-array-with-single-values)
        - [Iterate through livewire multi-dimension array](#iterate-through-livewire-multi-dimension-array)
        - [Iterate through livewire multi-dimension array and access indexes](#iterate-through-livewire-multi-dimension-array-and-access-indexes)
- [x-ref](#x-ref)
- [x-text](#x-text)
        - [`x-ref` with single object](#x-ref-with-single-object)
        - [`x-ref` with single object defined in `script`](#x-ref-with-single-object-defined-in-script)
        - [`x-ref` with array of multiple objects and loop using `x-for`](#x-ref-with-array-of-multiple-objects-and-loop-using-x-for)
        - [`x-ref` with array of multiple objects and loop using `x-for` defined in `script`](#x-ref-with-array-of-multiple-objects-and-loop-using-x-for-defined-in-script)
- [Data Binding](#data-binding)
- [x-on DOM Events](#x-on-dom-events)
- [Things That Open and Close](#things-that-open-and-close)
    - [Accordion \(Single Item\)](#accordion-single-item)
    - [Accordion \(Multiple Items\)](#accordion-multiple-items)
- [Trouble Shooting](#trouble-shooting)
- [Sample Data](#sample-data)
    - [Multi-dimension Array](#multi-dimension-array)

<!-- /MarkdownTOC -->

<a id="x-for"></a>
## x-for

<a id="iterate-through-hard-coded-array-with-single-values"></a>
#### Iterate through hard coded array with single values

```html
<ul x-data="{ colors: ['Red', 'Orange', 'Yellow'] }">
    <template x-for="color in colors">
        <li x-text="color"></li>
    </template>
</ul>
```

<a id="iterate-through-livewire-multi-dimension-array"></a>
#### Iterate through livewire multi-dimension array

    <div x-data="{ items: @entangle('items') }">
        <template x-for="item in items">
            <div class="my">
                Colour: <span x-text="item.colour"></span><br />
                Size: <span x-text="item.size"></span><br />
            </div>
        </template>
    </div>

<a id="iterate-through-livewire-multi-dimension-array-and-access-indexes"></a>
#### Iterate through livewire multi-dimension array and access indexes

If you need to access the index of each item in the iteration, you can do so using the `([item], [index]) in [items]` syntax like so:

    <div x-data="{ items: @entangle('items') }">
        <template x-for="(item, index) in items" :key="index">
            <div class="my">
                Colour: <span x-text="item.colour"></span><br />
                Size: <span x-text="item.size"></span><br />
            </div>
        </template>
    </div>


<a id="x-text"></a>
## x-text

<a id="x-ref-with-single-object"></a>
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

<a id="x-ref-with-single-object-defined-in-script"></a>
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

<a id="x-ref-with-array-of-multiple-objects-and-loop-using-x-for"></a>
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

<a id="x-ref-with-array-of-multiple-objects-and-loop-using-x-for-defined-in-script"></a>
#### `x-ref` with array of multiple objects and loop using `x-for` defined in `script`

<a id="data-binding"></a>
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


<a id="x-on-dom-events"></a>
## x-on DOM Events

`x-on:click.window` listening for a click event anywhere in the window then set `show = true`

```html
<div x-data="{ show: false }" x-on:click.window="show = true;" x-show="show">
    ...
</div>
```

`x-on:my-event.window` listining for an emitted event called 'my-event' then set `show = true`

<div x-data="{ show: false }" x-on:my-event.window="show = true" x-show="show">
    ...
</div>


Livewire allows you to fire browser window events using `dispatchBrowserEvent()` function.

```php
$this->dispatchBrowserEvent('my-event', 'Notification message!');
```

**Q. how can an event be dispatched using vanilla javascript?**

---



<a id="accordion-single-item"></a>
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

<a id="accordion-multiple-items"></a>
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



<a id="trouble-shooting"></a>
## Trouble Shooting

**Problem:** `x-for` not displaying all the elements <br>
Make sure the `<template>` has a root element.




<a id="multi-dimension-array"></a>
### Multi-dimension Array

```php
public $items = [
    ['colour' => 'green', 'size' => 'small'],
    ['colour' => 'yellow', 'size' => 'medium'],
    ['colour' => 'pink', 'size' => 'large']
];
```
