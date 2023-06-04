# Angular Components

<!-- TOC -->

- [Sending data to the component `@input()`](#sending-data-to-the-component-input)
- [Emit event to sending data back from component `@output`](#emit-event-to-sending-data-back-from-component-output)
- [Add an event listener to the component's selector](#add-an-event-listener-to-the-components-selector)

<!-- /TOC -->

You can share data between component using Angular's `@Input()` and `@Output()` decorators.

https://angular.io/guide/inputs-outputs

<a id="markdown-sending-data-to-the-component-input" name="sending-data-to-the-component-input"></a>

## Sending data to the component `@input()`
```js
import { Component, Input } from '@angular/core';

@Input() myProperty?: string;
```

```html
<!-- pass primitive value -->
<app-some-component childProperty="some value"/>
<!-- bind to a value -->
<app-some-component [childProperty]="parentValue"/>
<!-- pass nested items -->
<app-some-component [childProperty]="object.item"/>
```

<a id="markdown-emit-event-to-sending-data-back-from-component-output" name="emit-event-to-sending-data-back-from-component-output"></a>

## Emit event to sending data back from component `@output`

[@Output() newItemEvent = new EventEmitter<string>();](https://angular.io/guide/inputs-outputs#configuring-the-child-component-1)

The component uses the `@Output()` property to raise an event to notify the parent of the change.
To raise an event, an `@Output()` must have the type of EventEmitter.

```js
import { Output, EventEmitter } from '@angular/core';

@Output() newItemEvent = new EventEmitter<string>();

addNewItem(value: string) {
    this.newItemEvent.emit(value);
}
```

<a id="markdown-add-an-event-listener-to-the-components-selector" name="add-an-event-listener-to-the-components-selector"></a>

## Add an event listener to the component's selector

`(newItemEvent)` is the event being emitted <br>
`addItem($event)` is the method in the parent component (receiver of the event)

```html
<nk-some-component (newItemEvent)="addItem($event)" />
```





