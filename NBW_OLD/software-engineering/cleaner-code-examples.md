# Cleaner Code Examples

## Laravel Blade

### Conditional Button Disabled

From:

```php +code
@if (empty($form->tmpUpload))
    <x-gt-button icon="download" text="download File" class="primary w-full" />
@else
    <x-gt-button icon="download" text="download File" class="primary w-full" disabled />
@endif
```

To:

```php +code
<x-gt-button icon="download" text="Download File" class="primary w-full" :disabled="$form->tmpUpload" />
```

