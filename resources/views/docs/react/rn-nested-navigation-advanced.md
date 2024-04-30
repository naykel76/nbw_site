# Nested Navigation - Advanced Examples

- [Overview](#overview)
- [Why won't the navigation tabs show on every page when using the drawer?](#why-wont-the-navigation-tabs-show-on-every-page-when-using-the-drawer)
- [Trouble Shooting](#trouble-shooting)
    - [Expo is crashing when using the drawer navigator.](#expo-is-crashing-when-using-the-drawer-navigator)

## Overview

In React Native, you can have multiple navigators in your app. This is useful when you
have different sections of your app that need to be navigated independently. For
example, you might have a bottom tab navigator for the main sections of your app, and a
stack navigator for each section, and a drawer navigator for the settings.

When you have multiple navigators in your app, you can nest them to create a hierarchy
of navigation flows. This allows you to organize your app's navigation structure and
control how users can navigate between screens.

```mermaid +parse
<x-mermaid>
graph LR
    Z[Drawer Navigator] -->|"Home" Route| A[Tab Navigator]
    Z -->|"Settings" Route| X[SettingsScreen]
    Z -->|"Profile" Route| Y[ProfileScreen]
    subgraph TabNavigator
        A -->|"Categories" Route| B
        A -->|"Cart" Route| K[CartScreen]
        subgraph CategoryStackNav
            B[CategoryStackNav] --> C[CategoriesScreen]
            B --> D[ProductsScreen]
            D --> E[ProductDetailScreen]
        end
    end
</x-mermaid>
```

In the diagram above, the Drawer Navigator serves as the parent navigator, with the Tab
Navigator nested within it. This structure means that the screens within the Tab
Navigator are only accessible from the Drawer Navigator. 

The `HomeScreen` (represented by the `CategoryStackNav` in the diagram) is the default
screen for the Tab Navigator. It contains a Stack Navigator that allows navigation
between the `CategoriesScreen`, `ProductsScreen`, and `ProductDetailScreen`.

The `CartScreen` is another screen accessible directly from the Tab Navigator. 

The Drawer Navigator also provides access to separate `SettingsScreen` and
`ProfileScreen`, independent of the Tab Navigator.

Here's a basic example of how you can implement this structure:

```js
import { NavigationContainer } from '@react-navigation/native';
import { createDrawerNavigator } from '@react-navigation/drawer';
import { createStackNavigator } from '@react-navigation/stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';

const Drawer = createDrawerNavigator();
const Tab = createBottomTabNavigator();
const Stack = createStackNavigator();

function CategoryStackNav() {
    return (
        <Stack.Navigator>
            <Stack.Screen name="Categories" component={CategoriesScreen} />
            <Stack.Screen name="Products" component={ProductsScreen} />
            <Stack.Screen name="ProductDetail" component={ProductDetailScreen} />
        </Stack.Navigator>
    );
}

function TabNavigator() {
    return (
        <Tab.Navigator>
            {/* The name here is a little tricky. It's not the name of the screen or the route.
                It's the name of the tab that will be displayed in the tab bar. */}
            <Tab.Screen name="CategoriesTab" component={CategoryStackNav} options={{ title: 'Home' }}/>
            <Tab.Screen name="Cart" component={CartScreen} />
        </Tab.Navigator>
    );
}

export default function App() {
    return (
        <NavigationContainer>
            <Drawer.Navigator>
                <Drawer.Screen name="Home" component={TabNavigator} />
                <Drawer.Screen name="Settings" component={SettingsScreen} />
                <Drawer.Screen name="Profile" component={ProfileScreen} />
            </Drawer.Navigator>
        </NavigationContainer>
    );
}
```

```html +parse
<x-alert type="info">
When nesting navigators, it's important to consider the order in which you nest them. The
parent navigator will be the first navigator that you define and the child navigator will
be the last navigator that you define. This will determine the navigation flow of your
app and how you can access screens in different navigators.
</x-alert>
```

## Why won't the navigation tabs show on every page when using the drawer?

Using the previous example, you will encounter a situation where the navigation tabs
don't show on every page, specifically the drawer pages. This can be confusing,
especially if you expect the tabs to be visible at all times.

Long story short, the tabs won't show on every page because of the structure of your
navigators. You need to define the `Tab.Navigator` at the top level, outside of the
`Drawer.Navigator`. This way, the tabs will be visible on every page, including the
drawer pages.

Here is the code!

```js
import "react-native-gesture-handler";
import { NavigationContainer } from '@react-navigation/native';
import { createDrawerNavigator } from '@react-navigation/drawer';
import { createStackNavigator } from '@react-navigation/stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { Ionicons } from '@expo/vector-icons';

import CartScreen from './src/screens/CartScreen';
import CategoriesScreen from './src/screens/CategoriesScreen';
import ProductDetailScreen from './src/screens/ProductDetailScreen';
import ProductsScreen from './src/screens/ProductsScreen';
import ProfileScreen from './src/screens/ProfileScreen';
import SettingsScreen from './src/screens/SettingsScreen';

const Drawer = createDrawerNavigator();
const Tab = createBottomTabNavigator();
const Stack = createStackNavigator();

function CategoryStackNav() {
    return (
        <Stack.Navigator screenOptions={{ headerShown: false }}>
            <Stack.Screen name="Categories" component={CategoriesScreen} />
            <Stack.Screen name="Products" component={ProductsScreen} />
            <Stack.Screen name="ProductDetails" component={ProductDetailScreen} />
        </Stack.Navigator>
    );
}

function HomeTabs() {
    return (
        <Tab.Navigator screenOptions={({ route }) => ({
            tabBarIcon: ({ color, size }) => {
                let iconName;
                if (route.name === 'HomeTab') {
                    iconName = 'home-outline';
                } else if (route.name === 'Cart') {
                    iconName = 'cart-outline';
                }
                return <Ionicons name={iconName} size={size} color={color} />;
            },
            tabBarInactiveTintColor: 'gray',
            tabBarActiveTintColor: 'tomato',
            headerShown: false
        })}
        >
            <Tab.Screen name="HomeTab" component={CategoryStackNav} options={{ title: 'Home' }} />
            <Tab.Screen name="Cart" component={CartScreen} />
        </Tab.Navigator>
    );
}

function SettingsTabs() {
    return (
        <Tab.Navigator screenOptions={({ route }) => ({
            tabBarIcon: ({ color, size }) => {
                let iconName;
                if (route.name === 'SettingsTab') {
                    iconName = 'settings-outline';
                } else if (route.name === 'Cart') {
                    iconName = 'cart-outline';
                }
                return <Ionicons name={iconName} size={size} color={color} />;
            },
            tabBarInactiveTintColor: 'gray',
            tabBarActiveTintColor: 'tomato',
            headerShown: false
        })}
        >
            <Tab.Screen name="SettingsTab" component={SettingsScreen} options={{ title: 'Settings' }} />
            <Tab.Screen name="Cart" component={CartScreen} />
        </Tab.Navigator>
    );
}

function ProfileTabs() {
    return (
        <Tab.Navigator screenOptions={({ route }) => ({
            tabBarIcon: ({ color, size }) => {
                let iconName;
                if (route.name === 'ProfileTab') {
                    iconName = 'person-outline';
                } else if (route.name === 'Cart') {
                    iconName = 'cart-outline';
                }
                return <Ionicons name={iconName} size={size} color={color} />;
            },
            tabBarInactiveTintColor: 'gray',
            tabBarActiveTintColor: 'tomato',
            headerShown: false
        })}
        >
            <Tab.Screen name="ProfileTab" component={ProfileScreen} options={{ title: 'Profile' }} />
            <Tab.Screen name="Cart" component={CartScreen} />
        </Tab.Navigator>
    );
}

export default function App() {
    return (
        <NavigationContainer>
            <Drawer.Navigator>
                <Drawer.Screen name="Home" component={HomeTabs} />
                <Drawer.Screen name="Settings" component={SettingsTabs} />
                <Drawer.Screen name="Profile" component={ProfileTabs} />
            </Drawer.Navigator>
        </NavigationContainer>
    );
}
```

```mermaid +parse
<x-mermaid>
graph LR
    Z[Drawer Navigator] -->|"Home" Route| A[HomeTabs]
    Z -->|"Settings" Route| X[SettingsTabs]
    Z -->|"Profile" Route| Y[ProfileTabs]
    subgraph HomeTabs
        A -->|"HomeTab" Route| B[CategoryStackNav]
        A -->|"Cart" Route| K[CartScreen]
        subgraph CategoryStackNav
            B --> C[CategoriesScreen]
            B --> D[ProductsScreen]
            D --> E[ProductDetailScreen]
        end
    end
    subgraph SettingsTabs
        X -->|"SettingsTab" Route| S[SettingsScreen]
        X -->|"Cart" Route| K
    end
    subgraph ProfileTabs
        Y -->|"ProfileTab" Route| P[ProfileScreen]
        Y -->|"Cart" Route| K
    end
</x-mermaid>
```

## Trouble Shooting

#### Expo is crashing when using the drawer navigator.

Make sure you have imported the gesture handler **at the top** of your `App.js` file:

```js
import "react-native-gesture-handler";
```