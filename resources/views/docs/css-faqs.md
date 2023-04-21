# CSS Frequently Asked Questions

##### Place-content not working as expected
You need to use `flex-wrap:wrap;` to be able to use align-content with flexbox


## How do I prevent content from expanding grid items (grid blowout)

https://css-tricks.com/preventing-a-grid-blowout/

	.grid {
	  /* auto minimum width, causing problem */
	  grid-template-columns: 1fr 300px;

	  /* fix: minimum width of 0 */
	  grid-template-columns: minmax(0, 1fr) 300px;
	}

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
