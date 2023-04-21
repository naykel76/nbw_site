## Inline Modal

`ion-modal` can be used by writing the component directly in your template. This reduces the number
of handlers you need to wire up in order to present the modal.

## Controller Modal

Create the modal page and remove the automatically created route. For this example, we are going
to create a user-profile modal.

```bash
ionic generate page user-profile
```

### 1. Import the newly crated `UserProfilePage` and `ModalController`

```js
import { ModalController } from '@ionic/angular';
import { UserPage } from './user/user.page';
```

### 2. Inject the `ModalController` into the constructor

Injecting the ModalController into the `page.ts` constructor gives us access to the
`ModalController` within the class.

### 3. Create an async method to display the modal passing in the `component` and `componentProps`

The `component` parameter defines the page/component that will be displayed in the modal

`componentProps` is where you pass values to the modal. The value is passed as an object that has
a property and a value.

Don't forget to `return modal.present();` to display the modal

```js
async editProfile() {

    const modal = await this.modal.create({
        component: UserPage,
        componentProps: { editing: true }
    })

    modal.onDidDismiss()
        .then((res) => {
            // the magic that happens when the modal is closed
        });

    return modal.present();
}
```


### Call the modal with a click event

```html
<ion-tab-button (click)="editProfile()">
    <ion-icon src="/assets/svg/user.svg"></ion-icon>
</ion-tab-button>
```


## Closing the modal

`*.ts`

```js
cancel() {
    this.modal.dismiss(null, 'cancel');
}
```

`*.html`

```html
<ion-button (click)="cancel()" >Cancel</ion-button>
```
