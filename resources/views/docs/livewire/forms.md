# Livewire Forms




## Introduction

In this example, we will walk through the steps of creating a Livewire component and a form object
for creating and editing a course.

## Create the Livewire component

```bash
php artisan make:livewire Course/CreateEdit
```



## Create the form object

```bash
php artisan make:form CourseForm
```


### Import the model and validation rule

Note: you only need to import the `Rule` object if you have custom or complex rules to be validated.

```php
use App\Models\Course;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
```


### Add the properties to the form object

```php
public Course $course;
public string $title;
public string $code;
public $price;
```


### Validation for the form object properties

From Livewire 3, you can use the `Validate` attribute to validate the form object properties,
however you can still use the `rules()` method if you prefer.

```php
public function rules(){
    return [
        'title' => 'required|min:3',
        'code' => ['required', Rule::unique('courses')->ignore($this->course)],
        'price' => 'sometimes|numeric',
    ];
}
```

### Set the form model and properties

Why do we need to set the form model and properties?

<!-- When we are creating a new course, the form model is empty, so we need to set the form model and
properties to empty values.

When we are editing a course, the form model is not empty, so we need to set the form model and the
properties to the values of the form model. -->

```php
public function setModel(Course $course) {
    $this->course = $course;

    $this->title = $this->course->title;
    $this->code = $this->course->code;
    $this->price = $this->course->price;
}
```

```php
public function mount(Course $course = null) {
    $this->setModel($course ?? new Course());
}
```




```php

```
```php

```
```php

```
```php

```

---
---
---
---
---
---
---
---
---

Use a `submit` button to submit the for when the enter key is pressed.

```html
<form wire:submit="save">
    ...
    <button type="submit" class="btn primary">Save</button>
</form>
```
