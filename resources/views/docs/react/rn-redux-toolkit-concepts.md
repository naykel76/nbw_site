# Redux Toolkit Concepts

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
  - [Summary](#summary)
- [Whats next?](#whats-next)
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

The following examples aim to offer an abstract overview, serving to help you understand
the basic concepts of Redux Toolkit without getting bogged down in the details.

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
application. A slice requires:

- the `createSlice` function from `@reduxjs/toolkit`
- `name`: This is the name of the slice/feature. It's used to generate action type strings.
- `initialState`: This is the initial state of the slice, typically an object.
- `reducers`: An object containing functions to update the state based on dispatched actions.

**Things to know:**

- **Reducer Functions**: Each function inside the `reducers` object handles a specific
  action and updates the state accordingly.
- **Action Creators**: `createSlice` automatically generates action creators with the same
  names as the `reducer` functions and includes them in the slice object. 

Here's a general structure of a slice:

```js
// src/features/feature/featureSlice.js
import { createSlice } from '@reduxjs/toolkit';

const initialState = {};

const featureSlice = createSlice({
    name: 'feature',
    initialState,
    reducers: {
        // These are named action1 and action2, but they serve as reducers that
        // will automatically generate action creators with the same names. Each
        // function will handle a specific action and update the state accordingly.
        action1: (state) => {
            // Handle action1
        },
        action2: (state, action) => {
            // Handle action2
        },
    },
});

// Although named action1 and action2, these are essentially reducers 
// that are being converted to action creators with the same names.
export const { action1, action2 } = featureSlice.actions;
export default featureSlice.reducer;
```

<question>Why doesn't the `action1` reducer function accept an `action` parameter?</question>

In Redux, not all actions necessarily need to carry a payload. This is a valid scenario to
demonstrate that concept. For example, if you had a counter that only needed to increment
by 1, you wouldn't need to pass a payload to the action, however, if you needed to
increment by a specific amount, you would pass a payload.

### Add the slice to the store

Next, we need to import and add the slice to the store. Defining the reducer in the
store is as simple as adding the slice to the `reducer` object.

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';
import featureReducer from '../features/feature/featureSlice';

const store = configureStore({
    reducer: {
        feature: featureReducer,
    },
});

export default store;
```

### Usage in a component

Now that we have the store set up and a slice added to it, we can use the `useSelector`
and `useDispatch` hooks from `react-redux` to interact with the store in a component.

**Things to know:**

- `useSelector`: This hook allows you to select data from the Redux store state. The
  selector function you provide as an argument receives the entire state and returns the
  specific data you need for your component. When the selected data changes, the
  component will re-render to reflect the updated state.
- `useDispatch`: This hook gives you access to the dispatch function from the Redux
  store. You can use dispatch to trigger actions, such as updating state, fetching data
  asynchronously, or handling user interactions within your component.

```js
import { Button, StyleSheet, Text, View } from 'react-native';
import { useSelector, useDispatch } from 'react-redux';
import { action1, action2 } from '../features/feature/featureSlice';

export default function HomeScreen() {
    const someState = useSelector((state) => state.feature.value);
    const dispatch = useDispatch();

    return (
        <>
            <Text>{someState}</Text>
            <Button title="someAction1" onPress={() => dispatch(action1())} />
            <Button title="someAction2" onPress={() => dispatch(action2())} />
        </>
    );
}
```

### Summary

- **Store**: The store is the central place where your application state lives. It provides
  access to the state via certain methods and allows the state to be updated through actions.
- **Slice**: A slice is a collection of Redux reducer logic and actions for a single feature
- **Reducer Functions**: Each function inside the `reducers` object handles a specific
  action and updates the state accordingly.
- **Action Creators**: `createSlice` automatically generates action creators with the same
- **Usage in a component**: `useSelector` and `useDispatch` hooks from `react-redux` to
  interact with the store in a component.

```html +parse
<x-alert type="danger">
The following diagram need to be checked for correctness.
</x-alert>
```

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

## Whats next?

This guide is just the tip of the iceberg, in fact it's more like the tip of the tip of
the iceberg. There's a lot more to learn about Redux Toolkit, such as:

- [Creating Async Thunks](/docs/react/rn-rtk-thunk)

<!-- - [Creating Slices with Extra Reducers](/docs/react/rn-rtk-slice) -->
<!-- - [Creating a Slice with Async Thunks](/docs/react/rn-rtk-slice-thunk) -->


## Additional resources

- <a href="https://redux-toolkit.js.org/" target="blank">RTK documentation</a>
- <a href="https://redux-toolkit.js.org/tutorials/quick-start" target="blank">RTK Quick Start</a>
- <a href="https://github.com/naykel76/react_native_cookbook/blob/master/rtk-react-native/src/features/counter/counterSlice.js
" target="blank">Simple Counter Slice Example</a>

