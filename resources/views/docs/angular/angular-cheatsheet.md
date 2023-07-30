# Angular Quick Reference

<!-- TOC -->

- [Data binding](#data-binding)
- [`ngIf`](#ngif)
- [`ngFor`](#ngfor)

<!-- /TOC -->

<a href="https://angular.io/docs" target="blank">Angular Docs</a>

<code-first-col></code-first-col>
| Command              | Action                                                   |
| :------------------- | :------------------------------------------------------- |
| ng version           | Outputs Angular CLI version                              |
| ng new my-project    | Create angular project                                   |
| ng generate [option] |                                                          |
| --inline-style       | Include styles inline in the component TS file.          |
| --inline-template    | Include template inline in the component TS file.        |
| --skip-tests         | Do not generate "spec.ts" test files for the new project |
| --strict             | Do not generate "spec.ts" test files for the new project |

```bash
ng my-app --standalone --style=scss --routing
```

Update CLI

```bash
npm uninstall -g angular-cli
npm install -g @angular/cli@latest
```

Generate Command

```bash
ng generate component account --skip-tests --inline-style
```


<a id="markdown-data-binding" name="data-binding"></a>

## Data binding

To use data binding import the angular `FormsModule` and add to the `imports` array.

```js
// my.component.ts
import { FormsModule } from '@angular/forms';

@Component({
    imports: [FormsModule],
    ...
})
```

```html
<input type="text" name="username" [(ngModel)]="username">
```

<a id="markdown-ngif" name="ngif"></a>

## `ngIf`

    <button (click)="show = !show">{{show ? 'hide' : 'show'}}</button>

```html
<div *ngIf="condition">Content to render when condition is true.</div>
```

```html
<div *ngIf="condition; then thenBlock else elseBlock"></div>
<ng-template #thenBlock>Content to render when condition is true.</ng-template>
<ng-template #elseBlock>Content to render when condition is false.</ng-template>
```

<a id="markdown-ngfor" name="ngfor"></a>

## `ngFor`

```html
<ion-list *ngFor="let item of items"; index as i;>
    {{item.name}}
</ion-list>
```
