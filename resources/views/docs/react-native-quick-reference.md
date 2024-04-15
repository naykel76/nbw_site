# React Native Quick Reference

- [Installation](#installation)
  - [Run the app](#run-the-app)
  - [Install dependencies for web (with HMR)](#install-dependencies-for-web-with-hmr)
  - [Other dependencies](#other-dependencies)
  - [ESLint](#eslint)
- [Navigation](#navigation)
  - [Stack Navigation](#stack-navigation)
  - [Passing Additional Props](#passing-additional-props)
- [Components](#components)
  - [FlatList](#flatlist)
- [State Management](#state-management)
- [Lifting State Up](#lifting-state-up)
- [Storage](#storage)
  - [Async Storage](#async-storage)
- [Additional Resources](#additional-resources)
  - [Expo](#expo)


## Installation

```
npx create-expo-app AwesomeProject
npx create-expo-app --template
```

### Run the app

```
npm start
npm run android
npm run web
```

### Install dependencies for web (with HMR)

```
npx expo install react-native-web react-dom @expo/metro-runtime @expo/webpack-config
```



### Other dependencies

```
npm install react-native-svg
```

### ESLint

```bash
npm install --save-dev eslint eslint-plugin-react
# install the config
npm init @eslint/config
```

## Navigation

### Stack Navigation

```bash
# First, install the required packages using npm
npm install @react-navigation/native @react-navigation/native-stack
# If you are using Expo, install the required packages using expo
npx expo install react-native-screens react-native-safe-area-context
```

- the `navigation` prop that is passed down to every screen component.
- call the `navigate` function (on the navigation prop) with the name of the route that
  we'd like to move the user to. ` onPress={() => navigation.navigate('route_name')}`

```js
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Home from './src/screens/Home';

const Stack = createNativeStackNavigator();

export default function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName="Home">
                <Stack.Screen name="Home" component={Home} />
            </Stack.Navigator>
        </NavigationContainer>
    );
}
```

```js
navigation.navigate('route_name') // navigate to a new screen
navigation.goBack() // programmatically go back
navigation.popToTop() // go to the first screen in the stack
```

### Passing Additional Props

```js
navigation.navigate('route_name', { key: value });
```

```js
function Home({ navigation }) {
    return (
        <Button
            title="Go to Details"
            onPress={() => {
                navigation.navigate('Details', {
                    itemId: 86,
                    otherParam: 'anything you want here',
                });
            }}
        />
    );
}
```

- <a href="https://reactnavigation.org/docs/hello-react-navigation#passing-additional-props" target="blank">Passing Additional Props</a>
- <a href="https://reactnavigation.org/docs/navigating" target="blank">Moving Between screens</a>


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

```bash
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
