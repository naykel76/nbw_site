# Angular Components (WIP)

<!-- TOC -->

- [Sharing data between directives and components](#sharing-data-between-directives-and-components)
    - [Sending data from the HTML](#sending-data-from-the-html)
    - [Fetching data with @Input()](#fetching-data-with-input)
- [Emit event to sending data back from component `@output`](#emit-event-to-sending-data-back-from-component-output)
- [Add an event listener to the component's selector](#add-an-event-listener-to-the-components-selector)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<a id="markdown-sharing-data-between-directives-and-components" name="sharing-data-between-directives-and-components"></a>

## Sharing data between directives and components

You can share data between components using Angular's `@Input()` and `@Output()` decorators.

`@Input()` lets a parent component update data in the child component. Conversely, `@Output()`
lets the child send data to a parent component.

<a id="markdown-sending-data-from-the-html" name="sending-data-from-the-html"></a>

### Sending data from the HTML

```html
<!-- pass primitive value -->
<app-child dataFromParent="some value"/>
<!-- bind to a value -->
<app-child [dataFromParent]="parentValue"/>
<!-- pass nested items -->
<app-child [dataFromParent]="object.item"/>
```

<a id="markdown-fetching-data-with-input" name="fetching-data-with-input"></a>

### Fetching data with @Input()
```js
import { Component, Input } from '@angular/core';

@Component({
    selector: 'app-child',
    standalone: true,
    template: '<p>{{ dataFromParent }}</p>'
})
export class ChildComponent {

    @Input() dataFromParent: string;

    constructor() {
        // You can use this.dataFromParent here for initialization
        console.log(this.dataFromParent);
    }
}


```
---
---
---
---
---
---



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





<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

<a href="https://angular.io/guide/inputs-outputs" target="blank">https://angular.io/guide/inputs-outputs</a>
