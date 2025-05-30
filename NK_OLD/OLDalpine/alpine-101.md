# AlpineJS 101

- [Things to Know](#things-to-know)
- [Initialize AlpineJS with `x-data`](#initialize-alpinejs-with-x-data)
- [Hook into the `x-init` event](#hook-into-the-x-init-event)
- [Extract `x-data` to a separate script tag](#extract-x-data-to-a-separate-script-tag)
    - [`alpine:init`](#alpineinit)
        - [Why use `alpine:init`?](#why-use-alpineinit)
        - [What happens without `alpine:init`?](#what-happens-without-alpineinit)
- [Basic Inline Example](#basic-inline-example)
- [Seperate Script Example](#seperate-script-example)
    - [Step 1: Basic Setup](#step-1-basic-setup)
    - [Step 2: Define a Simple Component](#step-2-define-a-simple-component)
    - [Step 3: Add Computed Property for Greeting](#step-3-add-computed-property-for-greeting)
    - [Step 4: Dynamic Name Update with Input](#step-4-dynamic-name-update-with-input)

## Things to Know


## Initialize AlpineJS with `x-data`

Everything in Alpine starts with the `x-data` directive. **`x-data`** holds all the
**data** and **methods** for the component.

You can initialize AlpineJS by adding the `x-data` attribute to an element. The value of
the `x-data` attribute is an object that defines the component’s initial state (data) and
behavior (methods).

```html
<div 
    x-data="{
        name: '', 
        setName(name) { this.name = name },
        get greeting() { return `Hello, ${this.name}` },
    }"
>
</div>
```

## Hook into the `x-init` event

<a href="https://alpinejs.dev/directives/init"
target="blank">https://alpinejs.dev/directives/init</a>

The `x-init` directive allows you to hook into the initialisation phase of an AlpineJS
component. You can use `x-init` to run methods when the component is first initialized.

- The `x-init` directive is executed when the element is initialized.
- You can use it to run methods, set initial values, or trigger side effects like logging
  or fetching data.
  
```html
<div 
    x-data="{
        name: '', 
        setName(name) { this.name = name },
        get greeting() { return `Hello, ${this.name}` },
    }"
    x-init="setName('Mike'); console.log(greeting);"
>
</div>
```


## Extract `x-data` to a separate script tag

To keep your components clean and reusable, you can extract `x-data` into a separate
script using `Alpine.data` if its contents become too verbose or repetitive.

1. **Replace `x-data` contents** with the component name:

```html
<div x-data="greet"></div>
```

2. **Define the component** with `Alpine.data` inside the `alpine:init` event listener to
   ensure AlpineJS has fully loaded before registration:

```html
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) { this.name = name },
            get greeting() { return `Hello, ${this.name}` },
        }));
    });
</script>
```

### `alpine:init`

Use the `alpine:init` event to register custom components after AlpineJS has fully loaded.
This ensures proper timing for registration and prevents potential errors.

#### Why use `alpine:init`?

- **Timing**: Registers components after Alpine is ready.
- **Prevents errors**: Ensures Alpine's core is fully loaded before interacting with it.

#### What happens without `alpine:init`?

- Registering components before Alpine initializes can lead to errors or undefined
  behavior.




## Basic Inline Example

```html
<div 
    x-data="{
        name: '', 
        setName(name) { this.name = name },
        get greeting() { return `Hello, ${this.name}` },
    }"
    x-init="
        setName('Mike');
        console.log(greeting);
    "
>
    <span x-text="greeting"></span>
</div>
```

## Seperate Script Example

Here’s how you can build a custom Alpine component using the `alpine:init` event, step by
step. This approach registers custom components in the JavaScript and progressively adds
functionality.

Type your name in the input field to see the greeting message update dynamically.

<!-- leave this here so it is visible at the beginning -->
```html +parse
<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) {
                this.name = name;
            },
            get greeting() {
                return `Hello, ${this.name}!`;
            }
        }));
    });
</script>

<div x-data="greet" x-init="setName('Mike')" class="bx light mt space-y-05">
    <span x-text="greeting" class="txt-red my"></span>
    <div class="frm-row">
        <input x-model="name" placeholder="Enter your name" />
    </div>
</div>
```

### Step 1: Basic Setup

First, use `window.addEventListener('alpine:init', ...)` to ensure Alpine is fully loaded
before defining any custom components.

```html
<script>
    window.addEventListener('alpine:init', function() {
        // We'll define custom components here later
    });
</script>
```

### Step 2: Define a Simple Component

Now, let's define a simple component named `greet`. This component has a `name` property
and a `setName` method to modify the `name`.

```html
<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) {
                this.name = name;
            }
        }));
    });
</script>
```

### Step 3: Add Computed Property for Greeting

Next, let’s enhance the component by adding a computed property (`greeting`) that
generates a message based on the `name` property.

```html
<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) {
                this.name = name;
            },
            get greeting() {
                return `Hello, ${this.name}!`;
            }
        }));
    });
</script>
```

### Step 4: Dynamic Name Update with Input

Now, let’s make the `name` property dynamic by adding an input field that allows the user
to change the name. We’ll use `x-model` to bind the input field to the `name` property.

```html
<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('greet', () => ({
            name: '',
            setName(name) {
                this.name = name;
            },
            get greeting() {
                return `Hello, ${this.name}!`;
            }
        }));
    });
</script>

<!-- HTML Element -->
<div x-data="greet" x-init="setName('Mike')">
    <span x-text="greeting"></span>
    <input x-model="name" placeholder="Enter your name" />
</div>
```

**Explanation:**

- **`window.addEventListener('alpine:init', ...)`** ensures that Alpine is fully loaded
  before registering the custom component. This is crucial because registering components
  before Alpine is ready can cause errors.
  
- **`x-data="greet"`** in the HTML links to the custom component defined in the
  JavaScript, making the data and methods available for the element.

- **`x-init="setName('Mike')"`** is used to initialize the `name` with "Mike" when the
  component is first rendered, allowing you to see the greeting immediately.

- **`x-model="name"`** binds the input field to the `name` property, allowing the user to
  dynamically update the name, which automatically updates the greeting.

**Important Note:**

When you're using an arrow function to return an object in Alpine.js, you need to **wrap
the object in parentheses** `()` because JavaScript will interpret curly braces `{}` as a
function body, not an object.

So, the correct way is:

```js
Alpine.data('editor', (editorId) => ({
    content: 'this is some content'  // The parentheses make this an object
}));
```

**Wrapping it in `()` tells JavaScript that you're returning an object**. Without the
parentheses, it thinks you're trying to define a function block, which is why it doesn't
work.
