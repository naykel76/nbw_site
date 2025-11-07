# Enums

## PublishedStatus

Define the necessary methods in the model. You only need to define for the status you want
to use. The enum will handle the rest.


```php +code
public function isPublished()
{
    return $this->published_at != null;
}

public function status(): PublishedStatus
{
    if ($this->isPublished()) {
        return PublishedStatus::Published;
    } else {
        return PublishedStatus::Draft;
    }
}
```

```html
<div class="rounded-full inline-flex items-center {{ $item->status()->color() }} txt-xs px-05 py-025">
    <x-gt-icon name="{{ $item->status()->icon() }}" class="icon wh-1 mr-025" />
    {{ $item->status()->label() }}
</div>
```

