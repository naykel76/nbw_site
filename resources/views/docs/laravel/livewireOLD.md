# Livewire Tips and Tricks

<!-- MarkdownTOC -->

- [Data Binding](#data-binding)
        - [How can I bind json values?](#how-can-i-bind-json-values)
- [Components](#components)
    - [Full Page Components](#full-page-components)
    - [Sibling components in a loop](#sibling-components-in-a-loop)
    - [Register Package Livewire Components](#register-package-livewire-components)
- [Events](#events)
    - [Firing Events](#firing-events)
    - [Event Listeners](#event-listeners)
    - [Scoping Events](#scoping-events)
        - [Scoping To Components By Name (emitTo)](#scoping-to-components-by-name-emitto)
- [Tips and Tricks](#tips-and-tricks)
        - [Make a child component "reactive" based on parent changes.](#make-a-child-component-reactive-based-on-parent-changes)
    - [Fire a method from another component?](#fire-a-method-from-another-component)
- [Update/Refresh Techniques](#updaterefresh-techniques)
    - [Refresh property from render method](#refresh-property-from-render-method)
    - [Refresh property from class](#refresh-property-from-class)
    - [Refresh Components](#refresh-components)

<!-- /MarkdownTOC -->


<td><div wire:dblclick="test()">Double Click Me</div>
<td><div wire:click="test()">Double Click Me</div>


## Data Binding

https://laravel-livewire.com/docs/2.x/properties#data-binding

`defer` Defers syncing the input with the Livewire property until an "action" or the next network request is performed.

```
@entangle($attributes->wire('model')).defer
```

`wire:ignore` is a directive provided by the Livewire framework. It is used to exclude an element and its children from being processed by Livewire. This means that the element will not be able to trigger any server-side actions or have its data binded to component properties, and also it will not be affected by any component's updates, thus the component will not be able to update the element. This can be useful when you have an element that is managed by a different library or framework and you don't want Livewire to interfere with it.

`lazy` is used to load the data in the background after the initial load of the page, improving the overall performance of your page.

#### How can I bind json values?


<a id="components"></a>
## Components




<a id="sibling-components-in-a-loop"></a>
### Sibling components in a loop

https://laravel-livewire.com/docs/2.x/nesting-components#keyed-components

 ```php
// Bad
<livewire:user-profile-one :user="$user" :wire:key="$user->id">
// Good
<livewire:user-profile-one :user="$user" :wire:key="'user-profile-one-'.$user->id">
```

<a id="register-package-livewire-components"></a>
### Register Package Livewire Components

[refer to packages section](/docs/laravel/packages#livewire-component)





<a id="events"></a>
## Events

As long as two Livewire components are living on the same page, they can communicate using events and listeners.

<a id="firing-events"></a>
### Firing Events

```php
// Method A: From The Template
<button wire:click="$emit('postAdded')">
// Method B: From The Component
$this->emit('postAdded');
// Method C: From Global JavaScript
<script>
    Livewire.emit('postAdded')
</script>
```

<a id="event-listeners"></a>
### Event Listeners

```php
public $listeners = ['listenForMe' => 'callThisMethod'];
```

<a id="scoping-events"></a>
### Scoping Events

When dealing with nested components, sometimes you may only want to emit events to parents and not children or sibling components.

```php
// scope to parent with nested component
$this->emitUp('postAdded');

<button wire:click="$emitUp('postAdded')">
```

<a id="scoping-to-components-by-name-emitto"></a>
#### Scoping To Components By Name (emitTo)

1. Fire the event from the template, component or from javascript.

```php
// emit to another component
<button wire:click.prevent="$emitTo('path.to.component', 'listenForMe')">Fire Event</button>
// pass parameter when emitting to another component
<button wire:click.prevent="$emitTo('path.to.component', 'listenForMe', 'param')">Fire Event</button>
```

2. Listen for the event in the component

```php
public $listeners = ['listenForMe' => 'callThisMethod'];
```



<a id="tips-and-tricks"></a>
## Tips and Tricks


<a id="make-a-child-component-reactive-based-on-parent-changes"></a>
#### Make a child component "reactive" based on parent changes.

This technique forces the child to mount each time the parent is updated. Read more [here](https://github.com/livewire/livewire/discussions/2097)

```html
<livewire:create-question-answers key="{{ Str::random()}}" :quiz-id="$editing->id" />
```

<a id="fire-a-method-from-another-component"></a>
### Fire a method from another component?

Add a listener and fire away!

```php
public $listeners = ['fireCreateMethod' => 'create'];
```



<a id="updaterefresh-techniques"></a>
## Update/Refresh Techniques

<a id="refresh-property-from-render-method"></a>
### Refresh property from render method

A Livewire component's render method gets called on the initial page load AND every subsequent component update.

Rather than fetching data from the database in the mount method, you can do it in the `render()` method

```php
public function render() {
    $this->editing = self::$model::findOrFail($id);
    return view('livewire.simple-editor-modal');
}
```

<a id="refresh-property-from-class"></a>
### Refresh property from class

```php
$this->reset(['uploadedImage']);
```

<a id="refresh-components"></a>
### Refresh Components

Add a listener to make the component refresh itself, simply add the following line to your component.

```php
protected $listeners = ['refreshComponent' => '$refresh'];
```

With this, livewire will call the render method whenever refreshComponent event is fired, then you can emit the events using any of the available method.

Refresh Component from Template

```php
<button wire:click.prevent="$emit('refreshComponent')">Refresh</button>
```

Re Render from Component itself

```php
$this->emit('refreshComponent');
```


```php
// use entangle to bind direct to a livewire property
<div x-data="{ value: @entangle('myValue')}" x-init="console.log(value)">  </div>
```
