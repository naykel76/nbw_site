# React Native Quick Reference

- [React Native Quick Reference](#react-native-quick-reference)
  - [Important Concepts](#important-concepts)
    - [Setting initial state with `useState`](#setting-initial-state-with-usestate)
  - [Communicating between components](#communicating-between-components)
    - [Passing state and functions as props:](#passing-state-and-functions-as-props)
  - [Additional Resources](#additional-resources)


## Important Concepts

- **Components**: The building blocks of a React Native app. Components are reusable and
  can be nested inside other components.
- **Props**: Short for properties, props are used to pass data from parent to child
  components.
- **State**: State is used to store data that can change over time. When the state of a
  component changes, the component re-renders.

<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#information-circle"></use></svg>
    <div>In React, state updates are asynchronous within a render. This means that when you call the method to <code>setSomeState</code>, the state update might not be reflected immediately. The component will be re-rendered only after all the queued state updates for that render are applied.</div>
</div>



### Setting initial state with `useState`

In React's `useState` hook, there are two ways to define the initial state of a
variable:

1. **Using a Value**: Provide a value directly (number, string, object, array). This
value sets the initial state. (Suitable for simple initial values)
2. **Using a Function**: Pass a function that calculates the initial state. The
function's return value becomes the initial state. (Use this for complex logic or
calculations)

Both approaches set the initial state only once during the initial render.


```js
const [board, setBoard] = useState(isNewGame ? emptyGrid : history.slice(-1)[0]);
```

```js
const [board, setBoard] = useState(() => isNewGame ? emptyGrid : history.slice(-1)[0]);
```


## Communicating between components

- **Lifting State Up**: When two components need to share the same state, you can lift the
  state up to their closest common parent component. The parent component can then pass
  the state down to the child components via props.




### Passing state and functions as props:

In React, state and functions can be passed from a parent component to a child component
via props. This allows child components to interact with and manipulate the state of the
parent component, a pattern often referred to as "lifting state up".

Here's a general overview of the process:

1. **State Initialization**: In the parent component, initialise the state using the
   `useState` hook.
2. **Function Definition**: Define a function in the parent component that has the
   ability to update this state.
3. **Passing Props**: Pass both the state and the function as props to the child
   component.
4. **Function Invocation**: Within the child component, invoke the passed function when
   necessary (e.g., in response to user interactions) to update the state in the parent
   component.



## Additional Resources

<a href="https://react.dev/learn/managing-state" target="blank">Managing State</a>
