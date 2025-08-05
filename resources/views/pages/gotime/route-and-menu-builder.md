# Route Builder and Menu Component

- [Introduction](#introduction)
- [Creating the JSON file](#creating-the-json-file)
- [RouteBuilder Component](#routebuilder-component)
    - [Basic Usage](#basic-usage)
    - [Using Layouts](#using-layouts)
    - [View Paths](#view-paths)
    - [Excluding Routes](#excluding-routes)
- [Menu Component](#menu-component)
- [Advanced Features](#advanced-features)
    - [Child Routes and Nested Menus](#child-routes-and-nested-menus)
    - [Rendering Markdown Files **TO BE REVIEWED**](#rendering-markdown-files-to-be-reviewed)
- [FAQs](#faqs)
    - [How can I create a route that returns a markdown file?](#how-can-i-create-a-route-that-returns-a-markdown-file)
    - [How can I disable all child routes from being created?](#how-can-i-disable-all-child-routes-from-being-created)
    - [How can I create a single child route while ignoring others?](#how-can-i-create-a-single-child-route-while-ignoring-others)

## Introduction

The `RouteBuilder` and `Menu` component work together to simplify route
management and navigation menu creation. They allow you to define routes and
menus using structured JSON files, which can be easily maintained and updated.

- **RouteBuilder**: Automatically generates Laravel routes from JSON files
- **Menu Component**: Renders navigation menus from JSON files

**Note**: links, routes and menu-items may be used interchangeably in this
documentation, as they serve dual purposes. Each item can function as both a
menu item and a route definition, depending on its configuration.

## Creating the JSON file

Create your JSON configuration file in the `resources/navs` directory. You can
name this file according to your project's requirements.

```bash +torchlight-bash
touch resources/navs/nav-docs.json
```

The JSON file is organised into groups, where each top-level key represents a
specific menu or collection of related routes. Within each group, you define a
`links` array containing your menu-items or route definitions.

```json +torchlight-json
{
    "main": {
        "links": [
            {
                "name": "Home",
                "route_name": "pages.home"
            },
            {
                "name": "About",
                "url": "pages/about"
            }
        ]
    },
    "footer": {
        "links": [
            //  
        ]
    }
}
```

**Groups**: The top-level keys (`main`, `footer`) serve as menu
identifiers. While these groups are primarily used by the Menu component,
`RouteBuilder` processes all items regardless of their grouping (unless
excluded).

**Menu Items / Route Definitions**: Each item in the `links` array becomes both
a menu item and a Laravel route (unless excluded). Each item must include:

- **name** (required): Display text for menu rendering
- **route_name**: Laravel route name (used by RouteBuilder)
- **url**: URL path (used by RouteBuilder)

**Optional Properties**:
- **view**: Override the default view location (RouteBuilder)
- **exclude_route**: Skip route creation, menu item only
- **type**: Specify content type, e.g., "md" for markdown (RouteBuilder)
- **children**: Array of child items for nested menus

```html +parse
<x-gt-alert type="info">
When both <code>url</code> and <code>route_name</code> are provided, the
<code>route_name</code> takes precedence in route generation.
</x-gt-alert>
```

## RouteBuilder Component

The `RouteBuilder` component automatically generates Laravel routes from your
navigation JSON configuration, eliminating the need to manually define routes
in your `web.php` file.

The `RouteBuilder` processes all navigation links within every menu group in
your JSON file, creating individual routes for each link (unless excluded). It
doesn't distinguish between menu groups - it simply iterates through all links
to build your application's routing table.

### Basic Usage

After setting up your navigation JSON file, import the `RouteBuilder` class in
your `web.php` file and call its `create` method with your JSON filename
(excluding the `.json` extension).

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-main'))->create();
```

By default, the RouteBuilder will attempt to find a Blade view that matches the
structure of the `route_name` or `url`. For example, `route_name: "pages.home"`
will look for `resources/views/pages/home.blade.php`.

### Using Layouts

You can specify a layout template that will be applied to all routes by passing
it as the second parameter. This is particularly useful for creating consistent
page structures.

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-docs', 'components.layouts.markdown-docs'))->create();
```

```html +parse
<x-gt-alert type="warning">
<strong>Note:</strong> The layout will be applied to all menu groups in the JSON
file unless overridden at the individual link level.
</x-gt-alert>
```

### View Paths

To override the default view location for a specific route, use the `view`
property in your navigation configuration. This allows you to specify a custom
path for individual links.

```json +torchlight-json
{
    "blogs": {
        "links": [
            {
                "name": "My Blog Post",
                "route_name": "blogs.my-blog-post",
                "view": "content.blogs.my-blog-post"
            }
        ]
    }
}
```

The above configuration will look for the view in
`resources/views/content/blogs/my-blog-post.blade.php`.

You can use either dot notation (as shown above) or directory path notation.
The RouteBuilder will automatically convert dot notation to the appropriate
directory structure.

```html +parse
<x-gt-alert type="warning">
<strong>Note:</strong> A custom <code>view</code> property takes precedence over
any layout defined in the RouteBuilder constructor.
</x-gt-alert>
```

### Excluding Routes

Sometimes you may want to include items in your menu without creating
corresponding routes (for example, when the same route is referenced in
multiple menu groups). Use the `exclude_route` property to prevent route
duplication.

```json +torchlight-json
{
    "main": {
        "links": [
            {
                "name": "Contact Us",
                "route_name": "contact"
            }
        ]
    },
    "footer": {
        "links": [
            {
                "name": "Contact Us",
                "route_name": "contact",
                "exclude_route": true
            }
        ]
    }
}
```

## Menu Component

The Menu component works alongside the RouteBuilder to render navigation menus
from your JSON configuration. It uses the menu group names to determine which
set of links to display.

```html +parse
<x-gt-alert type="info">
Detailed documentation for the Menu component usage and customisation options
will be added in future updates.
</x-gt-alert>
```

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

By default, both the parent and child routes will be created. If you want to
create a non-clickable parent menu item, add `"exclude_route": true` to the
parent item.

```json +torchlight-json
{
    "user": {
        "links": [
            {
                "name": "Parent Menu",
                "exclude_route": true,
                "children": [
                    {
                        "name": "Child page 1",
                        "route_name": "user.child-1",
                        "view": "pages.child1"
                    },
                    {
                        "name": "Child page 2",
                        "route_name": "user.child-2",
                        "view": "pages.child2"
                    }
                ]
            }
        ]
    }
}
```

```html +parse
<x-gt-alert type="warning">
<strong>Current limitations with child routes:</strong>
<ul>
<li>May not work properly with custom templates when using layout parameter</li>
<li>View files must match the URL location structure</li>
<li>Menu click behaviour may not work as expected with route_name for parent
items</li>
</ul>
</x-gt-alert>
```

### Rendering Markdown Files **TO BE REVIEWED**

Typically, `RouteBuilder` constructs routes that return a blade view, matching
the structure of the `route_name` or `url` item. However, there might be
instances where you want to return a markdown file instead, to be injected into
a markdown layout.

To do this, you can specify `"type": "md"` in your navigation JSON file.

```json +torchlight-json
{
    "user": {
        "links": [
            {
                "name": "Documentation",
                "route_name": "docs.dashboard",
                "type": "md"
            }
        ]
    }
}
```

## FAQs 


### <question>How can I create a route that returns a markdown file?</question>

Use the `"type": "md"` attribute in your navigation JSON file. See the
[Rendering Markdown Files](#rendering-markdown-files-to-be-reviewed) section for
details.

### <question>How can I disable all child routes from being created?</question>

Set the `create_child_routes` attribute to `false` in the parent menu item. This
will still add items to the menu but will not create routes for them.

```json +torchlight-json
{
    "main": {
        "links": [
            {
                "name": "Dashboard",
                "route_name": "user.dashboard",
                "create_child_routes": false,
                "children": [
                    {
                        "name": "Reports",
                        "route_name": "user.reports"
                    }
                ]
            }
        ]
    }
}
```

### <question>How can I create a single child route while ignoring others?</question>

You can override the `create_child_routes` setting for individual child items by
explicitly setting routing properties for specific children while excluding
others.
