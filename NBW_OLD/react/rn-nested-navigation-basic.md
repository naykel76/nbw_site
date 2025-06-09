# Nested Navigation, The struggle is over!

This guide provides a basic introduction on how to implement navigation using a
combination of navigators. The aim is to assist you in handling common scenarios that
you might encounter when first getting started with React Native navigation.

```html +parse
<x-alert type="info">
Please note that is not a comprehensive guide to React Native navigation. It assumes
that you've already installed the necessary navigation packages and retrieved the data
for your application. The goal is to simply demystify some common use cases.
</x-alert>
```

- [How do I access routes through nested navigation?](#how-do-i-access-routes-through-nested-navigation)
- [What does this all mean?](#what-does-this-all-mean)
- [Navigation options](#navigation-options)
  - [Tab Navigator](#tab-navigator)
  - [Stack Navigator](#stack-navigator)

## How do I access routes through nested navigation?

Nesting navigators means rendering a navigator inside a screen of another navigator.

Consider you have a categories screen, a products screen and a product detail
screen. When a category is selected, it should navigate to the products screen
and fetch the products for that category. When a product is selected, it should
navigate to the product detail screen to view more information about that
product.

Here is a visual representation of the navigation flow:

```mermaid +parse
<x-mermaid>
graph LR
    A[CategoriesScreen] -->|"Category Selected" Route| B[ProductsScreen]
    B -->|"Product Selected" Route| C[ProductDetailScreen]
</x-mermaid>
```

To achieve this, you can use a combination of tab and stack navigators. The tab
navigator will be used to navigate to the categories screen and the stack
navigator will be used to navigate to the products screen.

Here is a visual representation of the navigation flow:

```mermaid +parse
<x-mermaid>
graph LR
    A[Tab Navigator] -->|"Categories" Route| B[CategoryStackNav]
    A -->|"Cart" Route| K[CartScreen]
    subgraph CategoryStackNav
        B --> C[CategoriesScreen]
        B --> D[ProductsScreen]
        D --> E[ProductDetailScreen]
    end
</x-mermaid>
```

Here is a the basic implementation:

First, setup the stack navigator to navigate to both the categories and products
screens. Then, setup the tab navigator to navigate to the stack navigator.

```js
// app.jsx
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { createStackNavigator } from '@react-navigation/stack';
import CategoriesScreen from './CategoriesScreen';
import ProductsScreen from './ProductsScreen';
import ProductDetailScreen from './ProductDetailScreen';

export default function App() {
    const CategoriesStackNav = () => (
        <Stack.Navigator>
            <Stack.Screen name="Categories" component={CategoriesScreen} />
            <Stack.Screen name="Products" component={ProductsScreen} />
            <Stack.Screen name="ProductDetails" component={ProductDetailScreen} />
        </Stack.Navigator>
    );

    return (
        <NavigationContainer>
            <Tab.Navigator>
                <Tab.Screen name="Home" component={CategoriesStackNav} />
                // other tab screens...
            </Tab.Navigator>
        </NavigationContainer>
    );
}
```

Next, in the `CategoriesScreen`, we use the `navigation.navigate` function to navigate
to the `ProductsScreen` when a category is selected. This is done by defining a
`navigateToProductsByCategory` function that is called when the `Pressable`
component is pressed:

```js
// src/screens/CategoriesScreen.jsx
import React from 'react';
import { FlatList, Pressable } from 'react-native';
import { useNavigation } from '@react-navigation/native';

function CategoryItem({ item }) {
    const navigation = useNavigation();

    const navigateToProductsByCategory = () => {
        navigation.navigate('Products', { category: item });
    };

    return (
        <Pressable onPress={navigateToProductsByCategory}>
            // Rest of your code...
        </Pressable>
    );
}

export default function CategoriesScreen() {
    // Replace this with your actual data
    const categories = ['Category1', 'Category2', 'Category3'];

    return (
        <FlatList
            data={categories}
            renderItem={({ item }) => <CategoryItem item={item} />}
            keyExtractor={(item) => item}
        />
    );
}
```

<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr"><use xlink:href="/svg/naykel-ui.svg#information-circle"></use></svg>
    <div>Unlike screens, components do not have access to the <code>navigation</code> prop. <br> To get the navigation prop in a component, you can use the <code>useNavigation</code> hook from <code>@react-navigation/native</code>.</div>
</div>

Finally, in the `ProductsScreen`, we use the `route.params` object to access the category
that was passed from the `CategoriesScreen`. This is done by destructuring the `category`
from the `route.params` object:

```js
// src/screens/ProductsScreen.jsx
import React, { useEffect } from 'react';
import { fetchProductsByCategory } from '../api/products';

export default function ProductsScreen({ route }) {
    const { category } = route.params;

    // Fetch products for the selected category
    useEffect(() => {
        fetchProductsByCategory(category);
        // Additional code to fetch products...
    }, []);

    // Additional code to display products...
}
```

## What does this all mean?

The `ProductDetailScreen` is defined in the `CategoryStackNav` because it's part
of the navigation flow that starts from the `CategoriesScreen`. When you select
a product in the ProductsScreen, you navigate to the `ProductDetailScreen` to
view more information about that product. This is a common pattern in apps that
display lists of items where each item can be selected to view more details.

The `ProductDetailScreen` route is available anywhere within the
`CategoryStackNav`. This means you can navigate to it from any screen that is
part of the `CategoryStackNav`. However, you can't navigate to it directly from
a screen that is not part of the `CategoryStackNav` (like the CartScreen or
OrdersScreen).

Even though the `CategoriesScreen` and `ProductDetailScreen` are unrelated in
terms of data, they are related in terms of navigation. The `CategoriesScreen`
leads to the ProductsScreen, which in turn leads to the `ProductDetailScreen`.
This is why they are all part of the same Stack Navigator.

If you want to make the `ProductDetailScreen` available from other screens
outside of the `CategoryStackNav`, you would need to define it in those other
navigators as well. However, this is not a common pattern and could lead to code
duplication and maintenance issues. It's usually better to keep related screens
within the same navigator to maintain a clear and logical navigation flow.



## Navigation options

### Tab Navigator

Tab Navigator `screenOptions` prop:

```js
screenOptions={{
    tabBarActiveTintColor: 'tomato',
    tabBarInactiveTintColor: 'gray',
    tabBarStyle: { backgroundColor: 'white' },
    tabBarLabelStyle: { fontSize: 16 }
}}
```

Tab Navigator item `options` prop:

```js
options={{
    tabBarLabel: 'Home',
    tabBarBadge: 6
}}
```

### Stack Navigator

Stack Navigator `screenOptions` prop:

```js
screenOptions={{
    headerShown: false,
    headerStyle: { backgroundColor: 'tomato' },
    headerTintColor: 'white',
    headerTitleStyle: { fontWeight: 'bold' }
}}
```
