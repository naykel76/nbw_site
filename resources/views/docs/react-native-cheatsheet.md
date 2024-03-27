# React Native Quick Reference
<!-- TOC -->

- [Installation](#installation)
    - [Install dependencies for web (with HMR)](#install-dependencies-for-web-with-hmr)
    - [Run the app](#run-the-app)
    - [Other dependencies](#other-dependencies)
    - [ESLint](#eslint)
- [Navigation](#navigation)
- [Additional Resources](#additional-resources)
    - [Expo](#expo)

<!-- /TOC -->
<a id="markdown-installation" name="installation"></a>

## Installation

```
npx create-expo-app AwesomeProject
npx create-expo-app --template
```

<a id="markdown-install-dependencies-for-web-with-hmr" name="install-dependencies-for-web-with-hmr"></a>

### Install dependencies for web (with HMR)

```
npx expo install react-native-web react-dom @expo/metro-runtime @expo/webpack-config
```

<a id="markdown-run-the-app" name="run-the-app"></a>

### Run the app

```
npm start
npm run android
npm run web
```

<a id="markdown-other-dependencies" name="other-dependencies"></a>

### Other dependencies

```
npm install react-native-svg
```

<a id="markdown-eslint" name="eslint"></a>

### ESLint

```bash
npm install --save-dev eslint eslint-plugin-react
# install the config
npm init @eslint/config
```
<!-- eslint-plugin-react-native -->



<a id="markdown-navigation" name="navigation"></a>

## Navigation

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

- <a href="https://reactnavigation.org/docs/hello-react-navigation#passing-additional-props" target="blank">Passing Additional Props</a>
- <a href="https://reactnavigation.org/docs/navigating" target="blank">Moving Between screens</a>

<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

- <a href="https://reactnative.dev/docs/components-and-apis" target="blank">Core Components and APIs</a>
- <a href="https://react-svgr.com/playground/" target="blank">https://react-svgr.com/playground/</a>
- <a href="https://icons.expo.fyi/Index" target="blank">Icons</a>
- <a href="https://reactnative.dev/docs/colors" target="blank">Color Reference</a>
- <a href="https://reactnative.dev/docs/pressable" target="blank">Pressable</a>
<a id="markdown-expo" name="expo"></a>

### Expo

- <a href="https://docs.expo.dev/versions/latest/sdk/linear-gradient/" target="blank">LinearGradient</a>
