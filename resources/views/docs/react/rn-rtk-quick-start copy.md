# React Native Redux Toolkit Quick Start


This is a high-level overview of how to use Redux Toolkit with React Native to manage
state in your application. Redux Toolkit is the official, recommended way to write Redux
logic. It provides a set of tools and best practices that help you write Redux logic
more efficiently and with less boilerplate code.

1. Install required packages `npm install @reduxjs/toolkit react-redux`
2. Create a **slice** in the features directory `src/features/feature/featureSlice.js`
   - define the `name`, `initialState`, `reducers`, and `extraReducers` for the slice.
   - add the export statement for the slice reducer `featureSlice.reducer`
3. Create the **store** `src/app/store.js`
   - import `configureStore` from `@reduxjs/toolkit`
   - import any feature slice reducer(s)
   - add the slice reducer(s) to the `reducer` object
4. Provide the **redux store to React** in `App.jsx`
5. 

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

```jsx
// src/components/FeatureComponent.jsx  
import { useSelector } from 'react-redux';

function FeatureComponent() {
    const data = useSelector((state) => state.feature.data);
    const isLoading = useSelector((state) => state.feature.isLoading);
    const error = useSelector((state) => state.feature.error);

    return (
        <div>
            {/* Your component UI */}
        </div>
    );
}
```



<!-- 

1. **Define an async thunk** using `createAsyncThunk` to handle asynchronous logic.
   - Add the action type string (e.g., `feature/someAction`).
   - Add "payload creator" function(s), which are an async function that returns a promise.
2. **Add Extra Reducers**
   - Inside your slice definition (`createSlice`), add extra reducers to handle
     `pending`, `fulfilled`, and `rejected` actions dispatched by the async thunk.
3. **Export the async thunk, action creators, and the slice reducer**.
4. **Dispatch Thunk**
   - In your React component, use the `useDispatch` hook from `react-redux` to dispatch
     the async thunk.
5. **Handle State Changes**
    - Use the `useSelector` hook from `react-redux` to select and react to state changes
      triggered by the async thunk.

 -->
