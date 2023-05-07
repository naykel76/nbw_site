# Ionic Storage
<a id="markdown-ionic-storage" name="ionic-storage"></a>

<!-- TOC -->

- [Import the storage module into main.ts](#import-the-storage-module-into-maints)
- [Create a storage service](#create-a-storage-service)
- [Storage service usage examples](#storage-service-usage-examples)
    - [Setting initial values on application load](#setting-initial-values-on-application-load)

<!-- /TOC -->

more information https://github.com/ionic-team/ionic-storage

```bash
# using Angular
npm install @ionic/storage-angular
# otherwise
npm install @ionic/storage
```

## Import the storage module into main.ts
<a id="markdown-import-the-storage-module-into-main.ts" name="import-the-storage-module-into-main.ts"></a>

!! This may be different when using ngModules !!

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

## Create a storage service
<a id="markdown-create-a-storage-service" name="create-a-storage-service"></a>

From the command line run:

```bash
ionic g service services/storage
```

The add methods to the storage service

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

## Storage service usage examples
<a id="markdown-storage-service-usage-examples" name="storage-service-usage-examples"></a>

For all examples, make sure you import the `StorageService` and injected it into the component `constructor`.

```js
import { StorageService } from './services/storage.service';

export class SomeComponent implements OnInit {
    constructor(private storageService: StorageService) { }
}
```

### Setting initial values on application load
<a id="markdown-setting-initial-values-on-application-load" name="setting-initial-values-on-application-load"></a>

```js
// src/app/app.component.ts
async ngOnInit() {
    const name = (await this.storageService.get('name')) || 'Paul';
    await this.storageService.set('name', name);
}
```
