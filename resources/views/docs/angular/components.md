# Components

## Fire parent event from child component

##### In the child component

```html
<button (click)="sendMessage('this is the message')">Pass data to parent</button>
```

```js
import { Component, Output, EventEmitter } from '@angular/core';

export class ChildComponent {

    @Output() myMessage = new EventEmitter<string>;

    sendMessage(private msg:string): void {
        this.myMessage.emit(msg);
    }
}
```

##### In the parent component

```html
<!-- $event is the data??? -->
<my-component (myMessage)="getChildData($event)"></my-component>
```

```js
getChildData($event: any) {
    console.log($event);
}
```
