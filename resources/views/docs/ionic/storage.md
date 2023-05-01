# Ionic Storage

<!-- MarkdownTOC -->

- [Import the storage module](#import-the-storage-module)
- [Create new storage service](#create-new-storage-service)
    - [Add methods to the storage service](#add-methods-to-the-storage-service)

<!-- /MarkdownTOC -->

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

<a id="create-new-storage-service"></a>
## Create new storage service

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

    private _storage: Storage | null = null;

    constructor(private storage: Storage) { this.init(); }

    async init() {
        const storage = await this.storage.create();
        this._storage = storage;
    }

    public async set(key: string, value: any) {
        let result = await this._storage?.set(key, value);
    }

    public async get(key: string) {
        return await this._storage?.get(key);
    }

    public async remove(key: string) {
        let value = await this._storage?.remove(key);
    }

    public async clear(key: string) {
        let value = await this._storage?.clear();
    }

    public async keys(key: string) {
        return await this._storage?.keys();
    }
}
```


    await storage.length()
    storage.forEach((key, value, index) => { });
    storage.setEncryptionKey('mykey');
