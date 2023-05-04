# Custom Components

<!-- MarkdownTOC -->

- [Create the component](#create-the-component)
    - [Sharing data between components](#sharing-data-between-components)
- [Use the component](#use-the-component)
    - [Import the component](#import-the-component)
    - [Render the component](#render-the-component)

<!-- /MarkdownTOC -->

<a id="create-the-component"></a>
## Create the component

```bash
ionic g component components/SomeComponent
```

<a id="sharing-data-between-components"></a>
### Sharing data between components

You can share data between component using Angular's `@Input()` and `@Output()` decorators.

https://angular.io/guide/inputs-outputs

`@input()` Parent -> Child <br>
`@output()` Child -> Parent

```js
import { Component, Input } from '@angular/core';

export class SomeComponent {
    @Input() myProperty?: String;
}
```


<a id="using-the-component"></a>
## Use the component

<a id="import-the-component"></a>
### Import the component

```js
import { ModalConfirmationComponent } from './components/modal-confirmation.component';
@Component({
    ...
    imports: [ModalConfirmationComponent]
})
```

<a id="render-the-component-with-props"></a>
### Render the component

```html
<nk-some-component myProperty="value" />
```
