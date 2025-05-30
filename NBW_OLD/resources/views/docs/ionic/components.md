# Ionic Components
<!-- TOC -->

- [ion-list](#ion-list)

<!-- /TOC -->



<a id="markdown-ion-list" name="ion-list"></a>

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

