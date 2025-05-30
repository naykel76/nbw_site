# Angular Events

<!-- TOC -->

- [Parent child communication](#parent-child-communication)
                - [`parent.component.ts`](#parentcomponentts)
- [Trigger event in another component](#trigger-event-in-another-component)
    - [Trigger component](#trigger-component)
    - [Listener component](#listener-component)
- [Button click](#button-click)
- [Binding to keyboard events](#binding-to-keyboard-events)
    - [HostListener decorator to bind to host (global) events](#hostlistener-decorator-to-bind-to-host-global-events)

<!-- /TOC -->

<a id="markdown-parent-child-communication" name="parent-child-communication"></a>

## Parent child communication

```js
// child.component.ts
import { Component, EventEmitter, Output } from '@angular/core';

@Component({
    selector: 'app-child',
    templateUrl: './child.component.html',
    styleUrls: ['./child.component.scss']
})

export class ChildComponent {
    @Output() someEvent = new EventEmitter<string>();
    // Function that triggers the event
    triggerEvent() {
        this.someEvent.emit();
    }
}
```

<a id="markdown-parentcomponentts" name="parentcomponentts"></a>

###### `parent.component.ts`
```js
import { Component } from '@angular/core';
@Component({
    selector: 'app-parent',
    templateUrl: './parent.component.html',
    styleUrls: ['./parent.component.scss']
})

export class ParentComponent {
    message: string;

    receiveMessage($event) {
        this.message = $event;
    }
}
```

In the parent component template, we bind to the `messageEvent` property of the child component
and call the `receiveMessage()` method when the event is emitted.

```html
<!-- parent.component.html -->
<app-child (messageEvent)="receiveMessage($event)"></app-child>
<p>{{message}}</p>
```

<a id="markdown-trigger-event-in-another-component" name="trigger-event-in-another-component"></a>

## Trigger event in another component

<a id="markdown-trigger-component" name="trigger-component"></a>

### Trigger component

```js
import { Component, EventEmitter, Output } from '@angular/core';

export class ComponentABC {
    @Output() theEmittedEvent = new EventEmitter<void>();
    // Call this method when needed to trigger the event
    eventTriggerMethod() {
        this.triggerMethod.emit();
    }
}
```

<a id="markdown-listener-component" name="listener-component"></a>

### Listener component

```js
import { Component, Input } from '@angular/core';

export class ComponentXYZ {
    handleEvent() {
        // Method to be called when the event is triggered
    }
}
```

```html
<app-abc (theEmittedEvent)="xyz.handleEvent()" ></app-abc>
<app-xyz #xyz></app-xyz>
```

<a id="markdown-button-click" name="button-click"></a>

## Button click

```html
<button (click)="login()" type="submit" class="btn primary">Login</button>
```


<a id="markdown-binding-to-keyboard-events" name="binding-to-keyboard-events"></a>

## Binding to keyboard events

```html
<input (keydown)="onKeydown($event)">
```

```js
onKeydown(event: KeyboardEvent) {
    console.log(event.key);
    if (event.key === "Enter") {
        // do something
    }
}
```

<a id="markdown-hostlistener-decorator-to-bind-to-host-global-events" name="hostlistener-decorator-to-bind-to-host-global-events"></a>

### HostListener decorator to bind to host (global) events

```js
@HostListener('window:keydown', ['$event'])

private moves: any = {
    ArrowLeft: () => 'ArrowLeft Pressed',
    ArrowRight: () => 'ArrowRight Pressed',
    ArrowDown: () => 'ArrowDown Pressed',
    ArrowUp: () => 'ArrowUp Pressed',
};

onKeydown(event: KeyboardEvent): void {
    if (this.moves[event.key]) {
        console.log(this.moves[event.key]());
    }
}
```


<!-- ```html
<input type="text" name="username" [(ngModel)]="username">
``` -->
