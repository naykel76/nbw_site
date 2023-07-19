# Laravel Cheatsheet
<!-- TOC -->

- [Blade and Views](#blade-and-views)
    - [Determining If A View Exists](#determining-if-a-view-exists)
        - [Choose between local or package view](#choose-between-local-or-package-view)

<!-- /TOC -->

<a id="markdown-blade-and-views" name="blade-and-views"></a>

## Blade and Views

<a id="markdown-determining-if-a-view-exists" name="determining-if-a-view-exists"></a>

### Determining If A View Exists

<a id="markdown-choose-between-local-or-package-view" name="choose-between-local-or-package-view"></a>

#### Choose between local or package view

```php
// check local view
if (view()->exists("layouts.$this->layout")) {
    return view("layouts.$this->layout");
}

// if not exists, use package view
return view("package::layouts.$this->layout");
```

```php
$viewPath = view()->exists("layouts.$this->layout")
    ? "layouts.$this->layout"
    : "package::components.$this->layout";

return view($viewPath)->with(['data' => $data]);
```

```php
if (view()->exists('user.dashboard-layout')) {
    return view('user.dashboard-layout');
} else {
    return view('authit::user.dashboard-layout');
}
```



