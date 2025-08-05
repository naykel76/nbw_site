# Route and Menu Builder

- [Introduction](#introduction)
- [Getting Started](#getting-started)
    - [Create a Navigation JSON File](#create-a-navigation-json-file)
    - [Define Your Nav Items](#define-your-nav-items)
    - [Define Your Routes](#define-your-routes)
- [Usage](#usage)
    - [Define a Layout](#define-a-layout)
    - [Customising View Paths](#customising-view-paths)
    - [Excluding Routes](#excluding-routes)
    - [Creating Child Routes **TO BE REVIEWED**](#creating-child-routes-to-be-reviewed)
    - [Rendering Markdown Files **TO BE REVIEWED**](#rendering-markdown-files-to-be-reviewed)
- [FAQS](#faqs)
    - [How can I create a route that returns a markdown file? (TBD)](#how-can-i-create-a-route-that-returns-a-markdown-file-tbd)
    - [How can I disable all child routes from being created?](#how-can-i-disable-all-child-routes-from-being-created)

## Introduction

The `RouteBuilder` component takes a structured JSON file, and automatically generates routes based
on its contents. This allows you to manage your application's navigation and routing in a clean,
organized manner using a simple JSON configuration.

```html +parse
<x-gt-alert type="info">
The <code>RouteBuilder</code> and <code>Menu</code> component use the same JSON file to generate routes and menus.
</x-gt-alert>
```

## Getting Started

### Create a Navigation JSON File

In the `resources/navs` directory, create a new file named `nav.json`. (replace `nav` with your preferred name).

```bash +torchlight-bash
touch resources/navs/nav-docs.json
```

### Define Your Nav Items

In the `nav.json` file, create a JSON object with where each key represents a distinct menu name. The
default menu name is `main`, but you can customise this to fit your project's requirements.

Note: multiple menus can be defined within this single file.

```json +torchlight-json
{
    "main": { },
    "footer": { }
}
```

```html +parse
<x-gt-alert type="info">
While it is of little importance to the <code>RouteBuilder</code>, the menu name plays an important
role as it is used in the <code>Menu</code> component to identify which menu to render. It also acts
as the title for that menu in the navigation interface.
</x-gt-alert>
```

### Define Your Routes

Within each menu in the `nav.json` file, you should specify a `links` array. This array consists of
individual links, where each link represents a route to be created.

Each item within the `links` array must contain either a `url` or `route_name`, along with a `name` key.

Here's an example structure:

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
    }
}
```

```html +parse
<x-gt-alert type="info">
A route can be created by defining either the <code>url</code> or <code>route_name</code>. 
If both values are set, the <code>route_name</code> will take precedence in all menu and route actions.
</x-gt-alert>
```

## Usage

After setting up your `nav.json` file, you can use the `RouteBuilder` within your `web.php` to
dynamically generate routes from the configurations specified in your JSON file.

Start by importing the `RouteBuilder` class at the beginning of your file. Next, create an instance
of `RouteBuilder` and call its `create` method. This method takes the name of your navigation JSON
file as its argument (exclude the `.json` extension).

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-main'))->create();
```

### Define a Layout

By default, for each route created, the `RouteBuilder` will attempt to fetch a blade view from the
`resources/views` directory. It does this by matching the structure of the `route_name` or `url` item.
For example, if `route_name` is `pages.home`, it will search for `resources/views/pages/home.blade.php`.

In some cases, you may want to create a layout where the contents of the menu items are injected
into a specific layout. To do this, you can specify a layout for all views associated with the menu
as the second parameter.

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-docs', 'components.layouts.markdown-docs'))->create();
```

```html +parse
<x-gt-alert type="warning">
<strong>Note:</strong> The layout will be applied to all menus in the JSON file unless overridden.
</x-gt-alert>
```

### Customising View Paths

By default, for each route, the `RouteBuilder` attempts to fetch a Blade view based on the provided
`route_name` or `url`. To override the default behavior and use a different view location, set
`"view": "path.to.view"` in your route configuration, specifying the exact path to the desired view.

You are free to define the view path using dot notation or a directory path. The `RouteBuilder` will
automatically convert the dot notation to a directory path.

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

The above configuration will look for the view in `resources/views/content/blogs/my-blog-post.blade.php`.

```html +parse
<x-gt-alert type="warning">
    <strong>Note:</strong> The view specified in the configuration takes precedence over any layout
    defined in the <code>RouteBuilder</code> constructor.
</x-gt-alert>
```

### Excluding Routes

By default, `RouteBuilder` will attempt to generate a route for every nav object in the JSON file,
including every link and children (if any). However, as the `nav.json` file is also used for menu
construction, there might be cases where a route is duplicated.

To avoid any conflicts, you can add `"exclude_route": true` to any duplicate items. This will
instruct the route builder to ignore these items, preventing it from attempting to create their
routes again.

```json +torchlight-json
{
    "main": {
        "links": [
            {
                "name": "Contact Us",
                "route_name": "contact"
            },
        ]
    },
    "footer": {
        "links": [
            {
                "name": "Contact Us",
                "route_name": "contact",
                "exclude_route": true 
            },
        ]
    }
}
```


### Creating Child Routes **TO BE REVIEWED**

The may be occasions where you want to create a parent route with sub-menus. This is useful for
creating a dropdown menu. To automatically create routes for sub-menus, add a `children` array to
the link object and define the routes as you would for the parent.


```html +parse
<x-gt-alert type="danger">

limitations and

- does not work with templates
` file must be is url location
- menu click does not like route_name

## Gotchas and Things to Know

- The layout must be available locally in your project.
- Unless overridden or excluded, the layout will apply to all menus, links and child links in the `nav.json` file.
- You can override a layout by setting the `view` attribute.
</x-gt-alert>
```

?????????

When creating child routes, the parent route will be created as a clickable link. The child routes


In many cases, it's not ideal to create clickable parent routes when working with child routes. To
prevent a parent item from creating a route and clickable link, add `"exclude_route": true`.

**Note:** To prevent the creation of parent routes and avoid generating clickable links, when
`"exclude_route": true`, you can omit the `route_name` and `url` attributes on the parent item.

```json +torchlight-json
{
  "user": {
    "links": [
      {
        "name": "Parent",
        "children": [
            // "exclude_route": true,
          {
            "name": "Child page 1",
            "route_name": "test/child-1",
            "url": "test/child-1",
            "view": "pages.home"
          },
        ]
      },
    ]
  }
}
```

### Rendering Markdown Files **TO BE REVIEWED**

Typically, `RouteBuilder` constructs routes that return a blade view, matching the structure of
the `route_name` or `url` item. However, there might be instances where you want to return a
markdown file instead, to be injected into a markdown layout.

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

## FAQS

### <question>How can I create a route that returns a markdown file? (TBD)</question>

### <question>How can I disable all child routes from being created?</question>

Set the `create_child_routes` attribute to `false` in the parent menu item. This will still add
items in the menu but will not create routes for them.

How can I create a single child route? (Override `ignore_all_children`)

```json +torchlight-json
{
    "Menu1": {
        "links": [
            {
                "name": "Dashboard",
                "route_name": "user.dashboard",
                "create_child_routes": false
            }
        ]
    }
}
```
