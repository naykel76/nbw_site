# React Native Navigation, The struggle is over!

Navigating between screens in React Native can be puzzling. This is a basic guide on how
to implement navigation in a React Native application using a combination of tab and
stack navigators. It is not a comprehensive guide to React Native navigation, but rather
a general walkthrough addressing common use cases.

**This does not cover fetching the data from an API. It is assumed that you have already
fetched the data and are now trying to navigate to a new screen to display the data.**

- [How do I access routes through nested navigation?](#how-do-i-access-routes-through-nested-navigation)
- [What does this all mean?](#what-does-this-all-mean)

## How do I access routes through nested navigation?

Nesting navigators means rendering a navigator inside a screen of another navigator.

```mermaid +parse
<x-mermaid>
graph LR
    A[Tab Navigator] -->|"Categories" Route| B[CategoryStackNav]
    A -->|"Profile" Route| K[ProfileScreen]
    A -->|"Orders" Route| H[OrdersStackNav]
    B --> C[CategoryListScreen]
    B --> D[ProductsScreen]
    D --> E[ProductDetailScreen]
    H --> F[OrdersScreen]
    H --> J[OrderHistoryScreen]
</x-mermaid>
```

Consider you have a categories screen and a products screen. The categories screen
displays a list of categories and when a category is selected, it should navigate to the
products screen and fetch the products for that category.

To achieve this, you can use a combination of tab and stack navigators. The tab
navigator will be used to navigate to the categories screen and the stack navigator will
be used to navigate to the products screen.


Here is a basic example of how you can implement this:

First, setup the stack navigator to navigate to both the categories and products
screens. Then, setup the tab navigator to navigate to the stack navigator.

```js
export default function App() {
    const CategoriesStackNav = () => (
        <Stack.Navigator>
            <Stack.Screen name="Categories" component={CategoryListScreen} />
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

Next, you use the`navigation.navigate` function to navigate to the Products screen
and pass the selected category as a parameter:

**NOTE**: Navigation should be handled in the component where the category is selected.
For instance, if you're using a `CategoryItem` component to display each category, the
navigation to the `Products` screen should be initiated within this `CategoryItem`
component.

<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr"><use xlink:href="/svg/naykel-ui.svg#information-circle"></use></svg>
    <div>Unlike screens, components do not have access to the <code>navigation</code> prop. <br> To get the navigation prop in a component, you can use the <code>useNavigation</code> hook from <code>@react-navigation/native</code>.</div>
</div>

```js
export default function CategoryItem({ item, index }) {
    const navigation = useNavigation();
    const navigateToProductsByCategory = (category) => {
        navigation.navigate('Products', { category });
    };

    return (
        <Pressable onPress={() => navigateToProductsByCategory(category)}>
            // Rest of your code...
        </Pressable>
    );
}
```

Once a category is selected, the `ProductsScreen` is displayed. Here, the `route` prop
is used to access the selected products by category:

```js
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

The `ProductDetailScreen` is defined in the `CategoryStackNav` because it's part of the
navigation flow that starts from the `CategoryListScreen`. When you select a product in the
ProductsScreen, you navigate to the `ProductDetailScreen` to view more information about
that product. This is a common pattern in apps that display lists of items where each
item can be selected to view more details.

The `ProductDetailScreen` route is available anywhere within the `CategoryStackNav`. This
means you can navigate to it from any screen that is part of the `CategoryStackNav`.
However, you can't navigate to it directly from a screen that is not part of the
`CategoryStackNav` (like the ProfileScreen or OrdersScreen).

Even though the `CategoryListScreen` and `ProductDetailScreen` are unrelated in terms of
data, they are related in terms of navigation. The `CategoryListScreen` leads to the
ProductsScreen, which in turn leads to the `ProductDetailScreen`. This is why they are
all part of the same Stack Navigator.

If you want to make the `ProductDetailScreen` available from other screens outside of the
`CategoryStackNav`, you would need to define it in those other navigators as well.
However, this is not a common pattern and could lead to code duplication and maintenance
issues. It's usually better to keep related screens within the same navigator to
maintain a clear and logical navigation flow.