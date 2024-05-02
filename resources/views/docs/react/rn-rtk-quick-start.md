# React Native Redux Toolkit Quick Start

<div class="small-headings"></div>

This guide offers a step-by-step approach to integrating Redux Toolkit into a React
Native application. The table of contents acts as a checklist, outlining the sequential
steps required to set up Redux Toolkit effectively in a React Native environment.

**Note:** This guide does not focus on concrete implementations of specific features or
functionalities. Instead, it serves as a high-level overview of the setup process,
offering a quick reference resembling a checklist.

<!-- It is intended to act like a checklist  -->

- [Initial Setup](#initial-setup)
  - [Install required packages `npm install @reduxjs/toolkit react-redux`](#install-required-packages-npm-install-reduxjstoolkit-react-redux)
  - [Create a **slice** in the features directory `src/features/feature/featureSlice.js`](#create-a-slice-in-the-features-directory-srcfeaturesfeaturefeatureslicejs)
  - [Create the **store** `src/app/store.js`](#create-the-store-srcappstorejs)
  - [Provide the redux store to React in `App.jsx`](#provide-the-redux-store-to-react-in-appjsx)
  - [Update the slice to include actions (Reducers)](#update-the-slice-to-include-actions-reducers)
  - [Update the store to include the reducer(s)](#update-the-store-to-include-the-reducers)
- [Add Redux to a component to manage state changes and dispatch actions.](#add-redux-to-a-component-to-manage-state-changes-and-dispatch-actions)
- [Create an async thunk using `createAsyncThunk` to handle asynchronous logic.](#create-an-async-thunk-using-createasyncthunk-to-handle-asynchronous-logic)


This is a high-level overview of how to use Redux Toolkit with React Native to manage
state in your application. Redux Toolkit is the official, recommended way to write Redux
logic. It provides a set of tools and best practices that help you write Redux logic
more efficiently and with less boilerplate code.

## Initial Setup

### Install required packages `npm install @reduxjs/toolkit react-redux`

### Create a **slice** in the features directory `src/features/feature/featureSlice.js`

1. define the `name`, `initialState`, `reducers`, and `extraReducers` for the slice.
2. add the export statement for the slice reducer and action creators

```js
// src/features/feature/featureSlice.js
import { createSlice } from '@reduxjs/toolkit';

const initialState = {
    data: {},
    isLoading: false,
    error: null
};

const featureSlice = createSlice({
    name: 'feature',
    initialState,
    reducers: {},
    extraReducers: {},
});

export const { } = featureSlice.actions;
export default featureSlice.reducer;
```

### Create the **store** `src/app/store.js`

1. import `configureStore` from `@reduxjs/toolkit`
2. create the store using `configureStore` and reducer object

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';
import featureReducer from '../features/feature/featureSlice';

const store = configureStore({
    reducer: { },
});
```

### Provide the redux store to React in `App.jsx`

```jsx
// App.jsx
import { Provider } from 'react-redux';
import store from './app/store';

function App() {
    return (
        <Provider store={store}>
            {/* Your app components */}
        </Provider>
    );
}
```

### Update the slice to include actions (Reducers)

1. Define actions (reducers) in the slice to handle state changes.
2. Export the action creators from the slice to dispatch the reducers.

```js
// src/features/feature/featureSlice.js
import { createSlice } from '@reduxjs/toolkit';

const initialState = {
    data: {},
    isLoading: false,
    error: null
};

const featureSlice = createSlice({
    name: 'feature',
    initialState,
    reducers: {
        action1: (state) => {
            // Handle action1
        },
        action2: (state, action) => {
            // Handle action2
        },
        // Add more reducers as needed
    },
});

export const { action1, action2 } = featureSlice.actions;
export default featureSlice.reducer;
```

### Update the store to include the reducer(s)

1. Import any reducer(s).
2. Add the reducer to the stores `reducer` configuration.

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';
import featureReducer from '../features/feature/featureSlice';

const store = configureStore({
    reducer: {
        feature: featureReducer,
    },
});
```

## Add Redux to a component to manage state changes and dispatch actions.

1. Import `useSelector` and `useDispatch` hooks from react-redux.
2. Use `useSelector` to select state from the Redux store.
3. Use `useDispatch` to dispatch actions to update state.

```jsx
// src/components/Home.jsx
import { useSelector, useDispatch } from 'react-redux';
import { action1, action2 } from '../features/feature/featureSlice';

function Home() {
    const data = useSelector((state) => state.feature.data);
    const dispatch = useDispatch();

    const handleAction1 = () => {
        dispatch(action1());
    };

    const handleAction2 = () => {
        dispatch(action2({ payload: 'data' }));
    };

    return (
        <div>
            {/* Your component UI */}
        </div>
    );
}
```

## Create an async thunk using `createAsyncThunk` to handle asynchronous logic.

In the slice file:

1. Import `createAsyncThunk` from `@reduxjs/toolkit`.
2. Define an async thunk using `createAsyncThunk` to handle asynchronous logic including
   the action type string and the "payload creator" function(s).
3. Update the `extraReducers` in the slice to include the async thunk including `pending`,
   `fulfilled`, and `rejected` actions.

```js
// src/features/feature/featureSlice.js
import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';

const initialState = {
    data: {},
    isLoading: false,
    error: null
};

export const someActionAsync = createAsyncThunk(
    'feature/someAction',
    async (value, thunkAPI) => {
        // Perform an asynchronous operation here
        return // the result as a promise
    }
);

const featureSlice = createSlice({
    name: 'feature',
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(someActionAsync.pending, () => {
                // Handle pending state
            })
            .addCase(someActionAsync.fulfilled, (state, action) => {
                // Handle fulfilled state
            })
            .addCase(someActionAsync.rejected, (state, action) => {
                // Handle rejected state
            });
    }
});

export default featureSlice.reducer;
```