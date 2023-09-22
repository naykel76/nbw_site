# File, Disks and Storage


## Filesystem/File Facade

```php
File::move($src, $dest);
```

### Copy and move directory

```php
$src = public_path('images');
$dest = public_path('images/new-folder');
```


## Storage

The `Storage` facade may be used to interact with any of your configured disks.

### Disk instances

```php
Storage::disk();
Storage::disk('public');
Storage::disk('content');
```

### Copy and move directory

```php
Storage::copy('old/file.jpg', 'new/file.jpg');
Storage::move('old/file.jpg', 'new/file.jpg');
```

### Check directory exists

```php
if (!Storage::exists('public/images')) {
    Storage::makeDirectory('public/images');
}
```
