# Things to check when your having a bad day

<div class="small-headings"></div>

- [Are you getting the correct slice?](#are-you-getting-the-correct-slice)
  - [Are you working with the correct state object?](#are-you-working-with-the-correct-state-object)
- [Have you included the slice in the `configureStore` function?](#have-you-included-the-slice-in-the-configurestore-function)

## Are you getting the correct slice?

When using the `useSelector` hook, make sure you are selecting the correct slice of the
state object. This is the second part of the selector function and should match the name
of the slice you defined in the `configureStore` when setting up the Redux store. For
example, if you have a slice named `products`, the selector should look like this:

```js
// store.js
export const store = configureStore({
    reducer: {
        products: productsReducer,
    },
});
```

```js
const { data, error, isLoading } = useSelector(state => state.products);
```

### Are you working with the correct state object?

When using `useSelector`, make sure you are selecting the intended state object.
If working with multiple slices, you can select the entire state object or a
specific slice:

Here are some different ways to use `useSelector`:

```js
const state = useSelector(state => state)
```

Selecting a specific `feature` slice of your state:
```js
const featureState = useSelector(state => state.feature)
```

Destructuring properties `data`, `error`, and `isLoading` from the feature slice.
```js
const { data, error, isLoading } = useSelector(state => state.feature);
```


## Have you included the slice in the `configureStore` function?

```js
export const store = configureStore({
    reducer: {
        feature: featureReducer,
    },
});
```


