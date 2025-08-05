# Redux - The Nuts and Bolts

- [Overview](#overview)
  - [Three core concepts](#three-core-concepts)
  - [Three principles](#three-principles)
- [Actions](#actions)
  - [Action Creators](#action-creators)
- [Reducers](#reducers)
  - [Digging a little deeper](#digging-a-little-deeper)
- [Store](#store)
  - [Creating a store](#creating-a-store)
- [Bringing it all together](#bringing-it-all-together)
  - [Sequence diagram](#sequence-diagram)
  - [Implementation](#implementation)
    - [Binding action creators](#binding-action-creators)
- [Full example](#full-example)

<!-- https://github.dev/gopinav/React-Redux-Tutorials/blob/master/react-redux-demo/src/redux/user/userActions.js -->

```html +parse
<x-alert type="warning">
Redux Toolkit is the standard way to write Redux logic and solve common problems with Redux. This is a general overview of Redux to help you understand the basics before diving into Redux Toolkit.
</x-alert>
```

## Overview

Redux is a predictable state container for JavaScript apps. It helps you write
applications that behave consistently, run in different environments (client, server,
and native), and are easy to test. On top of that, it provides a great developer
experience, such as live code editing combined with a time traveling debugger.

**Note, this is a general overview of Redux and not specific to React. Redux can be used
with any JavaScript framework or library.**

### Three core concepts

1. A **store** is an object that holds the state of your application
2. An **action** describes the changes in the state of the application
3. A **reducer** which actually carries out the state transition depending on the action

### Three principles

1. **Single source of truth**: The application's state is stored in a single store's object tree.
2. **State is read-only**: To modify the state, you must dispatch an action, which describes the change.
3. **Changes are made with pure functions**: To specify how the state tree is
   transformed by actions, you write pure reducers.

```mermaid +parse
<x-mermaid class="inline-flex">
graph LR
    A[Store] --> B[Action]
    B --> C[Reducer]
    C -->|New State| A
</x-mermaid>
```

## Actions

In Redux, actions are simply JavaScript objects that carry data updates from your
application to the central store. Actions must have a `type` property that indicates the
type of action being performed, then you are free to include any other data you want in
the action object.

In the following example below, we have a `payload` property that contains a an object
with the data we want to send to the store, and `someProperty` which is just an example
to show you can add what you want.

```javascript
const NAME_OF_ACTION = 'NAME_OF_ACTION';

{
    type: NAME_OF_ACTION,
    someProperty: 'Some value',
    payload: {
        id: 1,
        title: 'Some title',
        // other data you want to send...
    }
}
```

```html +parse
<x-alert type="info">
Typically, in a Redux application, each unique operation or event would have its own
separate action. For example, in a shopping cart application, you might have separate
actions for adding an item to the cart, removing an item from the cart, and updating the
quantity of an item in the cart.
</x-alert>
```

### Action Creators

As the name implies, action creators are functions that create actions. They are
functions that return an action object (like the one shown above). 

Here is a simple example building a counter:

```javascript
// actionCreators.js
const INCREMENT = 'INCREMENT';
const DECREMENT = 'DECREMENT';

function increment() {
    return {
        type: INCREMENT
    }
}

function decrement() {
    return {
        type: DECREMENT
    }
}
```

<span class="txt-pink">Confused?</span> Why isn't there a `payload` in these action
objects?

In this example, we don't need to send any data to the store, we just want to increment
or decrement the counter.

<span class="txt-pink">Still Confused?</span> Me too! This is a chicken or the egg
situation where the action creator is created before the reducer is created to handle
the action. This will start to make more sense in the next section when we see how the
action is used in the reducer.

## Reducers

Reducers are like the brain of Redux. They are pure functions that receive the current
application state and an action as arguments. Based on the action type and payload (if
present), the reducer determines how to update the state and returns the new state
object.

**Key points to remember about Reducers include they:**

- specify how the application's state changes in response to an action sent to the store.
- are pure functions that accepts the previous state and an action, and return the next state.
- must not mutate the state. Instead, they should return a new state object.
- should be written in a way that they are easy to test.

```javascript
// counterReducer.js
import { INCREMENT, DECREMENT } from './actionCreators';

const initialState = {
    count: 0
};

function counterReducer(state = initialState, action) {
    switch (action.type) {
        case INCREMENT:
            return {
                count: state.count + 1
            };
        case DECREMENT:
            return {
                count: state.count - 1
            };
        default:
            return state;
    }
}
```

Whats happening here?

1. The reducer receives the current state and an action.
2. The reducer checks the action type and updates the state accordingly.
3. The reducer returns a new state object.
4. The new state object is then used to update the store. (We will get to this next)

### Digging a little deeper

In the previous example we only have a single property in the state object so it is safe
to return a new object with just the property we are updating. In a real application you
would have multiple properties in the state object.

To handle multiple properties in the state object, you would use the spread operator to
copy the existing state object and then update the property you want to change. For
example:

```javascript
// counterReducer.js
const initialState = {
    count: 0,
    name: 'Jimbo'
};

function counterReducer(state = initialState, action) {
    switch (action.type) {
        case INCREMENT:
            return {
                ...state,
                count: state.count + 1
            };
        case DECREMENT:
            return {
                ...state,
                count: state.count - 1
            };
        default:
            return state;
    }
}
```

## Store

In Redux, the store acts as the central hub for managing your application's state.
Imagine it as a secure vault that holds the single source of truth for all your
application's data. This data is represented by a JavaScript object that encapsulates
all the information your app needs to function.

**The store has three important methods:**

1. `getState()`: Returns the current state of the store
2. `dispatch(action)`: Dispatches an action to update the state
3. `subscribe(listener)`: Adds a change listener to the store

**Things to remember about the store:**

- There is only ever one store in a Redux application which is the single source of truth
- The store holds the application state
- The store is created by passing a reducer to the `createStore` function
- The store exposes three important methods: `getState()`, `dispatch()`, and `subscribe()`

### Creating a store

The store is created by passing a reducer function to the `createStore` function from
Redux. If you remember, previously we created a reducer function called `counterReducer`
that had an object called `initialState` that contained the initial state of our
application. Now we can create a store and pass the `counterReducer` to it.

<!-- how does this set the inital state??? -->
```js
// store.js
import { createStore } from 'redux';
import counterReducer from './counterReducer';

// first, create the store by passing the reducer to the createStore function
const store = createStore(counterReducer);
```
<!-- 
```html +parse
<x-alert type="danger">
This is a very basic example of creating a store. Dispatch and Subscribe have been included in the
example I have not documented them here. Thats on Ron's list!
</x-alert>
``` -->

## Bringing it all together

Now that your head is spinning, let's bring it all together to see how actions,
reducers, and the store work together to manage your application's state in Redux.

### Sequence diagram

Consider our counter example where a user clicks a button to increment or decrement the
counter. Here's the sequence of events:

```mermaid +parse
<x-mermaid>
sequenceDiagram
    participant Component
    participant Store
    participant counterReducer
    Component->>Store: Dispatch action (INCREMENT/DECREMENT)
    Store->>counterReducer: Call with current state and action
    counterReducer->>Store: Return new state
    Store->>Component: Notify state change (optional)
</x-mermaid>
```

**Action Dispatched**: A component in your application dispatches an action to the store.
This action is a JavaScript object with a type property (e.g., "INCREMENT" or
"DECREMENT") indicating the desired change.

**Store Receives Action**: The store receives the dispatched action.

**Reducer Called**: The store calls the `counterReducer` function you assigned to it when
creating the store. The `counterReducer` receives two arguments: the current state of
the application and the dispatched action.

**Reducer Updates State**: Based on the action's type, the `counterReducer` determines how
to update the state. If the action type is "INCREMENT", the `counterReducer` increases
the `count` value in the state object. If the action type is "DECREMENT", the
`counterReducer` decreases the `count` value in the state object. Importantly, the
`counterReducer` returns a new state object reflecting the changes.

**Store Updates Internal State**: The store takes the new state object returned by the
`counterReducer` and updates its internal state with this new object.

**Components Re-render (Optional)**: If any components in your application are subscribed to
changes in the store's state (using `store.subscribe()`), they will be notified and can
re-render themselves with the updated state.

### Implementation

```js
// Subscribe to the store to listen for changes
const unsubscribe = store.subscribe(() => {
    console.log('State has changed:', store.getState());
});

// Dispatch actions to the store to update the state
store.dispatch(increment());
store.dispatch(increment());
store.dispatch(increment());
store.dispatch(decrement());

// Unsubscribe from the store when you no longer want to listen for changes
unsubscribe();
```

#### Binding action creators

In the example above, we are dispatching actions directly to the store. In a real
application, you would bind the action creators to some click event in the UI. For
example:

```js
import { bindActionCreators } from 'redux';
import { increment, decrement } from './actionCreators';

// Get a reference to the dispatch function
const dispatch = store.dispatch;

// Use bindActionCreators to bind dispatch to your action creators
const boundActionCreators = bindActionCreators({ increment, decrement }, dispatch);

document.getElementById('increment').addEventListener('click', () => {
    boundActionCreators.increment();
});

document.getElementById('decrement').addEventListener('click', () => {
    boundActionCreators.decrement();
});
```

## Full example

Copy and paste the following code snippet into a file and run it with Node.js to see how
actions, reducers, and the store work together in Redux.

Expected output:

```bash +torchlight-bash
State has changed: { count: 1 }
State has changed: { count: 2 }
State has changed: { count: 1 }
State has changed: { count: 2 }
```

Note we are using the older CommonJS syntax for this example so you can run directly in
Node.js.
```js
const redux = require('redux');
const bindActionCreators = redux.bindActionCreators;
const createStore = redux.createStore;

// ----- ACTION CREATORS ------------------------------------------
const INCREMENT = 'INCREMENT';
const DECREMENT = 'DECREMENT';

function increment() {
    return {
        type: INCREMENT
    };
}

function decrement() {
    return {
        type: DECREMENT
    };
}
// ----- REDUCER --------------------------------------------------
const initialState = {
    count: 0
};

function counterReducer(state = initialState, action) {
    switch (action.type) {
        case INCREMENT:
            return {
                count: state.count + 1
            };
        case DECREMENT:
            return {
                count: state.count - 1
            };
        default:
            return state;
    }
}

// ----- STORE ----------------------------------------------------
// first, create the store by passing the reducer to the createStore function
const store = createStore(counterReducer);

// next, subscribe to the store to listen for changes
const unsubscribe = store.subscribe(() => {
    console.log('State has changed:', store.getState());
});

// ----- BIND ACTIONS ---------------------------------------------
const actions = bindActionCreators({ increment, decrement }, store.dispatch);

actions.increment();
actions.increment();
actions.decrement();
actions.increment();

// At some point in the future, you can stop listening for changes 
// by calling the function returned by store.subscribe()
unsubscribe();
```
