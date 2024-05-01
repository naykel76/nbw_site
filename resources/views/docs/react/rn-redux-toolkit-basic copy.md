# Redux Toolkit - The Basics

```html +parse
<x-alert type="warning">
<p>Buckle up! The world of Redux can feel like a rabbit hole wonderland. This is by no
means a comprehensive guide to Redux, but aimed at demystifying Redux, React-Redux, and
Redux Toolkit, and how they work together to manage your application's state. The focus
in this guide will be on using Redux Toolkit, the current go-to method for using Redux.</p>
</x-alert>
```
- [Overview](#overview)
- [Why Redux Toolkit?](#why-redux-toolkit)
- [Installation](#installation)
- [Getting started](#getting-started)
  - [Create the store](#create-the-store)
  - [Provide the redux store to React](#provide-the-redux-store-to-react)
  - [Create a slice](#create-a-slice)
  - [Add the slice to the store](#add-the-slice-to-the-store)
  - [Usage in a component](#usage-in-a-component)
- [Additional resources](#additional-resources)


## Overview

Before we dig in, it's a good idea to learn the basics or redux. Redux is a state
management library for JavaScript applications. It acts like a central container for
your app's state, ensuring everything stays consistent and predictable. 

If you're not familiar with the 3 core concepts and 3 principles of Redux, some of the
example code in this guide may not make sense. In that case, you should [read this
first](/docs/redux-overview) to demystify some of the technical jargon before
continuing.


## Why Redux Toolkit?

The short answer is that Redux Toolkit just makes your life easier!

The slightly longer answer is that it's the Redux Toolkit package is intended to be the
standard way to write Redux logic and solve common problems with Redux like:

1. Configuring a Redux store is too complicated
2. I have to add a lot of packages to get Redux to do anything useful
3. Redux requires too much boilerplate code

## Installation

```bash
npm install @reduxjs/toolkit react-redux
```

Note: `@reduxjs/toolkit` is a wrapper around Redux so there is no need to install Redux separately.

## Getting started

These step are somewhat in order, but you can jump around as needed.

The following examples are focused on a generic and not a specific use case. The examples

### Create the store

The store is the central place where your application state lives. There can only be one
store in a Redux application that holds the app's state. It provides access to the state
via certain methods and allows the state to be updated through actions.

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';

export const store = configureStore({
  reducer: {},
});
```

### Provide the redux store to React

The `Provider` component makes the Redux store available to any nested components that
need to access the store. It should be placed at the root of your application.

```js
// App.js
import React from 'react';
import { Provider } from 'react-redux';
import { store } from './src/app/store';
import HomeScreen from './src/screens/HomeScreen';

export default function App() {
    return (
        <Provider store={store}>
            <HomeScreen />
        </Provider>
    );
}
```

### Create a slice

A slice is a collection of Redux reducer logic and actions for a single feature of your
application. A slice requires the `createSlice` function from `@reduxjs/toolkit`, the `name` of the
slice, the `initialState` of the slice, and a `reducers` object that contains functions
to update the state.

The `createSlice` function automatically generates action creators with the same names
as the reducer functions, and includes them in the slice object, so you can dispatch
actions like `counterSlice.actions.increment()` to increment the counter in the
following example.

```js
// src/features/counter/counterSlice.js
import { createSlice } from '@reduxjs/toolkit';

const initialState = {
    value: 0,
};

const counterSlice = createSlice({
    name: 'counter',
    initialState,
    reducers: {
        increment: (state) => {
            state.value += 1;
        },
        decrement: (state) => {
            state.value -= 1;
        },
    },
});

export const { increment, decrement } = counterSlice.actions;
export default counterSlice.reducer;
```

**So what am I looking at here?**

- `createSlice` is a function that takes an object with the `name`, `initialState`, and
  `reducers` properties.
- `name` is a string that is used to generate action type strings.
- `initialState` is the initial state of the slice.
- `reducers` is an object where the keys are the action names and the values are the
  functions that update the state.
- `increment` and `decrement` are the action creators that are exported from the slice.
- `counterSlice.reducer` is the reducer function that is exported from the slice.


<!-- **Why is there no action passed to the reducer function?** -->


### Add the slice to the store

Next, we need to import and add the slice to the store. Defining the reducer in the
store is as simple as adding the slice to the `reducer` object.

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';
import counterReducer from '../features/counter/counterSlice';

const store = configureStore({
    reducer: {
        counter: counterReducer,
    },
});

export default store;
```

### Usage in a component

Now that we have the store set up and a slice added to it, we can use the `useSelector`
and `useDispatch` hooks from `react-redux` to interact with the store in a component.

```js
import { Button, StyleSheet, Text, View } from 'react-native';
import { useSelector, useDispatch } from 'react-redux';
import { increment, decrement } from '../features/counter/counterSlice';

export default function HomeScreen() {
    // useSelector is a hook that allows you to extract data from the Redux
    // store state using a selector function. The selector function receives
    // the entire store state as its argument and returns the data that you
    // need from the state. If the data changes, the component will re-render.
    const count = useSelector((state) => state.counter.value);
    
    // useDispatch is a hook that returns a reference to the dispatch function
    // from the Redux store. You can use it to dispatch actions to the store.
    const dispatch = useDispatch();

    return (
        <>
            <Text>{count}</Text>
            <Button title="increment" onPress={() => dispatch(increment())} />
            <Button title="decrement" onPress={() => dispatch(decrement())} />
        </>
    );
}

// styles here ...
```

```html +parse
<x-alert type="danger">
The following diagram need to be checked for correctness.
</x-alert>
```

Here's a diagram to help you visualize the flow of data in a Redux application starting from the creation of the store to updating the state in a component.

```mermaid +parse
<x-mermaid>
graph LR
  A[Create Store] --> B[Define Slice]
  B --> C[Create Async Thunk]
  C --> D[Dispatch Action]
  D --> E[Middleware Processes Thunk]

</x-mermaid>
```

  E --> F[API Call]
  F -->|Success| G[Dispatch Success Action]
  F -->|Failure| H[Dispatch Failure Action]
  G --> I[Update State]
  H --> J[Update State]


```mermaid +parse
<x-mermaid>
graph LR
    A[Create Store] --> B[Provide Store]
    B --> C[Component]
    C --> D["useSelector (Get State)"]
    C --> E["useDispatch (Dispatch Action)"]
    A --> F[Create Slice]
    F --> B["Add Reducers and Actions"]
    E --> B[Update State]
</x-mermaid>
```




## Additional resources

- <a href="https://redux-toolkit.js.org/" target="blank">Redux Toolkit documentation</a>
- <a href="https://redux-toolkit.js.org/tutorials/quick-start" target="blank">RTK Quick Start</a>