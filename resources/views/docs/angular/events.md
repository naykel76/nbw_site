# Angular Events

<!-- TOC -->

- [Button click](#button-click)
- [Binding to keyboard events](#binding-to-keyboard-events)
    - [HostListener decorator to bind to host (global) events](#hostlistener-decorator-to-bind-to-host-global-events)

<!-- /TOC -->

<a id="markdown-button-click" name="button-click"></a>

## Button click

```html
<button (click)="login()" type="submit" class="btn primary">Login</button>
```


<a id="markdown-binding-to-keyboard-events" name="binding-to-keyboard-events"></a>

## Binding to keyboard events

```html
<input (keydown)="onKeydown($event)">
```

```js
onKeydown(event: KeyboardEvent) {
    console.log(event.key);
    if (event.key === "Enter") {
        // do something
    }
}
```

<a id="markdown-hostlistener-decorator-to-bind-to-host-global-events" name="hostlistener-decorator-to-bind-to-host-global-events"></a>

### HostListener decorator to bind to host (global) events

```js
@HostListener('window:keydown', ['$event'])

private moves: any = {
    ArrowLeft: () => 'ArrowLeft Pressed',
    ArrowRight: () => 'ArrowRight Pressed',
    ArrowDown: () => 'ArrowDown Pressed',
    ArrowUp: () => 'ArrowUp Pressed',
};

onKeydown(event: KeyboardEvent): void {
    if (this.moves[event.key]) {
        console.log(this.moves[event.key]());
    }
}
```


<!-- ```html
<input type="text" name="username" [(ngModel)]="username">
``` -->
