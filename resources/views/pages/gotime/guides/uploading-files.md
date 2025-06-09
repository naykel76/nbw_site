# File Uploads

- [Introduction](#introduction)
- [Step 1: Apply Required Traits](#step-1-apply-required-traits)
- [Step 2: Update the Form Object](#step-2-update-the-form-object)
    - [Customising Storage Location](#customising-storage-location)
- [Step 3: Add the `filepond` Component to the Form View](#step-3-add-the-filepond-component-to-the-form-view)
    - [Preview the Image](#preview-the-image)
- [Setting the Maximum File Size](#setting-the-maximum-file-size)
    - [Notes](#notes)
- [FAQ's](#faqs)

## Introduction

This document explains how to implement secure file uploads using the
`Crudable`, `Formable`, and `WithFileUploads` traits alongside the `filepond`
component. The traits handle the upload and persistence process, while
`filepond` provides a user-friendly interface.

## Step 1: Apply Required Traits

* **Livewire component**

  * Use `WithFileUploads` trait for temporary file handling.

* **Form object**

  * Use `Crudable` trait to handle saving and moving the uploaded file.
  * Use `Formable` trait to manage form state and validation.

```html +parse
<x-gt-alert type="warning">
  The <code>WithFileUploads</code> trait must be used in the Livewire component class, <b>not the</b> form object.
</x-gt-alert>
```

## Step 2: Update the Form Object

- No extra validation rules or properties are needed for uploads.
- Optionally, configure the storage location by defining a `$storage` array property in your form object.

### Customising Storage Location

By default, files are stored using these settings:

| Key        | Description                                             | Default       |
| ---------- | ------------------------------------------------------- | ------------- |
| `disk`     | The storage disk to use (e.g., `public`, `media`, `s3`) | `'public'`    |
| `dbColumn` | The column where the file path will be saved            | `'file_name'` |
| `path`     | The subdirectory where files will be stored             | `''`          |

To change where files are stored, set a `$storage` property in your form object with any of these keys:

**Example**

```html +parse-code
<x-torchlight-code language="php">
   public array $storage = [
      'disk' => 'media',
      'dbColumn' => 'image_path',
      'path' => 'uploads/images',
  ];
</x-torchlight-code>
```

## Step 3: Add the `filepond` Component to the Form View

The `filepond` component binds to the `tmpUpload` property on the form object.
This property is provided by the `Crudable` trait and should be accessed through
the form object.

```html +parse-code
<x-torchlight-code language="blade">
@verbatim<x-gt-filepond wire:model="form.tmpUpload" />@endverbatim
</x-torchlight-code>
```

### Preview the Image

To preview an uploaded image, use a conditional image tag in your view. The
component first checks for a temporary image, then falls back to the saved image
via the model's `mainImageUrl` method.

**Add this method to your model:**

```
public function mainImageUrl()
{
    return $this->image_name
        ? Storage::disk('courses')->url($this->image_name)
        : url('/svg/placeholder.svg');
}
```

**View logic:**

```
<img src="{{ $form->tmpUpload ? $form->tmpUpload->temporaryUrl() : $this->form->editing->mainImageUrl() }}"
     alt="{{ $form->title ?? null }}" class="mxy-auto">
```

## Setting the Maximum File Size

There are three levels to consider when setting max file size:

1. **PHP Settings** Ensure `upload_max_filesize` and `post_max_size` are set
   appropriately in `php.ini`.

2. **Filepond Component** You should configure the max file size on the frontend
   via `filepond` to prevent oversized files from reaching the server.

3. **Livewire Configuration** Livewire enforces upload validation in
   `config/livewire.php`.

To override the default limit:

1. Publish the config file:

   php artisan vendor\:publish --tag=livewire\:config

2. Update the rules:

   'temporary\_file\_upload' => \[ 'rules' => 'max:1500000', // in kilobytes,
   approx. 1.5 GB ],

---

### Notes

* Ensure your model has the relevant file column in `$fillable`, or use
  `$guarded = []`
* Always define a `disk` and store only the filename or path, not full URLs
* Consider creating a `storage` config in your app for consistent usage

Let me know if you want a version tailored for your component library or inline
doc comments added to the `Crudable` trait.


## FAQ's

How can I define the naming convention for the file upload field in the form object?


 <!-- To define the naming convention for the file upload field in the form
object, you can set a property that specifies the name of the file upload field.
This property will be used to reference the uploaded file in your form handling
logic. For example, you can add a property like `$fileUploadFieldName` in your form
object class and set it to the desired name, such as `'image'` or `'document'`.
This property can then be used in your form view and component logic to
reference the file upload field consistently. Here's an example: -->
