# Modals

<!-- TOC -->

- [Inline Modal](#inline-modal)
- [Controller Modal](#controller-modal)
- [Closing the modal](#closing-the-modal)
- [Layout Examples (HTML)](#layout-examples-html)
    - [Header with title and buttons](#header-with-title-and-buttons)

<!-- /TOC -->

<a id="markdown-inline-modal" name="inline-modal"></a>

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

<a id="markdown-controller-modal" name="controller-modal"></a>

## Controller Modal

Create the modal page and remove the automatically created route. For this example, we are going
to create a user-profile modal.

```bash
ionic generate page user-profile
```

<a id="markdown-1-import-the-newly-crated-userprofilepage-and-modalcontroller" name="1-import-the-newly-crated-userprofilepage-and-modalcontroller"></a>

##### 1. Import the newly crated `UserProfilePage` and `ModalController`

```js
import { ModalController } from '@ionic/angular';
import { UserPage } from './user/user.page';
```

<a id="markdown-2-inject-the-modalcontroller-into-the-constructor" name="2-inject-the-modalcontroller-into-the-constructor"></a>

##### 2. Inject the `ModalController` into the constructor

Injecting the ModalController into the `page.ts` constructor gives us access to the
`ModalController` within the class.

<a id="markdown-3-create-an-async-method-to-display-the-modal-passing-in-the-component-and-componentprops" name="3-create-an-async-method-to-display-the-modal-passing-in-the-component-and-componentprops"></a>

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


<a id="markdown-call-the-modal-with-a-click-event" name="call-the-modal-with-a-click-event"></a>

##### Call the modal with a click event

```html
<ion-tab-button (click)="editProfile()">
    <ion-icon src="/assets/svg/user.svg"></ion-icon>
</ion-tab-button>
```


<a id="markdown-closing-the-modal" name="closing-the-modal"></a>

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


<a id="markdown-layout-examples-html" name="layout-examples-html"></a>

## Layout Examples (HTML)

There is some quirky behaviour with the styling so you may need to play around to get the look and
feel you want.

`ion-content` is intended to be used in full-page modals, cards, and sheets. If your custom dialog
has a dynamic or unknown size, ion-content should not be used.

`.ion-page` uses `display: flex; justify-content: space-between;`

<a id="markdown-header-with-title-and-buttons" name="header-with-title-and-buttons"></a>

### Header with title and buttons

```html
<ion-content class="ion-padding">

    <ion-button id="open-modal" expand="block">Open</ion-button>

    <ion-modal trigger="open-modal" (willDismiss)="onWillDismiss($event)">
        <ng-template>
            <ion-header>
                <ion-toolbar>
                    <ion-buttons slot="start">
                        <ion-button (click)="cancel()">Cancel</ion-button>
                    </ion-buttons>
                    <ion-title>Title</ion-title>
                    <ion-buttons slot="end">
                        <ion-button (click)="confirm()" [strong]="true">Confirm</ion-button>
                    </ion-buttons>
                </ion-toolbar>
            </ion-header>

            <!-- only wrap in ion-content for full page modal -->
            <ion-card class="ion-padding"> ... </ion-card>

        </ng-template>
    </ion-modal>

</ion-content>
```
