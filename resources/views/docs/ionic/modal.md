# Modals

<!-- MarkdownTOC -->

- [Inline Modal](#inline-modal)
- [Controller Modal](#controller-modal)
- [Closing the modal](#closing-the-modal)

<!-- /MarkdownTOC -->


<a id="inline-modal"></a>
## Inline Modal

```html
<ion-content [fullscreen]="true" class="ion-padding">

    <ion-button id="open-modal">Open Modal</ion-button>

    <p>{{ message }}</p>

    <ion-modal trigger="open-modal" (willDismiss)="onWillDismiss($event)">

        <ng-template>

            <ion-content class="ion-padding"> ... </ion-content>

            <ion-footer class="grid-0 cols-2">
                <ion-button slot="end" (click)="cancel()" fill="outline">Cancel</ion-button>
                <ion-button slot="end" (click)="confirm()" [strong]="true">Confirm</ion-button>
            </ion-footer>

        </ng-template>

    </ion-modal>

</ion-content>
```

<a id="controller-modal"></a>
## Controller Modal

Create the modal page and remove the automatically created route. For this example, we are going
to create a user-profile modal.

```bash
ionic generate page user-profile
```

<a id="1-import-the-newly-crated-userprofilepage-and-modalcontroller"></a>
##### 1. Import the newly crated `UserProfilePage` and `ModalController`

```js
import { ModalController } from '@ionic/angular';
import { UserPage } from './user/user.page';
```

<a id="2-inject-the-modalcontroller-into-the-constructor"></a>
##### 2. Inject the `ModalController` into the constructor

Injecting the ModalController into the `page.ts` constructor gives us access to the
`ModalController` within the class.

<a id="3-create-an-async-method-to-display-the-modal-passing-in-the-component-and-componentprops"></a>
##### 3. Create an async method to display the modal passing in the `component` and `componentProps`

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


<a id="call-the-modal-with-a-click-event"></a>
##### Call the modal with a click event

```html
<ion-tab-button (click)="editProfile()">
    <ion-icon src="/assets/svg/user.svg"></ion-icon>
</ion-tab-button>
```


<a id="closing-the-modal"></a>
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
