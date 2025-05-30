# Angular Layouts and Templates

<!-- TOC -->

- [Conditional Classes](#conditional-classes)
- [Additional References](#additional-references)

<!-- /TOC -->

<a id="markdown-conditional-classes" name="conditional-classes"></a>

## Conditional Classes

```html
<div [ngClass]="'first second'">
<div [ngClass]="['first', 'second']">
<div [ngClass]="{first: true, second: true, third: true}">
<div [ngClass]="{'first second': true}">
```

Add a property to the component

```js
export class AlertComponent {
    @Input() width?: string = '';
}
```

Set options and the default class

```html
<div [ngClass]="{
    'container py-5': true,
    'maxw-sm': width === 'sm',
    'maxw-md': width === 'md' || !width,
    'maxw-lg': width === 'lg',
}"> </div>
```

Usage

```html
<app-layout [width]="'sm'"> </app-layout>
```

<a id="markdown-additional-references" name="additional-references"></a>

## Additional References

<a href="https://angular.io/api/common/NgClass" target="blank">https://angular.io/api/common/NgClass</a>
