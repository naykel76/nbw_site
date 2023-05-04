# Ionic Storage

<!-- MarkdownTOC -->

- [Import the storage module](#import-the-storage-module)
- [Create a storage service](#create-a-storage-service)
    - [Add methods to the storage service](#add-methods-to-the-storage-service)
- [Storage service usage examples](#storage-service-usage-examples)
- [Questions](#questions)
        - [Can I make `StorageService` accessible globally rather than injecting each time?](#can-i-make-storageservice-accessible-globally-rather-than-injecting-each-time)

<!-- /MarkdownTOC -->

more information https://github.com/ionic-team/ionic-storage

```bash
# using Angular
npm install @ionic/storage-angular
# otherwise
npm install @ionic/storage
```

<a id="import-the-storage-module"></a>
## Import the storage module

```js
// src/main.ts
import { IonicStorageModule } from '@ionic/storage-angular';

bootstrapApplication(AppComponent, {
    providers: [
        ...
        importProvidersFrom( IonicStorageModule.forRoot()),
    ],
});

```

<a id="create-a-storage-service"></a>
## Create a storage service

```bash
ionic g service services/storage
```

<a id="add-methods-to-the-storage-service"></a>
### Add methods to the storage service

```js
// src/services/storage.service.ts
import { Injectable } from '@angular/core';
import { Storage } from '@ionic/storage-angular';

@Injectable({
    providedIn: 'root'
})
export class StorageService {

    constructor(private storage: Storage) {
        this.init();
    }

    async init() {
        await this.storage.create();
    }

    public async set(key: string, value: any) {
        let result = await this.storage?.set(key, value);
    }

    public async get(key: string) {
        return await this.storage?.get(key);
    }

    public async remove(key: string) {
        let value = await this.storage?.remove(key);
    }

    public async clear(key: string) {
        let value = await this.storage?.clear();
    }

    public async keys(key: string) {
        return await this.storage?.keys();
    }

    // await storage.length()
    // storage.forEach((key, value, index) => { });
    // storage.setEncryptionKey('mykey');
}
```

<a id="using-the-storage-service"></a>
## Storage service usage examples

```js
constructor(private storageService: StorageService) { }

async ngOnInit() {

    await this.storageService.get('name') === null
        ? this.storageService.set('name', 'Paul')
        : console.log(await this.storageService.get('name'));

}

async setNameToStorage() {
    await this.storageService.set('name', 'Sam');
}

async getNameFromStorage() {
    return await this.storageService.get('name');
}
```

## Questions
<a id="can-i-make-storageservice-accessible-globally-rather-than-injecting-each-time"></a>
#### Can I make `StorageService` accessible globally rather than injecting each time?
