# Resource Action Buttons

- [Overview](#overview)
- [Features](#features)
- [Basic Usage](#basic-usage)
- [Using with Routes](#using-with-routes)
- [Using Events](#using-events)
- [Overriding Default Behavior](#overriding-default-behavior)
    - [1. Custom Wire Click (Full Control)](#1-custom-wire-click-full-control)
    - [3. Global Event Dispatching   (i think i may remove this)](#3-global-event-dispatching---i-think-i-may-remove-this)
- [Default Behaviors](#default-behaviors)
    - [Attributes](#attributes)

## Overview

Resource action buttons are specialised buttons designed for CRUD operations on
resources. They're tightly integrated with the Gotime Livewire CRUD system.

## Features

- **Smart defaults**: Automatically sets button text, icons, and colors based on
  action type
- **Flexible behavior**: Supports direct method calls, event dispatching, or
  custom wire:click overrides  
- **Dual rendering**: Can render as buttons (Livewire) or links (traditional
  routes) via `routePrefix`
- **Built-in validation**: Requires `id` or `slug` for edit/delete actions
  (unless overridden)
- **Icon-only mode**: Supports compact display with `iconOnly` prop
- **Event communication**: Component-to-component via `dispatchTo` or global via
  `dispatch`

## Basic Usage

```html +parse
<div class="space-x">
    <x-gt-resource-action action="create" />
    <x-gt-resource-action action="edit" :id="5" />
    <x-gt-resource-action action="delete" :id="5" />
</div>
```

```html +torchlight-blade
@verbatim
<!-- Create a new resource -->
<x-gt-resource-action action="create" />

<!-- Edit an existing resource -->
<x-gt-resource-action action="edit" :id="$id" />

<!-- Delete with confirmation -->
<x-gt-resource-action action="delete" :id="$id" />
@endverbatim
```

## Using with Routes

When you provide a `routePrefix`, the component renders as traditional links
instead of Livewire buttons:

```html +torchlight-blade
@verbatim
<!-- Renders as: <a href="/posts/5/edit"> -->
<x-gt-resource-action action="edit" routePrefix="posts" :id="$id" />

<!-- Using slug instead of ID -->
<x-gt-resource-action action="show" routePrefix="posts" slug="my-blog-post" />
@endverbatim
```

## Using Events

Use `dispatchTo` for targeted component communication:

* uses convention when communicating with the `WithFormActions` trait so there
  is no need to add the event name when using the resource action buttons.


```html +torchlight-blade
@verbatim
<x-gt-resource-action action="create" dispatchTo="widget-create-edit" />
<!-- Generates: wire:click="$dispatchTo('widget-create-edit', 'create-model')" -->

<x-gt-resource-action action="edit" :id="$id" dispatchTo="widget-modal" />
<!-- Generates: wire:click="$dispatchTo('widget-modal', 'edit-model', { id: 5 })" -->
@endverbatim
```



## Overriding Default Behavior

The component automatically generates appropriate `wire:click` methods, but you
can override this in three ways:

### 1. Custom Wire Click (Full Control)
Override the default behavior completely by providing your own `wire:click`:

```html +torchlight-blade
@verbatim
<x-gt-resource-action wire:click="editEvent({{ $item->id }})" action="edit" />
@endverbatim
```

> **Note:** When using custom `wire:click`, the `id` parameter is not required
> since you control the method parameters.



### 3. Global Event Dispatching   (i think i may remove this)
Use `dispatch` for global event broadcasting:

```html +torchlight-blade
@verbatim
<x-gt-resource-action action="create" dispatch="widget-create" />
<!-- Generates: wire:click="$dispatch('widget-create')" -->

<x-gt-resource-action action="edit" :id="$id" dispatch="edit-widget" />
<!-- Generates: wire:click="$dispatch('edit-widget', { id: 5 })" -->
@endverbatim
```




## Default Behaviors

When no override is provided, the component uses these default `wire:click`
methods:

| Action        | Default Behavior                             |
| ------------- | -------------------------------------------- |
| `create`      | `wire:click="create"`                        |
| `edit`        | `wire:click="edit({{ $id }})"`               |
| `delete`      | `wire:click="$set('selectedId', {{ $id }})"` |
| `save`        | `wire:click="save"`                          |
| `view`/`show` | `wire:click="view"`                          |

### Attributes

| Attribute     | Required  | Description                                                    |
| :------------ | :-------: | :------------------------------------------------------------- |
| `action`      |    Yes    | `create`, `edit`, `delete`, `view`, `show`, `save`             |
| `id`          | Sometimes | Required for `edit` and `delete` actions                       |
| `slug`        | Sometimes | Alternative to `id` for route parameters                       |
| `routePrefix` |    No     | When provided, generates links instead of Livewire actions     |
| `dispatchTo`  |    No     | Target component name for component-to-component communication |
| `dispatch`    |    No     | Event name for global Livewire event dispatch                  |
| `text`        |    No     | The button text to display (defaults to ucfirst(action))       |
| `icon`        |    No     | The icon to display (auto-set based on action)                 |
| `iconOnly`    |    No     | Show only icon without text                                    |
