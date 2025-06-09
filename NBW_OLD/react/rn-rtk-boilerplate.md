# Redux Toolkit Quick Reference

<div class="small-headings"></div>

This guide offers a step-by-step approach to integrating Redux Toolkit into a React
Native application. The table of contents acts as a checklist, outlining the sequential
steps required to set up Redux Toolkit effectively in a React Native environment.

**Note:** This guide does not focus on concrete implementations of specific features or
functionalities. Instead, it serves as a high-level overview of the setup process,
offering a quick reference resembling a checklist.

<!-- TOC depthFrom:2 depthTo:5 -->
- [Initial Setup](#initial-setup)
  - [Install required packages `npm install @reduxjs/toolkit react-redux`](#install-required-packages-npm-install-reduxjstoolkit-react-redux)
  - [Create a slice `src/features/feature/featureSlice.js`](#create-a-slice-srcfeaturesfeaturefeatureslicejs)
  - [Create the store `src/app/store.js`](#create-the-store-srcappstorejs)
  - [Provide the redux store to React in `App.jsx`](#provide-the-redux-store-to-react-in-appjsx)
- [Add state management to a feature slice](#add-state-management-to-a-feature-slice)
  - [Add reducers to slice and export the actions](#add-reducers-to-slice-and-export-the-actions)
  - [Create an async thunk using `createAsyncThunk`](#create-an-async-thunk-using-createasyncthunk)
    - [Payload techniques for setting data in the state](#payload-techniques-for-setting-data-in-the-state)
      - [Set the data in the state with the action payload](#set-the-data-in-the-state-with-the-action-payload)
    - [Payload techniques including existence, validation, and error handling](#payload-techniques-including-existence-validation-and-error-handling)
      - [Verifying the payload creator parameter has been passed](#verifying-the-payload-creator-parameter-has-been-passed)
      - [Check if the data is already in the state (by ID)](#check-if-the-data-is-already-in-the-state-by-id)
  - [Check for existing state when store data is an object](#check-for-existing-state-when-store-data-is-an-object)
- [Add Redux to a component with `useSelector` and `useDispatch` hooks](#add-redux-to-a-component-with-useselector-and-usedispatch-hooks)
- [Things to check when your having a bad day](#things-to-check-when-your-having-a-bad-day)
  - [Makes sure you are getting the correct data from the API](#makes-sure-you-are-getting-the-correct-data-from-the-api)
    - [Understand your state objects](#understand-your-state-objects)
<!-- TOC -->
## Initial Setup

### Install required packages `npm install @reduxjs/toolkit react-redux`

### Create a slice `src/features/feature/featureSlice.js`

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
export selectFeatureState = (state) => state.feature;
export default featureSlice.reducer;
```


### Create the store `src/app/store.js`

1. import `configureStore` from `@reduxjs/toolkit`
2. create the store using `configureStore` and add the `reducer` object
3. import the `featureSlice` reducer from the slice file
4. add the `featureSlice` reducer to the `reducer` object

```js
// src/app/store.js
import { configureStore } from '@reduxjs/toolkit';
import featureReducer from '../features/feature/featureSlice';

export const store = configureStore({
    reducer: { 
        feature: featureReducer 
    },
});
```

### Provide the redux store to React in `App.jsx`

1. import the `Provider` component from `react-redux`
2. import the `store` from the `store.js` file
3. wrap the root component with the `Provider` component and pass the `store` as a prop

```jsx
// App.jsx
import { Provider } from 'react-redux';
import { store } from './src/app/store';

function App() {
    return (
        <Provider store={store}>
            {/* Your app components */}
        </Provider>
    );
}
```


## Add state management to a feature slice

### Add reducers to slice and export the actions

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
        action1: (state) => { },
        action2: (state, action) => { },
    },
});

export const { action1, action2 } = featureSlice.actions;
export default featureSlice.reducer;
```


### Create an async thunk using `createAsyncThunk`

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
        
        try {
            // Code to perform an asynchronous operation and return the data
        } catch (error) {
            return thunkAPI.rejectWithValue(error.message);
        }
    }
);

const featureSlice = createSlice({
    name: 'feature',
    initialState,
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(someActionAsync.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(someActionAsync.fulfilled, (state, action) => {
                state.loading = false;
                state.error = null;
                // set the data in the state with the action payload
                state.data = action.payload;
            })
            .addCase(someActionAsync.rejected, (state, action) => {
                state.isLoading = false;
                state.error = action.error.message;
            });
    }
});

export default featureSlice.reducer;
```

<!-- setting items in the state with the action payload

```js
.addCase(someActionAsync.fulfilled, (state, action) => {
    state.loading = false;
    state.error = null;
    // set the data in the state with the action payload
    state.data = action.payload;
})
``` -->

#### Payload techniques for setting data in the state

##### Set the data in the state with the action payload

```js
.addCase(someActionAsync.fulfilled, (state, action) => {
    state.data = action.payload;
})
```



#### Payload techniques including existence, validation, and error handling

```html +parse
<x-alert type="info">
Always make sure you are aware of the data structure in your state before attempting
to access it. This will help you avoid errors and make your code more robust.
</x-alert>
```

<!-- To check if the something is already in the state before fetching, you can use the
`getState` function that's provided by `thunkAPI`. -->

##### Verifying the payload creator parameter has been passed

```js
export const fetchFeatureById = createAsyncThunk(
    'feature/fetchFeatureById',
    async (id, thunkAPI) => {
        if(!id) thunkAPI.rejectWithValue('Feature ID can not be empty');
        // Code to perform an asynchronous operation and return the data
    }
);
```

Handle the error in the `rejected` case of the `extraReducers`:

```js
extraReducers: (builder) => {
    builder
        .addCase(fetchFeatureById.rejected, (state, action) => {
            state.isLoading = false;
            state.error = action.payload;
        });
}
```

##### Check if the data is already in the state (by ID)

```js
// need to con
{
    data: {
        '1': { id: '1', name: 'Feature 1', description: 'This is feature 1', },
        '2': { id: '2', name: 'Feature 2', description: 'This is feature 2', },
    },
}

export const fetchFeatureById = createAsyncThunk(
    'feature/fetchFeatureById',
    async (id, thunkAPI) => {
        const existing = thunkAPI.getState().feature.data[id];
        // If the feature already exists in the state, return it
        if(existing) return state.feature.data[id];

        // else, perform an asynchronous operation and return the data
    }
);
```

### Check for existing state when store data is an object

```js
export const fetchProductsByCategory = createAsyncThunk(
    'feature/fetchProductsByCategory',
    async (feature, thunkAPI) => {
        // If no feature is provided, reject the promise with a value of 'feature not found'
        if (!feature) return thunkAPI.rejectWithValue('feature not found');
        // Get the products for the feature from the state
        const existing = thunkAPI.getState().products.data[feature];
        // If the products for this feature already exist in the state, return them
        if (existing) return { [feature]: existing };

        // Code to perform an asynchronous operation and return the data
    }
);
```





## Add Redux to a component with `useSelector` and `useDispatch` hooks

1. Import `useSelector` and `useDispatch` hooks from react-redux.
2. Use `useSelector` to select state from the Redux store.
3. Use `useDispatch` to dispatch actions to update state.

```jsx
// src/components/MyComponent.jsx
import { useSelector, useDispatch } from 'react-redux';
import { action1, action2, selectFeatureState } from '../features/feature/featureSlice';

function MyComponent() {
    const { data, isLoading, error } = useSelector(selectFeatureState);
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




## Things to check when your having a bad day

Check to make sure you are getting the correct data from the API.


### Makes sure you are getting the correct data from the API


#### Understand your state objects

Selecting the entire Redux state object (all slices):

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

**Make sure you are getting the correct slice.**

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


