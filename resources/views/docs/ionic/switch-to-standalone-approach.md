# Switch To Standalone Components

To use standalone components in your Ionic application, you need to have the `app.routes.ts` file
in the `app` directory. The `app.routes.ts` file is not created automatically when you create a
new application, so you need to create it yourself if it does not exist.

```js
// app.routes.ts
import { Routes } from '@angular/router';

export const routes: Routes = [ ];
```

Then you can create standalone components by adding the `--standalone` flag

```bash
ionic g posts --standalone
```

If you want to permanently enable standalone components in your Ionic application, you can add the
`standalone` flag in the `angular.json` file located in the root directory of your project.

```js
{
    ...
    "schematics": {
        "@ionic/angular-toolkit:page": {
            "styleext": "scss",
            "standalone": true
        }
    }
}
```

more info https://ionic.io/blog/ionic-cli-v7



