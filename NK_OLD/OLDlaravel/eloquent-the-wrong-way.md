# Eloquent: The Wrong Way

In this approach, we use the `StudentCourse` model to eager load `StudentLessons`:

```php
public function mount(StudentCourse $studentCourse) {
    $studentCourse = $studentCourse->load('studentLessons');
    $this->lessons = $studentCourse->studentLessons;
}
```

This approach produces the correct output by leveraging relationships, allowing us to use the view
to display the data and retrieve additional information as needed.

```php
<ul class="space-y-0 txt-sm">
    @foreach ($lessons->groupBy('media.module.id') as $moduleId => $groupedLessons)
        <li>Module ID: {{ $moduleId }} - {{ $groupedLessons->first()->media->module->title }}</li>
        <ul>
            @foreach ($groupedLessons as $lesson)
                <li>
                    Lesson ID: {{ $lesson->id }}
                    Lesson Media ID: {{ $lesson->media_id }}
                    {{ Str::limit($lesson->media->title, 25) }}
                </li>
            @endforeach
        </ul>
    @endforeach
</ul>
```

While this solution works, it is not ideal because it is not the most efficient way to handle the
data. The grouping and accessing of related data within the view can lead to performance issues and
increased complexity.


## The Right Way

To improve the efficiency and maintainability of the code, we can use a query to fetch the necessary
data in a single call. This approach allows us to retrieve the required information directly from
the database, reducing the number of queries and improving performance.
