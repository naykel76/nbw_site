# UI Techniques

## Use a date field to set a checkbox value

Create new properties in the Form object to hold the boolean values for the checkboxes. Set these
values in the `init` method.

```php +torchlight-php
public bool $published;

public function init(Course $course): void
{
    $this->editing = $course;
    $this->setFormProperties($this->editing);

    $this->published = $this->editing->isPublished();
}
```

#### How do I update the database when the checkbox is checked or unchecked?

Use `beforePersistHook` from the `Crudable` trait to update the `validatedData` array before it is
persisted to the database.

```php +torchlight-php
if ($this->published != $this->editing->isPublished()) {
    $validatedData['published_at'] = $this->published ? now() : null;
}
```