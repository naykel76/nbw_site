# Form Components

## Initialising the Form (Form Object)

When using a form component as a child of another component, you cannot mount
the model since the mount method only executes once when the component is
initialised.

To work around this, you must fire the `create` or `edit` methods from the form
component.


From Parent to Child

To address this, dispatch events from the parent. This approach allows the form
to function as if it were integrated directly into the parent component.




```php
public function mount() {
    $model = $this->post->exists ? $this->post : new Post;
    $this->form->init($model);
}
```







<!-- upload section including changes to the form object -->









<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

## Initialising the Form Model 

There are various ways to initialise the form model in the form object,
depending on whether you're working with a new or existing model, same page
using a modal or route-based form.

Each method has its own use case and requirements, so choose the one that best
fits your needs.

### Using the Component's `mount` Method

Managing new and existing models is straightforward with the `mount` method
because the model is set when the component is mounted. This ensures that the
form object is initialised correctly as soon as the component is loaded. The
main benefit is that the component has access to everything it needs to load an
existing model or create a new model instance and pass it to the form object's
`init` method.

```php
public function mount(Post $Post) {
    $model = $Post->exists ? $Post : new Post($initialData);
    $this->form->init($model);
}
```




##### <question>When would I define `initialData` in the component verses the form object?</question>

If you have dynamic data that may change based on Post input or other factors,
it is best to define the `initialData` in the component. For example, if you
have a nested list that requires the parent ID to be set, you will need to set
the initial data in the component because the form object does not have direct
access to the parent ID, it can only be passed to the form object via the
`create` method.

In this case you would define the `initialData` in the component and the
`create` method will fetch the `initialData` from the component.

- 
