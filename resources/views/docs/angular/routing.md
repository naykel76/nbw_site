Navigation to route

## Navigate between components using routes from code

```js
import { Router } from '@angular/router';

export class MyComponent {

    constructor(private router: Router) { }

    navigateToFirst() {
        this.router.navigate(['first'])
    }

    navigateToSecond() {
        this.router.navigateByUrl('/second')
    }

}
```

---
---
---
---
---
---
---
---
---
---
---


# Routing

- [Navigate between components using routes from code](#navigate-between-components-using-routes-from-code)
- [Simple route and navigation with `RouterLink`](#simple-route-and-navigation-with-routerlink)
    - [Navigate programmatically with `Router` API](#navigate-programmatically-with-router-api)

## Simple route and navigation with `RouterLink`

Create routes in `app/app.routes.ts`

```js
import { Routes } from '@angular/router';

export const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full', },
  { path: 'home', loadComponent: () => import('./home/home.page').then((m) => m.HomePage), },
  { path: 'login', loadComponent: () => import('./pages/login/login.page').then(m => m.LoginPage) },
];
```

In the `component.ts` file where you want to create the link import the `routerLink` module and include in the `imports` array.

```js
import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { IonicModule } from '@ionic/angular';

@Component({
  ...
  imports: [IonicModule, RouterLink],
})
```

Then add the link to the `component.html`.
```html
  <ion-button [routerLink]="['/login']">Login</ion-button>
```

### Navigate programmatically with `Router` API

```html
<!-- import the router -->
import { Router } from '@angular/router';
<!-- inject the router into the class constructor -->
constructor(private router: Router){}
<!-- add the route to your method -->
login(){
  this.router.navigate(['/login'])
}
```
