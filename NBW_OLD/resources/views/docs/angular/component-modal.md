# Modal Component and Service
<!-- TOC -->

- [modal.service.ts](#modalservicets)
- [modal.component.ts](#modalcomponentts)
- [modal.component.html](#modalcomponenthtml)
- [app.component.html](#appcomponenthtml)
- [app.component.ts](#appcomponentts)

<!-- /TOC -->


<a id="markdown-modalservicets" name="modalservicets"></a>

## modal.service.ts

```js
export class ModalService {

    private showModal: BehaviorSubject<boolean> = new BehaviorSubject<boolean>(false);

    getShowModal(): Observable<boolean> {
        return this.showModal.asObservable();
    }

    openModal(): void {
        this.showModal.next(true);
    }

    closeModal(): void {
        this.showModal.next(false);
    }
}
```

<a id="markdown-modalcomponentts" name="modalcomponentts"></a>

## modal.component.ts

```js
export class ModalComponent implements OnInit {

    showModal: boolean = false;

    constructor(private modalService: ModalService) { }

    ngOnInit() {
        this.modalService.getShowModal().subscribe(showModal => {
            this.showModal = showModal;
        });
    }

    closeModal(): void {
        this.modalService.closeModal();
    }
}
```

<a id="markdown-modalcomponenthtml" name="modalcomponenthtml"></a>

## modal.component.html

```html
<div class="modal" *ngIf="showModal">
    <div>
        <ng-content></ng-content>
    </div>
    <div>
        <button class="btn btn-primary" (click)="closeModal()">Close</button>
    </div>
</div>
```

<a id="markdown-appcomponenthtml" name="appcomponenthtml"></a>

## app.component.html

```html
<app-modal>
    <h1>Modal Header</h1>
    <p>Some text in the Modal Body</p>
</app-modal>
```

<a id="markdown-appcomponentts" name="appcomponentts"></a>

## app.component.ts

```js
export class AppComponent implements OnInit {

    constructor(private modalService: ModalService) { }

    ngOnInit() {
        this.modalService.openModal();
    }
}
```
