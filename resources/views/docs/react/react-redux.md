# Redux in React - The "Short" Version

```html +parse
<x-alert type="warning">
<p>Buckle up! The world of Redux can feel like a rabbit hole wonderland, with terms like Redux, React-Redux, and
    Redux Toolkit swirling around. It's easy to get confused about what each does and how they work together to
    manage your application's state.</p>
<p>This is by no means a comprehensive guide to Redux, and the focus will be on using Redux
    Toolkit, because that's what all the cool kids use!</p>
</x-alert>
```

- [Overview](#overview)
- [Why Redux Toolkit?](#why-redux-toolkit)
- [Installation](#installation)
  - [Provider](#provider)


## Overview

Before we dig in, it's important to understand the basics. Redux is a state management
library for JavaScript applications. It acts like a central container for your app's
state, ensuring everything stays consistent and predictable. 

If you're not familiar with the 3 core concepts and 3 principles of Redux, some of the
example code in this guide may not make sense. In that case, you should [read this
first](/docs/redux-the-nuts-and-bolts) to demystify some of the technical jargon before
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
npm install @reduxjs/toolkit
```

Note: `@reduxjs/toolkit` is a wrapper around Redux so there is no need to install Redux separately.

### Provider
