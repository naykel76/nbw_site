# Angular Routing
<!-- TOC -->

- [Create Route(s)](#create-routes)
- [Add Router Links](#add-router-links)
- [Redirecting `Router.navigate()`](#redirecting-routernavigate)
    - [Passing Parameters](#passing-parameters)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<a id="markdown-create-routes" name="create-routes"></a>

## Create Route(s)

```js
// app/app.routes.ts
import { Routes } from '@angular/router';

export const routes: Routes = [
    {
        path: 'login', loadComponent: () => import('./login/login.component')
            .then(mod => mod.LoginComponent)
    }
];
```

<a id="markdown-add-router-links" name="add-router-links"></a>

## Add Router Links

To navigate as a result of an action such as the click of an anchor tag, use `RouterLink`.

Make sure you import `RouterLink` into `app/app.component.ts`

```js
// app/app.component.ts
import { RouterLink, RouterOutlet } from '@angular/router';
```

```html
<!-- app/app.component.html -->
<a routerLink="/login"> Login </a>
```

<a id="markdown-redirecting-routernavigate" name="redirecting-routernavigate"></a>

## Redirecting `Router.navigate()`

```js
constructor(private router: Router) { }

redirectHome(url) {
  this.router.navigate(['/home']);
}
```

<a id="markdown-passing-parameters" name="passing-parameters"></a>

### Passing Parameters

```js
this.router.navigate(['/user', { id: userId }]);
```


<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

- <a href="https://angular.io/guide/routing-overview" target="blank">Routing Overview</a>
- <a href="https://angular.io/guide/router-reference" target="blank">Router Reference</a>

