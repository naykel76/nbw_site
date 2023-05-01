ionic-components-cheatsheet

## `@ViewChild`

`@ViewChild` is a decorator that is used to access a child component or element in the parent component.

```js
import { ViewChild } from '@angular/core';

@ViewChild(IonModal) modal: IonModal;
```

In this case, `@ViewChild(IonModal) modal: IonModal;` is declaring a property called `modal` of type
`IonModal` that is decorated with `@ViewChild`. This allows the parent component to access the
`IonModal` component and its properties and methods.


