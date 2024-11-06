# Eloquent: Grouping and Sorting

## Grouping by related models

To group results by related models, you can use the `groupBy` method. This method allows you to
group results by a specific column or relationship. In this example, we group courses by their
associated modules:

```php
$course = Course::select('id', 'title', 'slug')
    ->with([
        'modules:id,course_id,title',
        'modules.lessons:id,module_id,title'
    ])->find($courseId);
```



<!-- To group by a related model, you can use the `with` method to load the related model and then use
the `groupBy` method to group the results by a column from the related model.

```php
StudentCourse::query()
    ->with('studentLessons')
    ->OverviewWithLessons()
    ->find($scid);
``` -->



<!-- public function groupedByModule() {
    return $this->studentCourse->studentLessons->groupBy(
        fn($studentLesson) => $studentLesson->lesson->module->id
    );
} -->