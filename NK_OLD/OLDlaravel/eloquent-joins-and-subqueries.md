# Eloquent: Joins and Subqueries

- [Important Concepts](#important-concepts)
- [Joining Tables in Laravel](#joining-tables-in-laravel)
- [Subqueries](#subqueries)
- [How the Subquery Works](#how-the-subquery-works)
  - [Example: Adding a Subquery with `addSelect`](#example-adding-a-subquery-with-addselect)
- [Troubleshooting](#troubleshooting)
    - [Missing Columns in Joined Tables](#missing-columns-in-joined-tables)

## Important Concepts

- When joining multiple tables in a query, it is important to specify the table name (or table
  alias) in the select method to avoid column name conflicts, especially if both tables have columns
  with the same name (like id). This ensures that the query knows which table the selected column
  belongs to.

## Joining Tables in Laravel 

The first argument passed to the join method is the name of the table you want to join to,

The second argument is the column from the first table you want to join on, 
and the third argument is the column from the second table you want to join on.

**Pseudo:** Join `table_to_join`, where `this_table.id` (primary key) equals `table_to_join.id` (foreign key).

Suppose you have a posts table and a users table. You want to join these tables to include the
user_id and name columns from the users table in the posts table.

Here’s how you can do it:

```php +torchlight-php
$posts = Post::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select('posts.*', 'users.name as author_name')
    ->get();
```

Or if you we in the `Post` model,  you can create a query scope:

```php +torchlight-php
public function scopeOverview(Builder $query): Builder
{
    return $this->query->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name as author_name');
}
```

---

## Subqueries

A subquery is a query nested within another query, allowing you to perform calculations or filter
data before fetching the final result. Subqueries are particularly useful for handling complex
logic, such as deriving values from related tables, or aggregations that are difficult to achieve
with a single query.

- **Add Additional Columns:** Subqueries enable you to add calculated or derived columns to the main
  query.
- **Computed on the Fly:** Subqueries are evaluated for each row of the main query, with results
  included dynamically.
- **Returns One Column:** Subqueries typically return a single column, which can be used in further
  processing.
- **Support in Laravel:** Laravel supports subqueries using the `addSelect` method, allowing
  subqueries to be incorporated into the main query.

## How the Subquery Works

The `whereColumn` method in the subquery links two tables (e.g., `student_lessons` and
`student_courses`). This creates a relationship between the subquery and the main query, so the
subquery can reference the current row of the main query. For each row in the main query (in this
case, for each `student_course`), the subquery is executed to fetch data related to that row.

### Example: Adding a Subquery with `addSelect`

The following query adds the `currentLessonId` column using a subquery. It selects the ID of the
first lesson that is incomplete (`completed_at = null`) and unlocked (`is_locked = false`).

- **`whereColumn('student_course_id', 'student_courses.id')`:** Links `student_lessons` to
  `student_courses` by matching `student_course_id` in the subquery to `id` in the main query.
- **`limit(1)`:** Ensures only the first matching lesson is retrieved (the current lesson).
- **`addSelect([...])`:** Adds the subquery result (`currentLessonId`) to the final result set.

```php +torchlight-php
$studentCourses = StudentCourse::whereUserId(3)
    ->with('course:id,title,code')
    ->addSelect([
        'currentLessonId' => StudentLesson::select('id')
            ->whereColumn('student_course_id', 'student_courses.id')
            ->where('completed_at', null)
            ->where('is_locked', false)
            ->limit(1),
    ])
    ->get();
```

This approach dynamically includes related data (such as the current lesson ID) without manually
joining tables. The subquery is executed for each `student_course` record and incorporated into the
final output.

---

## Troubleshooting

#### Missing Columns in Joined Tables

When using the `select` method, ensure you include all necessary columns from both the primary and
joined tables to retrieve the expected data.

```php +torchlight-php
// Incorrect: Missing columns from the joined table
$studentCourse = StudentCourse::select('course_id')
    ->join('courses', 'student_courses.course_id', 'courses.id')
    ->first();
```

```php +torchlight-php
// Correct: Include necessary columns from the joined table and specify table names
$studentCourse = StudentCourse::select('student_courses.id', 'student_courses.course_id')
    ->join('courses', 'student_courses.course_id', 'courses.id')
    ->first();
```

Additionally, specifying the table name (or alias) for
each column is crucial to avoid conflicts, especially when columns with the same name exist in
multiple tables.

```php +torchlight-php
// Incorrect: This will cause a column name conflict
StudentCourse::select('id', 'course_id')
    ->join('courses', 'student_courses.course_id', 'courses.id')
    ->get();
```

```php +torchlight-php
// Correct: Include the table name in the select method
StudentCourse::select('student_courses.id', 'course_id')
    ->join('courses', 'student_courses.course_id', 'courses.id')
    ->get();
```

---