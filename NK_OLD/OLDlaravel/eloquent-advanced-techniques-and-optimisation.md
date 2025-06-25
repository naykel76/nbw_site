# Eloquent: Advanced Nesting and Optimisation Techniques

In this guide, we explore advanced Eloquent techniques for eager loading nested relationships and
optimising queries. We will use a scenario involving a learning management system with multiple
related tables to demonstrate how to retrieve a single student course along with associated student
lessons. The goal is to provide a comprehensive overview of the course, including all course,
module, and lesson information.

For a basic example refer to the [Eloquent: Optimisation Walkthrough](eloquent-optimisation-walkthrough) guide.

- [Scenario](#scenario)
  - [Tables](#tables)
  - [Relationships](#relationships)
  - [ER Diagram](#er-diagram)
- [Basic Query with Eager Loading and Column Selection](#basic-query-with-eager-loading-and-column-selection)
- [Eager Loading with Nested Relationships](#eager-loading-with-nested-relationships)
- [Troubleshooting](#troubleshooting)
- [View Example](#view-example)
- [Add this](#add-this)

## Scenario

We have a learning management system with several related tables:

There is a `courses` table that contains information about various courses, a `modules` table for
modules related to each course, and a `lessons` table for lessons associated with each module.
Additionally, we have a `student_courses` table tracking student enrollments and a `student_lessons`
table recording lessons students have completed.

The goal is to retrieve a single student course along with associated student lessons. The result
should provide an overview of the course, including all course, module, and lesson information.

### Tables

<div class="increase-space-1"></div>

- `courses`: Stores information about various courses.
   - Columns: `id`, `title`, `code`, `published_at`.

- `modules`: Contains modules related to each course.
  - Columns: `id`, `title`, `position`, `course_id`.

- `lessons`: Holds lessons associated with each module.
  - Columns: `id`, `title`, `position`, `module_id`.

- `student_courses`: Contains information about courses that students have enrolled in.
  - Columns: `id`, `started_at`, `completed_at`, `course_id`, `user_id`.

- `student_lessons`: Stores information about lessons that students have completed.
  - Columns: `id`, `completed_at`, `lesson_id`, `student_course_id`.

### Relationships

<div class="increase-space-05"></div>

- A **course** has many **modules**.
- A **module** belongs to a **course**.
- A **module** has many **lessons**.
- A **lesson** belongs to a **module**.
- A **course** has many **student_courses**.
- A **student_course** belongs to a **course**.
- A **student_course** has many **student_lessons**.
- A **student_lesson** belongs to a **student_course**.
- A **lesson** has many **student_lessons**.
- A **student_lesson** belongs to a **lesson**.

### ER Diagram

```mermaid +parse
<x-mermaid>
 erDiagram
    USERS ||--o{ STUDENT_COURSES: "enrolls"
    COURSES ||--o{ MODULES: "contains"
    MODULES ||--o{ LESSONS: "contains"
    COURSES ||--o{ STUDENT_COURSES: "has"
    STUDENT_COURSES ||--o{ STUDENT_LESSONS: "has"
    LESSONS ||--o{ STUDENT_LESSONS: "has"
    COURSES {
        bigint id PK
        string title
        string slug
        datetime published_at
    }
    
    MODULES {
        bigint id PK
        string title
        integer position
        bigint course_id FK
    }

    LESSONS {
        bigint id PK
        string title
        integer position
        bigint module_id FK
    }

    STUDENT_COURSES {
        bigint id PK
        datetime started_at
        datetime completed_at
        bigint course_id FK
        bigint user_id FK
    }

    STUDENT_LESSONS {
        bigint id PK
        datetime completed_at
        bigint lesson_id FK
        bigint student_course_id FK
    }
</x-mermaid>
```

## Basic Query with Eager Loading and Column Selection

First, we retrieve a single student course by its ID and eager load the `student_lessons`
relationship:

```php +torchlight-php
$studentCourse = StudentCourse::select('id', 'started_at', 'completed_at', 'expired_at')
    ->with('studentLessons:id,student_course_id,completed_at')
    ->find($scid);
```

This query retrieves the student course along with associated student lessons. However, the result
lacks detailed course, module, and lesson information. The next step is to extend this query to
include human-readable data by adding the necessary course, module, and lesson details.


## Eager Loading with Nested Relationships

First, we will start by eager loading the `course` relationship, as it is a direct relationship with
the `student_courses` table:

```php +torchlight-php
$studentCourse = StudentCourse::select('id', 'started_at', 'completed_at', 'expired_at')
    ->with([
        'course:id,title,code',
        'studentLessons:id,student_course_id,completed_at'
    ])
    ->find($scid);
```

Next, we extend the query to load nested relationships. Specifically, we will load the lesson and
module details through the `studentLessons` relationship:

```php +torchlight-php
$studentCourse = StudentCourse::select('id', 'course_id', 'started_at', 'completed_at', 'expired_at')
    ->with([
        'course:id,title,code',                                         // Load course details
        'studentLessons:id,student_course_id,lesson_id,completed_at',   // Load student lessons
        'studentLessons.lesson:id,title,position,module_id',            // Load lesson details via studentLessons
        'studentLessons.lesson.module:id,title,position,course_id'      // Load module details via lesson
    ])
    ->find($scid);    
```

In this query:

- The `course:id,title,code` relationship fetches the course information associated with the `studentCourse`.
- The `studentLessons` relationship loads all student lessons associated with the `studentCourse`.
- The `studentLessons.lesson` loads details for each lesson, and through `studentLessons.lesson.module`,
  the corresponding module details are retrieved.

## Troubleshooting

When working with selected columns, eager loading, and nested relationships, ensure that all
necessary columns are included in the `select` method. Specifically, be mindful of the primary key
(PK) and foreign key (FK) relationships required to properly load related models. If a foreign key
column is missing, the query may not return the expected results when eager loading relationships.

For example, in the query below, eager loading the course relationship won't work as expected if the
`course_id` (the foreign key) is not selected:

```php +torchlight-php
// Incorrect: Will not return course details due to missing course_id
$studentCourse = StudentCourse::select('id')
    ->with('course')->find($scid);
```

To resolve this, ensure that the foreign key `course_id` is included in the `select` method,
allowing the relationship to be properly loaded:

```php +torchlight-php
// Correct: Include course_id to load the course relationship
$studentCourse = StudentCourse::select('id', 'course_id')
    ->with('course')->find($scid);
```

In this case, the `course_id` is the foreign key linking the `student_courses` table to the `courses`
table, and it must be present in the query to load the associated course data.

## View Example

```html
<div class="bx space-y-05">
    <!-- student course details -->
    <div class="flex gap-3">
        <div class="txt-lg fw7 txt-blue">Student Course Details</div>
        <div><strong>Student Course ID: </strong>{{ $studentCourse->id }}</div>
        <div><strong>Started: </strong>{{ $studentCourse->started_at }}</div>
        <div><strong>Completed: </strong>{{ $studentCourse->completed_at }}</div>
        <div><strong>Expired: </strong>{{ $studentCourse->expired_at }}</div>
    </div>
    <!-- course details -->
    <div class="flex gap-3">
        <div class="txt-lg fw7 txt-blue">Course Details</div>
        <div><strong>Course ID: </strong>{{ $studentCourse->course->id }}</div>
        <div><strong>Course Title: </strong>{{ $studentCourse->course->title }}</div>
        <div><strong>Course Code: </strong>{{ $studentCourse->course->code }}</div>
    </div>
</div>
<div class="grid cols-4 gap va-t">
    @foreach ($studentLessons as $sl)
        <div class="bx space-y-05">
            <!-- student lesson details -->
            <div>
                <div class="txt-lg fw7 txt-blue">Student Lesson Details</div>
                <div><strong>Student Lesson ID: </strong>{{ $sl->id }}</div>
                <div><strong>Completed: </strong>{{ $sl->completed_at }}</div>
                <div><strong>Student Course ID: </strong>{{ $sl->student_course_id }}</div>
            </div>
            <!-- lesson details -->
            <div>
                <div class="txt-lg fw7 txt-blue">Lesson Details</div>
                <div><strong>Lesson ID: </strong>{{ $sl->lesson->id }}</div>
                <div><strong>Lesson Title: </strong>{{ Str::limit($sl->lesson->title, 30) }}</div>
                <div><strong>Lesson Module ID: </strong>{{ $sl->lesson->module_id }}</div>
            </div>
        </div>
    @endforeach
</div>
```






## Add this

Can now access the course details via the `studentCourse` relationship:

```php +torchlight-php
// from
<div><strong>Course Title: </strong>{{ $studentCourse->course->title }}</div>
// to
<div><strong>Course Title: </strong>{{ $studentCourse->title }}</div>
```







