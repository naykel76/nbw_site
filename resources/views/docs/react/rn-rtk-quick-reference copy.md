# Redux Toolkit Quick Reference for React Native

<div class="small-headings"></div>

This guide offers a step-by-step approach to integrating Redux Toolkit into a React
Native application. The table of contents acts as a checklist, outlining the sequential
steps required to set up Redux Toolkit effectively in a React Native environment.

**Note:** This guide does not focus on concrete implementations of specific features or
functionalities. Instead, it serves as a high-level overview of the setup process,
offering a quick reference resembling a checklist.

- [Initial Setup](#initial-setup)
  - [Install required packages `npm install @reduxjs/toolkit react-redux`](#install-required-packages-npm-install-reduxjstoolkit-react-redux)
  - [Create a **slice** in the features directory `src/features/feature/featureSlice.js`](#create-a-slice-in-the-features-directory-srcfeaturesfeaturefeatureslicejs)
  - [Create the **store** with `configureStore` in `src/app/store.js`](#create-the-store-with-configurestore-in-srcappstorejs)
  - [Provide the redux store to React in `App.jsx`](#provide-the-redux-store-to-react-in-appjsx)
- [Update the slice to include actions (Reducers)](#update-the-slice-to-include-actions-reducers)
- [Add Redux to a component with `useSelector` and `useDispatch` hooks](#add-redux-to-a-component-with-useselector-and-usedispatch-hooks)
- [Create an async thunk using `createAsyncThunk`](#create-an-async-thunk-using-createasyncthunk)
- [Validation and existing state check in async thunks](#validation-and-existing-state-check-in-async-thunks)
  - [Check for existing state when store data is an array](#check-for-existing-state-when-store-data-is-an-array)
  - [Check for existing state when store data is an object](#check-for-existing-state-when-store-data-is-an-object)
  - [Handle when `value` is `undefined` or `null` in the `payload creator` function.](#handle-when-value-is-undefined-or-null-in-the-payload-creator-function)
- [Things to check when nothing goes right](#things-to-check-when-nothing-goes-right)
  - [Makes sure you are getting the correct data from the API](#makes-sure-you-are-getting-the-correct-data-from-the-api)
    - [Understand your state objects](#understand-your-state-objects)

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
export selectFeatureState = (state) => state.feature;
export default featureSlice.reducer;
```


### Create the **store** with `configureStore` in `src/app/store.js`

1. import `configureStore` from `@reduxjs/toolkit`
2. import the `featureSlice` reducer from the slice file
3. create the store using `configureStore` and add the `reducer` object
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


## Update the slice to include actions (Reducers)

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


## Create an async thunk using `createAsyncThunk`

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
        // Code to perform an asynchronous operation and return the data
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




## Validation and existing state check in async thunks

To check if the something is already in the state before fetching, you can use the
`getState` function that's provided by `thunkAPI`.

### Check for existing state when store data is an array

```js
const initialState = {
    data: ['item1', 'item2', 'item3']
};

export const fetchDataIfNeeded = createAsyncThunk(
    'feature/fetchDataIfNeeded',
    async (_, thunkAPI) => {
        const stateData = thunkAPI.getState().feature.data;
        if (stateData.length > 0) return stateData;
        // Code to perform an asynchronous operation and return the data
    }
);
```

### Check for existing state when store data is an object

```js
export const fetchProductsByCategory = createAsyncThunk(
    'category/fetchProductsByCategory',
    async (category, thunkAPI) => {
        // If no category is provided, reject the promise with a value of 'category not found'
        if (!category) return thunkAPI.rejectWithValue('category not found');
        // Get the products for the category from the state
        const existing = thunkAPI.getState().products.data[category];
        // If the products for this category already exist in the state, return them
        if (existing) return { [category]: existing };

        // Code to perform an asynchronous operation and return the data
    }
);
```

### Handle when `value` is `undefined` or `null` in the `payload creator` function.

```js
// in the payload creator function
export const fetchProductById = createAsyncThunk(
    'product/fetchProductById',
    async (id, thunkAPI) => {
        if(!id) thunkAPI.rejectWithValue('Product ID can not be empty');
        // Code to perform an asynchronous operation and return the data
    }
);

// update the rejected case in the extraReducers 
.addCase(fetchProductById.rejected, (state, action) => {
    state.isLoading = false;
    state.error = action.error.message;
});
```

## Things to check when nothing goes right

Check to make sure you are getting the correct data from the API. If the data is not


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

<!-- 
return { [category]: products };

The square brackets around category mean that the value of category will be used as the
property key in the returned object. This is called a computed property name. -->






<!-- 2. Check the API response structure and ensure it matches the expected format.
3. Verify the action types and payload data in the `extraReducers` section.
4. Inspect the state changes in the Redux DevTools extension.
5. Debug the async thunk logic and error handling.
6.  -->