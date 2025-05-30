# Troubleshooting

- [Form Object and Model Binding](#form-object-and-model-binding)
    - [Can't set model as property if it hasn't been persisted yet](#cant-set-model-as-property-if-it-hasnt-been-persisted-yet)
- [Event Troubleshooting](#event-troubleshooting)
- [Errors](#errors)

## Form Object and Model Binding

### <question>Can't set model as property if it hasn't been persisted yet</question>

Livewire cannot re-hydrate a model that does not exist in the database, so you can not create a new
blank model and pass it to a Livewire component. You can only pass a model that has been persisted
to the database.

<a href="https://laracasts.com/discuss/channels/livewire/livewire-3-cant-set-model-as-property-if-it-hasnt-been-persisted-yet" target="blank">
    https://laracasts.com/discuss/channels/livewire/livewire-3-cant-set-model-as-property-if-it-hasnt-been-persisted-yet
</a>


## Event Troubleshooting



**What is the solution?**

The solution is to dispatch the event to the parent component and then let the parent component
handle the event.


## Errors

Error: Method Illuminate\Database\Eloquent\Collection::getMorphClass does not exist.

Livewire doesn't support custom queries, such as group by, selects, etc. when assigning models to
properties. So you should use a computed property instead.  <a href="https://livewire.laravel.com/docs/properties#eloquent-constraints-arent-preserved-between-requests" target="blank">See here for more details.</a>

```php
// Wrong way
public function mount(StudentCourse $studentCourse) {
    $studentCourse = $studentCourse->load('studentLessons.media.module');

    $this->groupedByModule = $studentCourse->studentLessons->groupBy(function ($studentLesson) {
        return $studentLesson->media->module->id;
    });

    $this->course = $studentCourse->course;
}
```

Computed properties are methods in your component marked with the #[Computed] attribute. They can be
accessed as a dynamic property that isn't stored as part of the component's state but is instead
evaluated on-the-fly.

Here's the above example re-written using a computed property:

```php
#[Computed('groupedByModule')]
public function groupedByModule()
{
    return $this->studentCourse->studentLessons->groupBy(function ($studentLesson) {
        return $studentLesson->media->module->id;
    });
}
```

```php
// Right way
public function mount(StudentCourse $studentCourse) {
    $this->studentCourse = $studentCourse->load('studentLessons.media.module');
    $this->course = $studentCourse->course;
}
```

Now you access the groupedByModule using `$this->groupedByModule` in your blade file. 

**Must access using `this`**

```php
@foreach ($this->groupedByModule as $moduleId => $lessons)
    // the rest of your code
@endforeach
```