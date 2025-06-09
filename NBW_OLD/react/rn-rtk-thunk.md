# Redux Toolkit - Thunk

- [What is a Thunk?](#what-is-a-thunk)
- [Handling asynchronous actions with `createAsyncThunk`](#handling-asynchronous-actions-with-createasyncthunk)
  - [Payload Creator](#payload-creator)
- [Creating a Thunk](#creating-a-thunk)
  - [Steps (high-level overview)](#steps-high-level-overview)
- [Basic Example](#basic-example)
  - [Things to remember](#things-to-remember)
  - [Why do we use `extraReducers` for asynchronous functions?](#why-do-we-use-extrareducers-for-asynchronous-functions)
- [More Resources](#more-resources)

```html +parse
<x-alert type="danger">
This is not a comprehensive guide to Thunk, instead, it focuses on common patterns and
concepts using abstract examples. Once you learn these patterns, you'll notice how they
repeat themselves, making them easier to implement.
</x-alert>
```

```html +parse
<x-alert type="danger">
This guide will assume you are already familiar with the basics of Redux Toolkit such
as creating a store, using reducers, and connecting components to the store. If these
terms are unfamiliar to you, you may want to check out and understand the <a
href="/docs/react/rn-redux-toolkit-concepts" target="blank">basic concepts</a> first.
</x-alert>
```

## What is a Thunk?

Beside being a dull, heavy sound, such as that made by an object falling to the ground,
'thunk' is a term used in programming to describe a function that wraps an expression to
delay its evaluation.

In the context of Redux, a thunk is a function that can be dispatched to the store that
can contain side effects, asynchronous requests, and other logic.

## Handling asynchronous actions with `createAsyncThunk`

Asynchronous actions involve side effects like API requests, requiring you to wait for a
response before updating the state. This typically happens when interacting with
external systems like servers, where you need the response before updating the state.

Redux Toolkit offers `createAsyncThunk` to define a thunk that dispatches `pending`,
`fulfilled`, and `rejected` actions based on the returned promise's lifecycle. This
function simplifies the process by automatically dispatching the appropriate actions
based on the promise's status.

The `createAsyncThunk` function takes two arguments:

1. A string representing the action type.
2. A function that returns a promise, known as the "payload creator".

```js
export const myThunk = createAsyncThunk(
    'feature/someAction',   // name of the action
    async () => { }         // payload creator
);
```

### Payload Creator

The payload creator is a function passed as the second argument to `createAsyncThunk`.
It's responsible for performing the actual asynchronous operation, typically involving
an API request or any logic that requires waiting for a response.

This function returns a promise that resolves with the data obtained from the
asynchronous operation or rejects with an error if something goes wrong.

The payload creator function can accept two arguments:

1. `value`: The value passed to the action creator when it's dispatched.
2. `thunkAPI`: An object containing useful properties and functions for handling
   asynchronous logic.
   
```js
export const someAction = createAsyncThunk(
    'feature/someAction',
    async (value, thunkAPI) => {
        // Perform an asynchronous operation here
        return // the result as a promise
    }
);
```

Note: that the both the first and second arguments are optional. You only need to include
them if you need to access the `value` or `thunkAPI` values.

## Creating a Thunk

### Steps (high-level overview)

1. **Create a slice** 
   - Use `createSlice` from `@reduxjs/toolki`t to define a Redux slice.
   - Define the `name`, `initialState`, `reducers`, and `extraReducers` for the slice.
2. **Define an async thunk** using `createAsyncThunk` to handle asynchronous logic.
   - Add the action type string (e.g., `feature/someAction`).
   - Add "payload creator" function(s), which are an async function that returns a promise.
3. **Add Extra Reducers**
   - Inside your slice definition (`createSlice`), add extra reducers to handle
     `pending`, `fulfilled`, and `rejected` actions dispatched by the async thunk.
4. **Export the async thunk, action creators, and the slice reducer**.
5. **Dispatch Thunk**
   - In your React component, use the `useDispatch` hook from `react-redux` to dispatch
     the async thunk.
6. **Handle State Changes**
    - Use the `useSelector` hook from `react-redux` to select and react to state changes
      triggered by the async thunk.

```html +parse
<x-alert type="info">
The steps above provide a high-level overview of the process. The following sections
will dive deeper into each step, providing more context and examples.
</x-alert>
```

## Basic Example

### Things to remember 

- When working with asynchronous functions, you always define the action first using
  `createAsyncThunk`, and then you define the reducers.
- The way you define a reducer for an asynchronous function is different because it
  doesn’t go in the `reducers` object. It actually goes at the bottom in something that
  we call `extraReducers`.
- You don’t need to worry too much about the `builder`, it’s just a tool that allows you
  to essentially add cases to the reducers.
- Through the `builder` object, you can define how the state should be updated based on
  the different states of the promise (pending, fulfilled, rejected).
- The naming of actions and reducers is automatically generated by Redux Toolkit. You
  only need to define the action name for asynchronous functions.

```js
import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';

const initialState = {
    data: { count: 0 },
    isLoading: false,
    error: null
};

export const incrementByValueAsync = createAsyncThunk(
    'counter/incrementByValueAsync',
    async (amount) => {
        await new Promise((resolve) => setTimeout(resolve, 1000));
        return amount;
    }
);

const counterSlice = createSlice({
    name: 'counter',
    initialState,
    reducers: { },
    extraReducers: (builder) => {
        builder
            .addCase(incrementByValueAsync.pending, () => {
                console.log('incrementByValueAsync.pending');
            })
            .addCase(incrementByValueAsync.fulfilled, (state, action) => {
                state.data.count += action.payload;
            })
            .addCase(incrementByValueAsync.rejected, () => {
                console.error('incrementByValueAsync.rejected');
            });
    }
});


// export const {} = counterSlice.actions;
export default counterSlice.reducer;
```

### <question>Why do we use `extraReducers` for asynchronous functions?</question>

<answer>When working with asynchronous functions, you need to handle different states
such as pending, fulfilled, and rejected. The `extraReducers` object allows you to
define reducers for these states separately from the synchronous reducers. This makes it
easier to manage the different states and update the state accordingly.</answer>

```html +parse
<x-alert type="info">
Conceptually, the <code>extraReducers</code> works similarly to the <code>reducers</code> object. However it handles asynchronous actions using the <code>builder</code> object.
</x-alert>
```




## More Resources

<a href="https://redux-toolkit.js.org/api/createAsyncThunk" target="blank">createAsyncThunk</a>

