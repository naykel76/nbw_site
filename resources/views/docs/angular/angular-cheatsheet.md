# Angular Quick Reference

<!-- TOC -->

- [New Project](#new-project)
- [Generate Command](#generate-command)
- [`ngIf`](#ngif)
- [`ngFor`](#ngfor)
- [General](#general)
- [Additional Resources](#additional-resources)

<!-- /TOC -->

<code-first-col></code-first-col>
| Command                            | Action                   |
| :--------------------------------- | :----------------------- |
| npm install -g @angular/cli@latest |                          |
| npm uninstall -g angular-cli       | Remove (before updating) |


<a id="markdown-new-project" name="new-project"></a>

## New Project
<code-first-col></code-first-col>

| Command               | Description                                              |
| --------------------- | -------------------------------------------------------- |
| ng new <project-name> | Create a new Angular project                             |
| ng generate [option]  |                                                          |
| ng serve              | Start the development server                             |
| ng build              | Build the project for production                         |
| --inline-style        | Include styles inline in the component TS file.          |
| --inline-template     | Include template inline in the component TS file.        |
| --skip-tests          | Do not generate "spec.ts" test files for the new project |
| --strict              | Do not generate "spec.ts" test files for the new project |

```bash
ng my-app --standalone --style=scss --routing
```

<a id="markdown-generate-command" name="generate-command"></a>

## Generate Command

| Command                                | Action                     |
| :------------------------------------- | :------------------------- |
| ng generate [option]                   |                            |
| ng generate component <component-name> | Generate a new component   |
| ng generate guard <guard-name>         | Generate a new route guard |
| ng generate interface <interface-name> | Generate a new interface   |
| ng generate service <service-name>     | Generate a new service     |

```bash
ng generate component myComponent --skip-tests --inline-style
ng generate component myComponent --skip-tests --inline-style --inline-template --flat
```

<a id="markdown-ngif" name="ngif"></a>

## `ngIf`

    <button (click)="show = !show">{{show ? 'hide' : 'show'}}</button>

```html
<div *ngIf="condition">Content to render when condition is true.</div>
```

```html
<div *ngIf="condition; then thenBlock else elseBlock"></div>
<ng-template #thenBlock>Content to render when condition is true.</ng-template>
<ng-template #elseBlock>Content to render when condition is false.</ng-template>
```

<a id="markdown-ngfor" name="ngfor"></a>

## `ngFor`

```html
<ion-list *ngFor="let item of items"; index as i;>
    {{item.name}}
</ion-list>
```


<a id="markdown-general" name="general"></a>

## General

How can I get a HTML element in angular?

    @ViewChild('boardCanvas', { static: false }) canvasRef!: ElementRef<HTMLCanvasElement>;

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

<a href="https://angular.io/docs" target="blank">Angular Docs</a>
