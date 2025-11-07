# File, Disks and Storage

- [Configuration](#configuration)
- [Accessing Files](#accessing-files)
- [Difference between `Filesystem` and `Storage`](#difference-between-filesystem-and-storage)
- [Quick Reference Table](#quick-reference-table)
- [Storing Files](#storing-files)
   - [Store vs Save](#store-vs-save)
   - [Naming Files](#naming-files)
- [Getting Files](#getting-files)
- [Deleting Files](#deleting-files)
- [Downloading Files](#downloading-files)
   - [Common approaches](#common-approaches)
   - [Example for your case](#example-for-your-case)
   - [Summary](#summary)

<!-- When saving a file in Laravel, you always specify the directory path within the disk, but you don’t include the disk name as part of the path. -->
## Configuration

`config/filesystems.php` is where you may configure all of your filesystem
"disks". Each disk represents a particular storage driver and storage location.


The Public Disk

By default, the public disk uses the local driver and stores its files in
`storage/app/public`.

echo asset('storage/file.txt');


use Illuminate\Support\Facades\Storage;

Storage::disk('local')->put('example.txt', 'Contents');

## Accessing Files
You can access files stored in the public disk using the `Storage` facade. For
example, to retrieve a file stored in the public disk, you can use the `url`




## Difference between `Filesystem` and `Storage`

In Laravel, both `Filesystem` and `Storage` are used to interact with files, but
they serve slightly different purposes and offer different levels of
abstraction.

The `Filesystem` class provides a set of static methods for interacting with the
file system directly. It includes methods for reading and writing files,
creating and deleting directories, and other low-level operations. It's a more
"raw" way of dealing with files and directories, and it doesn't involve any
configuration or abstraction.

The `Storage` facade, on the other hand, provides a more abstract way of dealing
with file storage. It allows you to define "disks" in your configuration, which
can be local directories, Amazon S3 buckets, or any other type of storage
supported by the Laravel community. The `Storage` facade provides a simple,
unified API for interacting with these disks, regardless of their underlying
implementation.

In general, you would use the `Storage` facade when you want to take advantage
of Laravel's filesystem configuration and abstraction, and the `Filesystem`
class when you need to perform low-level file operations.

In short;

- `Filesystem` class is used to perform low-level file operations.
- `Storage` facade is used to interact with any of your configured disks.



## Quick Reference Table

| Action                              | `Storage` Facade                                                 | Helper                                    |
| :---------------------------------- | ---------------------------------------------------------------- | ----------------------------------------- |
| Store a file                        | `Storage::disk('public')->put('path/to/file', $contents);`       | `$file->store('path/to/file', 'public');` |
| Check if a file exists              | `$exists = Storage::disk('public')->exists('path/to/file');`     | `$exists = $file->isValid();`             |
| Delete a file                       | `Storage::disk('public')->delete('path/to/file');`               | Not available                             |
| Get a file's size                   | `$size = Storage::disk('public')->size('path/to/file');`         | `$size = $file->getSize();`               |
| Get a file's last modification time | `$time = Storage::disk('public')->lastModified('path/to/file');` | `$time = $file->getATime();`              |

## Storing Files

### Store vs Save

The `storeAs` and `store` methods are used to store uploaded files in Laravel.
However, they work slightly differently:

1. `storeAs($path, $name, $disk)`: This method <span
   class="txt-underline">stores the file in a directory with a name that you
   provide</span>. The `$path` parameter is the directory where the file will be
   stored, `$name` is the name that the file will be given, and `$disk` is the
   storage disk that the file will be stored on.
2. `store($path, $disk)`: This method also stores the file, but will <span
   class="txt-underline"> automatically generate a unique ID as the
   filename</span>. The `$path` parameter is the directory where the file will
   be stored, and `$disk` is the storage disk that the file will be stored on.

```php +code
use Illuminate\Support\Facades\Storage;

$request->validate([
    'image' => 'image|max:2048', // max size 2MB
]);

$file = $request->hasFile('image'); // Retrieve the uploaded file from the request
$filename = $file->getClientOriginalName(); // Retrieve the original filename
```

```php +code
Storage::disk('public')->put('path/to/file', $contents);
$file->store('path/to/file', 'public');
```

### Naming Files

```php +code
$originalName = $file->getClientOriginalName(); // Retrieve the original filename
$timestampName = time() . '.' . $image->getClientOriginalExtension();
```


## Getting Files

```php +code
Storage::disk('public')->get('path/to/file');
```



## Deleting Files

```php +code
use Illuminate\Support\Facades\Storage;

Storage::disk('public')->delete('path/to/file');
Storage::delete(['path/to/file1', 'path/to/file2']);
```


## Downloading Files

```php +code  
return Storage::disk('your_disk_name')->download('path/to/file');
return Storage::download('path/to/file');
```















The best way to access files stored via Laravel’s storage system from a Blade view is to use the built-in helper functions to generate the correct URL.

---

### Common approaches

1. **Use the `Storage::url()` helper**

If you have a file stored on a disk configured with a URL (e.g. `public` disk), you can do:

```
<img src="{{ Storage::url($filePath) }}" alt="Image">
```

2\. **Use the `asset()` helper for public files**

If files are publicly accessible (e.g. in `public/storage`), you can use:

```
<img src="{{ asset('storage/' . $filePath) }}" alt="Image">
```

3\. **For private files, generate temporary signed URLs**

If files are private (e.g. on S3 or local private disk), generate a temporary URL in the controller and pass it to Blade:

Controller:

```
$url = Storage::disk('s3')->temporaryUrl($filePath, now()->addMinutes(5));
```

Blade:

```
<a href="{{ $url }}">Download</a>
```

---

### Example for your case

Suppose your `$storageConfig` has disk and path, and your filename is `$fileName`:

```
$fullPath = $storageConfig['path'] . $fileName;
```

In Blade:

```
<video controls>
  <source src="{{ Storage::disk($storageConfig['disk'])->url($fullPath) }}" type="video/mp4">
  Your browser does not support the video tag.
</video>
```

---

### Summary

* Use `Storage::disk('diskName')->url('filePath')` for URLs
* Use `asset('storage/filePath')` if files are publicly accessible in `public/storage`
* Use temporary URLs for private files

---

Let me know if you want example code for controller and Blade together.
