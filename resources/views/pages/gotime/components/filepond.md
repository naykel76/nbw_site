# Filepond

```html +parse
<x-gt-alert type="info">
<div class="txt-lg">Filepond is a class based component</div>
</x-gt-alert>
```

```html +parse
<livewire:gotime.components.filepond variant="video" />
```


; Maximum size of POST data that PHP will accept. Must be >= upload_max_filesize.
post_max_size = 550M

; Maximum allowed size for uploaded files.
upload_max_filesize = 550M

; Maximum execution time of each script, in seconds. Uploading large files can take time.
max_execution_time = 300

; Maximum time in seconds a script is allowed to parse input data, like file uploads.
max_input_time = 300

; Maximum amount of memory in bytes that a script is allowed to allocate.
; Crucial for processing large files after upload (e.g., moving, processing).
memory_limit = 512M