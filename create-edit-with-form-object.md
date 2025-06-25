# Create/Edit Components Using Form Objects

- [Step 1: Create the Form Object](#step-1-create-the-form-object)
- [Step 3: Add the `init` Method and Initialize the Form Model](#step-3-add-the-init-method-and-initialize-the-form-model)
- [Step 4: Add the `createNewModel` Method](#step-4-add-the-createnewmodel-method)

K
## Step 1: Create the Form Object

```bash
php artisan livewire:form PostFormObject
```



## Step 3: Add the `init` Method and Initialize the Form Model

```php +torchlight-php
public function init(Post $user): void
{
    $this->editing = $user;
    $this->setFormProperties($this->editing);
    // Override any properties here
    $this->name = Str::title($this->name);
}
```

```html +parse
<x-gt-alert type="warning">
The <code>editing</code> attribute, defined in the <code>Formable</code> trait, represents the
form's initial or persisted state as a model instance. This attribute does not update to reflect
changes made to the model after the form has been edited. It only mirrors the model state when
initially set or after the form has been saved, not during the editing process.
</x-gt-alert>
```

## Step 4: Add the `createNewModel` Method

This method creates a new model instance, often used when initialising the form for a new record.

```php +torchlight-php
public function createNewModel(array $data = []): Post
{
    return Post::make(array_merge([
        'created_at' => now(),
    ], $data));
}
```


