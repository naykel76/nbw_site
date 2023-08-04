# Javascript Event Listeners
<!-- TOC -->

- [Overview](#overview)
- [Handling the event callback](#handling-the-event-callback)
- [Event Bubbling and Capturing](#event-bubbling-and-capturing)
    - [Bubbling](#bubbling)
    - [Capturing](#capturing)
    - [Stop propagation (TBD)](#stop-propagation-tbd)
    - [Fire and event only once (TBD)](#fire-and-event-only-once-tbd)
- [Remove event listeners (TBD)](#remove-event-listeners-tbd)
- [Delegate events (TBD)](#delegate-events-tbd)
- [Examples](#examples)
    - [Run a function on click](#run-a-function-on-click)
    - [Add class on click](#add-class-on-click)
- [Additional Resources](#additional-resources)

<!-- /TOC -->
<a id="markdown-overview" name="overview"></a>

## Overview

```js
element.addEventListener('event', eventHandler);
```

- `element`: is the HTML element to which you want to attach the click event listener. The HTML
  element can be selected using one of the many [DOM selector
  elements](/docs/javascript/javascript-cheatsheet#get-dom-element).
- `event`: is the name of the event to listen for. ('click', 'submit', 'keydown', etc)
- `eventHandler`: is a callback function that will be executed when the click event occurs. The
  eventHandler takes a single parameter which is the event object commonly denoted as `e`.

```js
element.addEventListener('event', e => { });
```

<a id="markdown-handling-the-event-callback" name="handling-the-event-callback"></a>

## Handling the event callback

The eventHandler or callback, takes a single parameter which is the event object commonly denoted
as `e`.

This event object gives different kinds of info. For example, where your mouse is, the screen
size, and  a whole lot more.

One of the most important items is the target. The `target` is essentially the he 'thing' or
'element' the event happened on.

```html
<div class="app"></div>
```

```js
const theTarget = document.querySelector('.app');
theTarget.addEventListener('event', e => console.log(e.target));
// outputs: <div class="app"></div>
```

<a id="markdown-event-bubbling-and-capturing" name="event-bubbling-and-capturing"></a>

## Event Bubbling and Capturing

The short version

- Bubbling goes from the target element up to the root of the DOM hierarchy.
- Capturing, also known as 'trickling' goes from the root down to the target element.

<div class="bx purple flex va-c">
    <svg class="icon wh-2 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#info"></use></svg>
     <div>Remember, bubbles go up, water trickles down.</div>
</div>

<a id="markdown-bubbling" name="bubbling"></a>

### Bubbling

Event bubbling is the default behavior in which an event starts from the target element that
triggered it and then "bubbles up" through its parent elements in the DOM hierarchy. This means
that the innermost element's event is triggered first, followed by its parent, and then its
parent's parent, and so on, up to the top-level element (usually the document).

```js
const grandparent = document.querySelector('.grandparent');
const parent = document.querySelector('.parent');
const child = document.querySelector('.child');

grandparent.addEventListener('click', (e) => console.log(`Grandparent clicked`));
parent.addEventListener('click', (e) => console.log(`Parent clicked`));
child.addEventListener('click', (e) => console.log('Child clicked'));
```

In this example, clicking the `grandparent` `<div>` triggers only the event associated with the
grandparent. Clicking the `parent` `<div>` triggers events for both the `grandparent` and
`parent`. And, as you might expect, clicking the `child` `<div>` triggers events for all three:
`grandparent`, `parent`, and `child`.

<a id="markdown-capturing" name="capturing"></a>

### Capturing

Event capturing (also known as Trickling) is the opposite of bubbling. It involves the event
starting from the top-level element and "trickling down" through the nested elements to the
target element that originally triggered the event.

Capturing is handled by passing a third parameter (options) to the event listener:

```js
element.addEventListener('event', eventHandler, {capture: true});
```

```js
const grandparent = document.querySelector('.grandparent');
const parent = document.querySelector('.parent');
const child = document.querySelector('.child');

grandparent.addEventListener('click', (e) => console.log(`Grandparent capture`), { capture: true });
parent.addEventListener('click', (e) => console.log(`Parent capture`), { capture: true });
child.addEventListener('click', (e) => { console.log('Child capture') }, { capture: true });

grandparent.addEventListener('click', (e) => console.log(`Grandparent bubble`));
parent.addEventListener('click', (e) => console.log(`Parent bubble`));
child.addEventListener('click', (e) => console.log('Child bubble'));

// Grandparent capture
// Parent capture
// Child capture
// Child bubble
// Parent bubble
// Grandparent bubble
```

<a id="markdown-stop-propagation-tbd" name="stop-propagation-tbd"></a>

### Stop propagation (TBD)

<a id="markdown-fire-and-event-only-once-tbd" name="fire-and-event-only-once-tbd"></a>

### Fire and event only once (TBD)


<a id="markdown-remove-event-listeners-tbd" name="remove-event-listeners-tbd"></a>

## Remove event listeners (TBD)

<a id="markdown-delegate-events-tbd" name="delegate-events-tbd"></a>

## Delegate events (TBD)

<a id="markdown-examples" name="examples"></a>

## Examples

<a id="markdown-run-a-function-on-click" name="run-a-function-on-click"></a>

### Run a function on click

```js
element.addEventListener('click', functionName);
```

<a id="markdown-add-class-on-click" name="add-class-on-click"></a>

### Add class on click


```js
document.querySelector('.btn').addEventListener('click', () => {
    // Add your desired class name here (e.g., "new-class")
    const classNameToAdd = 'green';

    // Get the first element with the class "bx"
    const bxElement = document.querySelector('.bx');

    // Check if the element already has the class
    const hasClass = bxElement.classList.contains(classNameToAdd);

    // If the element does not have the class, add it; otherwise, remove it
    if (!hasClass) {
        bxElement.classList.add(classNameToAdd);
    } else {
        bxElement.classList.remove(classNameToAdd);
    }
});
```

----------

```js
function eventHandler(event) {
  if (event.type === "fullscreenchange") {
    /* handle a full screen toggle */
  } else {
    /* handle a full screen toggle error */
  }
}
```

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

<a href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener" target="blank">MDN EventTarget: addEventListener() method</a>
