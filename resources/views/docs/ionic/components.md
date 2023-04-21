ionic-components-cheatsheet

- [ion-button](#ion-button)
- [ion-list](#ion-list)


## ion-button

https://ionicframework.com/docs/api/button

```html
<ion-button expand="block|full"></ion-button>
<ion-button color="primary|secondary|tertiary|success|warning|danger|light|medium|dark"></ion-button>
<ion-button fill="clear|outline|solid"> </ion-button>
<ion-button shape="round"></ion-button>
<ion-button size="small|default|large"> </ion-button>

<ion-button>
    <ion-icon slot="end|start|icon-only" name="search"></ion-icon>
</ion-button>
```


## ion-list
```html
<ion-list #item>
  <ion-item-sliding *ngFor="let contact of contacts; index as i">
    <ion-item>
      <ion-label>{{contact.firstName}} {{contact.lastName}}</ion-label>
    </ion-item>
    <ion-item-options>
      <ion-item-option side="start" (click)="editContact(i, item)" color="success">
        Edit
      </ion-item-option>
      <ion-item-option (click)="delete(i)" color="danger">
        <ion-icon slot="icon-only" name="trash"></ion-icon>
      </ion-item-option>
    </ion-item-options>
  </ion-item-sliding>
</ion-list>
```
