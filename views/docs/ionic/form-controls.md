# Ionic Form Controls Cheatsheet

<!-- TOC -->

- [ion-button](#ion-button)
- [ion-input](#ion-input)
- [ion-toggle](#ion-toggle)
- [`@ViewChild`](#viewchild)

<!-- /TOC -->


<a id="markdown-ion-button" name="ion-button"></a>

## ion-button

```html
<ion-button>
    <ion-icon slot="end|start|icon-only" name="search"></ion-icon>
</ion-button>
```

<div class="code-all-col"></div>
| Attribute | Values                                                                            |
| --------- | --------------------------------------------------------------------------------- |
| expand    | block \| full                                                                     |
| color     | primary \| secondary \| tertiary \| success \| warning \| danger \| light \| dark |
| fill      | clear \| outline \| solid                                                         |
| shape     | round                                                                             |
| size      | small \| default \| large                                                         |

<a id="markdown-ion-input" name="ion-input"></a>

## ion-input

https://ionicframework.com/docs/api/input#properties

```html
<ion-input
    labelPlacement={end｜fixed｜floating｜stacked｜start}
/>
```
<a id="markdown-ion-toggle" name="ion-toggle"></a>

## ion-toggle

```html
<ion-item>
    <ion-toggle [(ngModel)]="showNotifications">Show Notifications</ion-toggle>
</ion-item>
```

<a id="markdown-viewchild" name="viewchild"></a>

## `@ViewChild`

`@ViewChild` is a decorator that is used to access a child component or element in the parent component.

```js
import { ViewChild } from '@angular/core';

@ViewChild(IonModal) modal: IonModal;
```

In this case, `@ViewChild(IonModal) modal: IonModal;` is declaring a property called `modal` of type
`IonModal` that is decorated with `@ViewChild`. This allows the parent component to access the
`IonModal` component and its properties and methods.


