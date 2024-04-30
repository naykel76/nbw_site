# Redux Toolkit - Thunk (WIP)

- [What is Thunk?](#what-is-thunk)


<!-- ```html +parse
<x-alert type="info">
    <x-slot name="title"> noun </x-slot>
    a dull, heavy sound, such as that made by an object falling to the ground: "the door closed behind us with a thunk"
</x-alert>
``` -->

## What is Thunk?

Beside being a dull, heavy sound, such as that made by an object falling to the ground,
'thunk' is a term used in programming to describe a function that wraps an expression to
delay its evaluation.

In the context of Redux, a thunk is a function that can be dispatched to the store that
can contain side effects, asynchronous requests, and other logic.

Redux Toolkit provides a `createAsyncThunk` function that allows you to define a thunk
that dispatches pending, fulfilled, and rejected actions based on the promise it
returns.

