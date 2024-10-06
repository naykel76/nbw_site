# File, Disks and Storage

<!-- TOC -->

- [Difference between `Filesystem` and `Storage`](#difference-between-filesystem-and-storage)
- [Quick Reference Table](#quick-reference-table)
- [Storing Files](#storing-files)
  - [Store vs Save](#store-vs-save)
  - [Naming Files](#naming-files)
- [Getting Files](#getting-files)
- [Deleting Files](#deleting-files)

<!-- /TOC -->

<!-- if you don't specify a disk, the default disk will be used. -->

<a id="markdown-difference-between-filesystem-and-storage" name="difference-between-filesystem-and-storage"></a>

## Difference between `Filesystem` and `Storage`

In Laravel, both `Filesystem` and `Storage` are used to interact with files, but they serve
slightly different purposes and offer different levels of abstraction.

The `Filesystem` class provides a set of static methods for interacting with the file system directly.
It includes methods for reading and writing files, creating and deleting directories, and other
low-level operations. It's a more "raw" way of dealing with files and directories, and it doesn't
involve any configuration or abstraction.

The `Storage` facade, on the other hand, provides a more abstract way of dealing with file
storage. It allows you to define "disks" in your configuration, which can be local directories,
Amazon S3 buckets, or any other type of storage supported by the Laravel community. The `Storage`
facade provides a simple, unified API for interacting with these disks, regardless of their
underlying implementation.

In general, you would use the `Storage` facade when you want to take advantage of Laravel's
filesystem configuration and abstraction, and the `Filesystem` class when you need to perform
low-level file operations.

In short;

- `Filesystem` class is used to perform low-level file operations.
- `Storage` facade is used to interact with any of your configured disks.


<a id="markdown-quick-reference-table" name="quick-reference-table"></a>

## Quick Reference Table

| Action                              | `Storage` Facade                                                 | Helper                                    |
| :----------------------------------- | ---------------------------------------------------------------- | ----------------------------------------- |
| Store a file                        | `Storage::disk('public')->put('path/to/file', $contents);`       | `$file->store('path/to/file', 'public');` |
| Check if a file exists              | `$exists = Storage::disk('public')->exists('path/to/file');`     | `$exists = $file->isValid();`             |
| Delete a file                       | `Storage::disk('public')->delete('path/to/file');`               | Not available                             |
| Get a file's size                   | `$size = Storage::disk('public')->size('path/to/file');`         | `$size = $file->getSize();`               |
| Get a file's last modification time | `$time = Storage::disk('public')->lastModified('path/to/file');` | `$time = $file->getATime();`              |


<a id="markdown-storing-files" name="storing-files"></a>

## Storing Files

<a id="markdown-store-vs-save" name="store-vs-save"></a>

### Store vs Save

The `storeAs` and `store` methods are used to store uploaded files in Laravel. However, they work
slightly differently:

1. `storeAs($path, $name, $disk)`: This method <span class="txt-underline">stores the file in a
   directory with a name that you provide</span>. The `$path` parameter is the directory where the
   file will be stored, `$name` is the name that the file will be given, and `$disk` is the
   storage disk that the file will be stored on.
2. `store($path, $disk)`: This method also stores the file, but will <span class="txt-underline">
   automatically generate a unique ID as the filename</span>. The `$path` parameter is the
   directory where the file will be stored, and `$disk` is the storage disk that the file will be
   stored on.

```php
use Illuminate\Support\Facades\Storage;

$request->validate([
    'image' => 'image|max:2048', // max size 2MB
]);

$file = $request->hasFile('image'); // Retrieve the uploaded file from the request
$filename = $file->getClientOriginalName(); // Retrieve the original filename
```

```php
Storage::disk('public')->put('path/to/file', $contents);
$file->store('path/to/file', 'public');
```


<a id="markdown-naming-files" name="naming-files"></a>

### Naming Files

```php
$originalName = $file->getClientOriginalName(); // Retrieve the original filename
$timestampName = time() . '.' . $image->getClientOriginalExtension();
```

<a id="markdown-getting-files" name="getting-files"></a>

## Getting Files

```php
Storage::disk('public')->get('path/to/file');
```


<a id="markdown-deleting-files" name="deleting-files"></a>

## Deleting Files

```php
use Illuminate\Support\Facades\Storage;

Storage::disk('public')->delete('path/to/file');
Storage::delete(['path/to/file1', 'path/to/file2']);
```
