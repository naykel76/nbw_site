# AlpineJS Basics

- [Initialize AlpineJS with `x-data`](#initialize-alpinejs-with-x-data)
- [Extract `x-data` to a separate script tag](#extract-x-data-to-a-separate-script-tag)
- [FAQ](#faq)
  - [When should the object be returned, and when should it not?](#when-should-the-object-be-returned-and-when-should-it-not)
  - [What is considered a complex component?](#what-is-considered-a-complex-component)


## Initialize AlpineJS with `x-data`

You can initialize AlpineJS by adding the `x-data` attribute to an element. The value of the
`x-data` attribute is an object that defines the data and methods for the component.

- In AlpineJS, when accessing the component's state, the data object is evaluated as a standard
  JavaScript object, where `this` refers to the data object itself.

```html
<div x-data="{
        name: '', 
        init() { this.name = 'Mike'; },
        get greeting() { return `Hello, ${this.name}`; },
    }"
>
    <!--  -->
</div>
```

## Extract `x-data` to a separate script tag

You can extract the `x-data` object to a separate script tag. This is useful when the `x-data`
object is large or complex.

```html
<div x-data="employee">
    <span x-text="name"></span>
</div>
```

The `Alpine.data()` function is used to define a new Alpine component. The first argument is the name
of the component, and the second argument is a function that returns the component's data object.

```html
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('employee', () => ({
            name: 'Mike',
        }));
    });
</script>
```

To initialize in Livewire you can wrap in the `@script` blade directive.

```html
@script
    <script>
        Alpine.data('greet', () => {
            name: '';
            return {
                init() {
                    this.name = 'Mike';
                },
            }
        });
    </script>
@endscript
```


## FAQ

### <question>When should the object be returned, and when should it not?</question>

**Without Return (Object Literal Notation)**: When you use the object literal notation `() =>
({})`, you're directly defining the data object that Alpine.js should use for the component. This
is a concise way to define simple components with a straightforward structure. It's useful for
components that don't need to perform complex initialization or use local variables outside the
scope of the data object.

```js
Alpine.data('greet', () => ({
    name: '',
    init() {
        this.name = 'Mike';
    }
}));
```

**With Return (Function Body)**: When you use a function body `() => { return { ... }; }`, it allows
you to execute some logic before returning the data object. This is useful for more complex
components where you might need to declare variables, perform calculations, or run some code before
defining the data object that Alpine.js will use.

```js
Alpine.data('chart', () => {
    // Complex initialization or variable declarations can go here.
    return {
        // The data object is returned explicitly after initialization.
        init() {
            // Initialization code for the component.
        },
        // More properties and methods...
    };
});
```

### <question>What is considered a complex component?</question>

A complex component is one that requires more than just simple data initialization. For example, if
you need to declare local variables, perform calculations, or run some code before defining the data
object. This would also include watching for changes in the component's state, handling events, or
any other logic that requires additional setup.