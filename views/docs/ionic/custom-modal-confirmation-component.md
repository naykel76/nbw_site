# Ionic Custom Modal Confirmation Component

## Create the component

## Import the component

```js
// src/app/some.page.ts
import { ModalConfirmationComponent } from './components/modal-confirmation.component';
@Component({
    ...
    imports: [ModalConfirmationComponent]
})
```

## Call the component

`title` - leave blank to omit entire header section.

```html
<nk-modal-confirmation title="Modal Title" />
```


<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

## Pass data to components

```js
import { Component, Input } from '@angular/core';

export class MyCustomComponent {

    @Input() myProperty?: String;

}
```

```html
<nk-header-create myProperty="value" (runCreate)="create($event)" />
```

import { Component, Input, Output, EventEmitter } from '@angular/core';


## Questions

#### How Can I inject a child component for the modal content?


