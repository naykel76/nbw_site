## Menu Component

- Uses the same JSON configuration as the RouteBuilder
- Renders navigation menus based on menu group names
- Supports nested menus with child routes
- Customisable templates and styling options
- 

The Menu component works alongside the RouteBuilder to render navigation menus
from your JSON configuration. It uses the menu group names to determine which
set of links to display.



## Advanced Features

### Child Routes and Nested Menus

You can create nested menu structures with child routes by adding a `children`
array to any link object. This is useful for creating dropdown menus or
hierarchical navigation.

```json +torchlight-json
{
    "main": {
        "links": [
            {
                "name": "Products",
                "route_name": "products.index",
                "children": [
                    {
                        "name": "Laptops",
                        "route_name": "products.laptops"
                    },
                    {
                        "name": "Smartphones",
                        "route_name": "products.smartphones"
                    }
                ]
            }
        ]
    }
}
```

