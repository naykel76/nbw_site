# Custom Components

```bash
ionic generate component my-component
ng generate component my-component --prefix=nk --spec=false
```

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
