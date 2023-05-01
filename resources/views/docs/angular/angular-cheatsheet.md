
## Data binding `ngModel`

**do not wrap in {{  }}**

```
[(ngModel)]="user.name"
```

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

## `ngFor`

```html
<ion-list *ngFor="let item of items"; index as i;>
    {{item.name}}
</ion-list>
```
