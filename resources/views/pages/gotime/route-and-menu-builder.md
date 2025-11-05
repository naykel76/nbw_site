# Route Builder and Menu Component

- [Introduction](#introduction)
- [Creating the JSON file](#creating-the-json-file)
    - [Available Properties](#available-properties)
- [Basic Usage](#basic-usage)
- [Customisation](#customisation)
    - [Using Layouts](#using-layouts)
    - [Custom View Paths](#custom-view-paths)
    - [Excluding Routes](#excluding-routes)
    - [Rendering Markdown Files](#rendering-markdown-files)

## Introduction

`RouteBuilder` automatically generates Laravel routes from JSON files in
`resources/navs`. It converts each JSON route definition into a Laravel route,
removing the need to manually define routes in `web.php`.

## Creating the JSON file

Create a JSON file in `resources/navs` to define your routes. Each file can
contain multiple top-level groups (for example, `main` or `footer`), each with a
`links` array of route definitions.

```json
{
  "main": {
    "links": [
      { "name": "Home", "route_name": "pages.home" },
      { "name": "About", "url": "pages/about" }
    ]
  },
  "footer": { "links": [] }
}
```

### Available Properties

| Property                 | Description                                                                                                                  |
| ------------------------ | ---------------------------------------------------------------------------------------------------------------------------- |
| **children**             | Nested routes or menu items (affects menus only; child routes are still created unless `exclude_route: true` is set on them) |
| **exclude_child_routes** | Skips route create for ALL child routes????                                                |
| **exclude_route**        | Skips route creation (useful for duplicates or menu-only links)                                                              |
| **name** (required)      | Display name for the link                                                                                                    |
| **route_name**           | Laravel route name (takes precedence over `url`)                                                                             |
| **type**                 | Content type (`"md"` for markdown). Determines if the link should use the markdown layout                                    |
| **url**                  | URL path if no `route_name` is provided                                                                                      |
| **view**                 | Custom view path. Used to set the view file injected into the layout                                                         |


```html +parse
<x-gt-alert type="info">
When both <code>url</code> and <code>route_name</code> are provided, 
<code>route_name</code> takes precedence.
</x-gt-alert>
```

## Basic Usage

To generate routes from a navigation file, import the `RouteBuilder` class in
`web.php`. Create an instance with the filename (without `.json`) and call
`create()`:

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-main'))->create();
```

This reads `resources/navs/nav-main.json` and creates routes for each link in
every top-level group, unless a link has `exclude_route: true`.

## Customisation

By default, `RouteBuilder` attempts to create routes for every link in the JSON
file and looks for a Blade view matching the `route_name` or `url`. For example,
`route_name: "pages.home"` will load `resources/views/pages/home.blade.php`.

This default behaviour works for most cases, but you can customise it further
using the options below.

### Using Layouts

You can apply a layout to all routes by passing it as the second parameter when
creating the instance. This is useful for keeping pages consistent, such as
documentation layouts.

```php +torchlight-php
use Naykel\Gotime\RouteBuilder;

(new RouteBuilder('nav-docs', 'components.layouts.markdown-docs'))->create();
```

```html +parse
<x-gt-alert type="warning">
<strong>Note:</strong> The layout applies to all groups in the JSON file unless a link overrides it with a custom <code>view</code>. The actual view path is injected into <code>$data['path']</code>.
</x-gt-alert>
```

### Custom View Paths

To override the default view location for specific routes, use the `view`
property. This lets you define custom paths when your view files don’t match the
route structure.

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

This example loads `resources/views/content/blogs/my-blog-post.blade.php` and
injects it into the layout via `$data['path']`.

You can use either dot or directory notation — `RouteBuilder` converts them
automatically.

```html +parse
<x-gt-alert type="warning">
A custom <code>view</code> property changes the view path injected into the layout. The layout itself is still used.
</x-gt-alert>
```

### Excluding Routes

When a route appears in multiple menus, use `exclude_route: true` to prevent it
being created more than once.

```json +torchlight-json
{
  "main": {
    "links": [{ "name": "Contact Us", "route_name": "contact" }]
  },
  "footer": {
    "links": [
      { "name": "Contact Us", "route_name": "contact", "exclude_route": true }
    ]
  }
}
```

This lets you reuse links across menus without duplicating routes.

### Rendering Markdown Files

If you want a route to return a markdown file instead of a Blade view, set
`"type": "md"` in your JSON file. This uses the markdown layout, with the file
path injected into `$data['path']`.

```json +torchlight-json
{
  "docs": {
    "links": [
      { "name": "Getting Started", "route_name": "docs.getting-started", "type": "md" }
    ]
  }
}
```

> Markdown routes still render through a layout (`components.layouts.markdown`
> by default or the layout passed in the constructor).




<!-- 
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
``` -->

How to I exclude child routes being created?