# React Native Quick Reference

- [Installation](#installation)
  - [Run the app](#run-the-app)
  - [Install dependencies for web (with HMR)](#install-dependencies-for-web-with-hmr)
  - [Other dependencies](#other-dependencies)
  - [ESLint](#eslint)
- [Navigation](#navigation)
  - [Installing navigators](#installing-navigators)
  - [Accessing route parameters](#accessing-route-parameters)
  - [Passing parameters to a previous screen](#passing-parameters-to-a-previous-screen)
  - [Stack Navigation](#stack-navigation)
- [Components](#components)
  - [FlatList](#flatlist)
- [State Management](#state-management)
- [Lifting State Up](#lifting-state-up)
- [Storage](#storage)
  - [Async Storage](#async-storage)
- [Additional Resources](#additional-resources)
  - [Expo](#expo)

## Installation

``` bash
npx create-expo-app AwesomeProject
npx create-expo-app --template
```

### Run the app

``` bash
npm start
npm run android
npm run web
```

### Install dependencies for web (with HMR)

``` bash
npx expo install react-native-web react-dom @expo/metro-runtime @expo/webpack-config
```

### Other dependencies

``` bash
# SVG rendering library
npx install react-native-svg
# icons for React Native
npm install @expo/vector-icons

# Safe area insets management for React Native
npx expo install react-native-safe-area-context
```

### ESLint

```bash +torchlight-bash
npm install --save-dev eslint eslint-plugin-react
# install the config (optional)
npm init @eslint/config
```

## Navigation

- <a href="https://reactnavigation.org/docs/hello-react-navigation#passing-additional-props" target="blank">Passing Additional Props</a>
- <a href="https://reactnavigation.org/docs/navigating" target="blank">Moving Between screens</a>
- 
All screens have access to:

- a `navigation` prop that allows us to move between screens.
- a `route` prop that contains the current route's information. (`key`, `name`, `params`)

- call the `navigate` function (on the navigation prop) with the name of the route that
  we'd like to move the user to. ` onPress={() => navigation.navigate('route_name')}`

### Installing navigators
    
```bash +torchlight-bash
# First, install the required packages using npm
npm install @react-navigation/native 

# drawer navigator
npm install @react-navigation/drawer
npm install react-native-reanimated react-native-gesture-handler react-native-screens

# stack navigator
npm install @react-navigation/stack
npx expo install react-native-screens react-native-safe-area-context

# bottom tab navigator
npm install @react-navigation/bottom-tabs
npx expo install react-native-screens react-native-safe-area-context

# install the works!
npm install @react-navigation/drawer @react-navigation/stack @react-navigation/bottom-tabs
npx expo install react-native-reanimated react-native-gesture-handler react-native-screens react-native-safe-area-context @react-native-community/masked-view
```

npx expo install react-native-gesture-handler react-native-reanimated

Note, you can pass multiple parameters to a route by passing an object with multiple key-value pairs.

```js
navigation.navigate('route_name') // navigate to a new screen
navigation.goBack() // programmatically go back
navigation.popToTop() // go to the first screen in the stack

// passing parameters
navigation.navigate('route_name', { key: value });
// Accessing route parameters
const { params, otherParam } = route;
```

### Accessing route parameters

```js
function Details({ route }) {
    const { params, otherParam } = route;
   // component code here...
}
```

### Passing parameters to a previous screen

```js
// Home.js (previous screen)
function Home({ navigation, route }) {
    const { params, otherParam } = route;
   
   useEffect(() => {
        if (params.myParam) {
            // do something with `route.params.myParam`
        }
    }, []);
   
    // component code here...
}
```

```js
// Details.js (current screen)
function Details({ route, navigation }) {
    onPress={() => {
        navigation.navigate(
            // Pass and merge params back to home screen
            { name: 'Home', params: { key: 'value' }, merge: true, }
        );
    }}
    // component code here...
}
```

### Stack Navigation

```js
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Home from './src/screens/Home';

const Stack = createNativeStackNavigator();

export default function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName="Home">
                <Stack.Screen name="Home" component={HomeScreen} />
            </Stack.Navigator>
        </NavigationContainer>
    );
}
```

## Components

### FlatList

```js
import { SafeAreaView, FlatList, Text } from 'react-native';

<SafeAreaView style={styles.container}>
    <FlatList
        data={DATA}
        keyExtractor={item => item.id}
        renderItem={({ item }) => <Text>{item.title}</Text>}
    />
</SafeAreaView>
```

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

## State Management

## Lifting State Up

Sometimes, you want the state of two components to always change together. To do it,
remove state from both of them, move it to their closest common parent, and then pass it
down to them via props. This is known as lifting state up.

```js
import React, { useState } from 'react';

function Parent() {
    const [msg, setMsg] = useState('default message');

    return (
        <div>
            <Child1 setMsg={setMsg} />
            <Child2 setMsg={setMsg} />
            <p>{msg}</p>
        </div>
    );
}

function Child1({ setMsg }) {
    return <button onClick={() => setMsg('Hello from Child1')}>Child 1 Button</button>;
}

function Child2({ setMsg }) {
    return <button onClick={() => setMsg('Hello from Child2')}>Child 2 Button</button>;
}

export default Parent;
```




## Storage

### Async Storage

<a href="https://react-native-async-storage.github.io/async-storage/docs/usage" target="blank">Async Storage Docs</a>

```bash +torchlight-bash
npm install @react-native-async-storage/async-storage
```

<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#information-circle"></use></svg>
    <div>Async Storage can only store string data. In order to store object data, you need to serialize it first. For data that can be serialized to JSON, you can use <code>JSON.stringify()</code> when saving the data and <code>JSON.parse()</code> when loading the data.</div>
</div>

```js
import AsyncStorage from '@react-native-async-storage/async-storage';

const storeData = async (key, value) => {
    try {
        await AsyncStorage.setItem
    } catch (e) {
        console.log(e);
    }
};
```

## Additional Resources

- <a href="https://reactnative.dev/docs/components-and-apis" target="blank">Core Components and APIs</a>
- <a href="https://react-svgr.com/playground/" target="blank">https://react-svgr.com/playground/</a>
- <a href="https://icons.expo.fyi/Index" target="blank">Icons</a>
- <a href="https://reactnative.dev/docs/colors" target="blank">Color Reference</a>
- <a href="https://reactnative.dev/docs/pressable" target="blank">Pressable</a>
### Expo

- <a href="https://docs.expo.dev/versions/latest/sdk/linear-gradient/" target="blank">LinearGradient</a>
