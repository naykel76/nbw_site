# CSS Frequently Asked Questions

<!-- TOC -->

- [Grid and Flexbox](#grid-and-flexbox)
    - [`place-content` not working as expected](#place-content-not-working-as-expected)
    - [How do I prevent grid blowout?](#how-do-i-prevent-grid-blowout)
- [Using flexbox, how can I push an element to the top then have a second item take up the rest of the page?](#using-flexbox-how-can-i-push-an-element-to-the-top-then-have-a-second-item-take-up-the-rest-of-the-page)

<!-- /TOC -->

<a id="markdown-grid-and-flexbox" name="grid-and-flexbox"></a>

## Grid and Flexbox
<a id="markdown-place-content-not-working-as-expected" name="place-content-not-working-as-expected"></a>

### `place-content` not working as expected
You need to use `flex-wrap:wrap;` to be able to use align-content with flexbox


<a id="markdown-how-do-i-prevent-grid-blowout" name="how-do-i-prevent-grid-blowout"></a>

### How do I prevent grid blowout?

https://css-tricks.com/preventing-a-grid-blowout/

	.grid {
	  /* auto minimum width, causing problem */
	  grid-template-columns: 1fr 300px;

	  /* fix: minimum width of 0 */
	  grid-template-columns: minmax(0, 1fr) 300px;
	}

<a id="markdown-using-flexbox-how-can-i-push-an-element-to-the-top-then-have-a-second-item-take-up-the-rest-of-the-page" name="using-flexbox-how-can-i-push-an-element-to-the-top-then-have-a-second-item-take-up-the-rest-of-the-page"></a>

## Using flexbox, how can I push an element to the top then have a second item take up the rest of the page?

```
.container {
  display: flex;
  flex-direction: column;
  height: 100vh; /* or whatever height you want the container to be */
}

.item1 {
  align-self: flex-start;
}

.item2 {
  flex: 1;
}
```
