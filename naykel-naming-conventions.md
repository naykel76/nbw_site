# Naykel Naming Conventions

---

## Introduction

This document defines naming conventions for Naykel projects—including apps,
packages, and libraries—to ensure clarity, consistency, and ease of use. These
standards help developers quickly understand the purpose and context of each
component, whether working on user features, admin interfaces, or shared
libraries.

---

## General Principles

* Use clear, descriptive names that reflect purpose, not just UI or brevity.
  Clarity reduces ambiguity, and a few extra characters are worth avoiding
  confusion in real projects.

---

## Livewire Component Naming Convention

Livewire components are organised by **feature** (folder) and named by **role +
feature + purpose** (class name). This keeps related files grouped by role
within each feature folder and makes admin/user boundaries obvious.


### Folder and Class Structure

```php +torchlight-php
app/Livewire/{Feature}/{Role}{Feature}{Purpose}.php
```

* The **folder** defines the feature context.
* The **class name** starts with the component’s **role** (e.g., Admin, User,
  Viewer), then the **feature** (e.g., User, Course), and finally its
  **purpose** (e.g., Dashboard, Form, Manager).
* This explicit naming ensures the component’s role and function are clear
  wherever referenced (views, routes, tools), and groups admin-related files
  together for easier navigation.

```html +parse
<x-gt-alert type="info">
<p>While the folder provides feature context, starting the class name with the role (e.g., Admin) makes admin/user boundaries obvious and keeps admin-related files grouped together. This is especially helpful in large codebases.</p>
<p>This prioritises <b>clarity over brevity</b> , and avoids confusion across a growing codebase. </p>
</x-gt-alert>
```

### Examples

```swift +parse-code
<x-torchlight-code language="swift">
Livewire/User/AdminUserDashboard
Livewire/User/AdminUserCreateEdit

Livewire/Course/AdminCourseDashboard
Livewire/Course/AdminCourseCreateEdit

Livewire/Webinar/AdminWebinarDashboard
Livewire/Webinar/AdminWebinarCreateEdit
</x-torchlight-code>
```

### Dashboard

The **Dashboard** component is typically used for admin-facing interfaces that
provide an overview and management tools for a feature’s items. It acts as the
main landing page or "index" for administrators, displaying summaries,
statistics, and quick actions related to the feature.

> The Dashboard component usually corresponds to the "index" route for admin
> pages (e.g., `admin.orders.index`).

**Examples:** 
- `User/AdminUserDashboard`, 
- `Order/AdminOrderDashboard`,
- `Webinar/AdminWebinarDashboard`


<!-- these need to be reviewed chatgpt fucked them up! -->
<!-- 
* **Manager** Multi-section editor or viewer for a single resource. Use when
  managing tabs or sub-areas. <br> `Course/CourseManager` , `User/UserManager` ,
  `Course/StudentCourseManager`

* **Index** user-facing lists. Light overview of multiple items. <br>
  `Webinar/Index`, `Course/StudentIndex`, `Course/Index`

* **Form** Handles create/edit logic. Share across contexts where possible.
  Prefix if needed. <br> `User/Form` <br> `Webinar/AdminForm` <br> `Lesson/Form`


* **Viewer** Displays a single item or interactive view (e.g. media playback).
  <br> `Video/Viewer` <br> `Course/Viewer` <br> `Lesson/Viewer`

* **Show** Static read-only view of a single item. <br> `User/Show`,
  `Webinar/Show`

* **Modal**, **Button**, **Toggle** UI-specific or atomic components. <br>
  `Cart/AddToCartButton` <br> `Lesson/AdminContentToggle` <br>
    `Course/EnrolmentModal` -->

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
## Resource methods

Resource controllers stick to the Laravel naming convention for methods. (index,
create, store, show, edit, update, destroy)

- **`create`**: This method is responsible for presenting a form to the user to
  create a new resource. It may set default values or prepare the system for
  user input.

- **`edit`**: This method is responsible for fetching a specific resource and
  presenting it in an editable format (typically a form). The primary purpose is
  to allow the user to modify the existing data of the resource.

- **`save`**: This method is responsible for persisting the new or modified
  resource. It may perform validation, and will often call `create` or `update`
  to perform the actual database interaction.

- **`store`**: Often used in the context of saving a newly created resource.
  It's similar to `save`, but is specifically for new resources.

- **`update`**: Typically used to save changes to an existing resource. It's
  similar to `save`, but is specifically for existing resources.

- **`destroy`**: Typically used to handle the deletion of a specific resource
  from the system.








<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

<!-- 
## Laravel Controllers and views

Generally controllers are named by the plural form of their corresponding
resource. This is to avoid naming collisions with models that are often equally
named.

Generally controllers are named by the plural form of their corresponding
resource because they often manage collections of resources. Moreover, it helps
avoid naming collisions with models that are often equally named.

On the other hand, Livewire components and other classes are often singular
(e.g., PostComponent), as they usually represent a single logical unit or
functionality.

```php +torchlight-php
class PostsController {  }
```

Similarly, view directories are also named in the plural form (posts.index) to
match their corresponding controller. This helps maintain a consistent and
predictable structure to avoid the confusion that could arise if, for example, a
controller named `PostsController` was associated with a view located at
`post/post.blade.php` instead of `posts/post.blade.php`.

```php +torchlight-php
// In PostsController
public function index() {
    return view('posts.index');
}
``` -->


## Attributes



### What is the route_prefix?

The **`routePrefix`** is the named route excluding the action. For instance, if
the route is `admin.users.index`, the `routePrefix` would be `admin.users`.

The `routePrefix` attribute significantly simplifies the process of reusing
code. By defining a `routePrefix`, you can create components that are easily
adaptable for different contexts. For example, a `User` component and a `Post`
component could both utilize the same `edit` or `delete` snippet, with the
`routePrefix` being updated accordingly. This approach reduces code duplication
and enhances maintainability.

<div class="bx warning flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use></svg>
    <div>The route prefix should always be pluralized. `courses` not `course`.</div>
</div>

```php +torchlight-php
// In User component
<a href="{{ route("{$routePrefix}.edit", $user) }}">Edit</a>
<a href="{{ route("{$routePrefix}.destroy", $user) }}">Delete</a>

// In Post component
<a href="{{ route("{$routePrefix}.edit", $post) }}">Edit</a>
<a href="{{ route("{$routePrefix}.destroy", $post) }}">Delete</a>
```

Here are some other use cases of how the `routePrefix` attribute can be used:

- Used to generate named routes.
- Used to generate the page title.
- Used to generate the page breadcrumbs.


name="file-names-and-directory-structure"></a>

## File Names and Directory Structure

The full path to a file is composed with 3 parts:

- **`disk`**: This is the disk that contains the file. <br> *For example,*
  `public`, `s3`, or `local`.
- **`directory`**: This is the directory that contains the file. <br> *For
  example,* `/course/assignments`, or `/course/lectures`.
- **`name`**: This is the name of the file, including its extension. <br> *For
  example,* `assignment1.pdf`, or `lecture1.mp4`.
- **`fullPath`**: This is the complete path to the file, including the disk, all
  directories, and the file name. <br>*For example,*
  `public/courses/assignments/assignment1.pdf`, or
  `s3/courses/lectures/lecture1.mp4`.


The full path to a file is composed of four parts:

- **`disk`**: The disk that contains the file. For example, `public`, `s3`, or
  `local`.
- **`directory`**: The directory that contains the file. For example,
  `/course/assignments` or `/course/lectures`.
- **`name`**: The name of the file, including its extension. For example,
  `assignment1.pdf` or `lecture1.mp4`.
- **`fullPath`**: The complete path to the file, including the disk, all
  directories, and the file name. For example,
  `public/courses/assignments/assignment1.pdf` or
  `s3/courses/lectures/lecture1.mp4`.



