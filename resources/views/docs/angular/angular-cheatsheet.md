
## Data binding `ngModel`

**do not wrap in {{  }}**

```
[(ngModel)]="user.name"
```

## `ngFor`

    <ion-list *ngFor="let item of items"; index as i;>
        {{item.name}}
    </ion-list>
