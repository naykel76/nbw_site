# Migrations, Factories and Seeding

<!-- TOC -->

- [Running Factories](#running-factories)
    - [Has Many Relationships](#has-many-relationships)
    - [Belongs To Relationship](#belongs-to-relationship)

<!-- /TOC -->

<a id="markdown-running-factories" name="running-factories"></a>

## Running Factories

```php
\App\Models\Course::factory(10)->create();
```

```php
// A user has one profile
User::factory(10)
    ->has(UserProfile::factory())
    ->create();
```

<a id="markdown-has-many-relationships" name="has-many-relationships"></a>

### Has Many Relationships

```php
// verbose
Course::factory(10)->has(Chapter::factory()->count(4))->create();
// magic method
Course::factory(10)->hasChapters(5)->create();
```
<a id="markdown-belongs-to-relationship" name="belongs-to-relationship"></a>

### Belongs To Relationship

```php
// verbose
Chapter::factory()->count(3)->for(Course::factory())->create();
// magic method
Chapter::factory(3)->forCourse()->create();

```


Create the parent record and seed children

```php
Chapter::factory(3)->for(Course::create([
    'code' => 'COU_PR27',
    'title' => 'Sample Course',
]))->create();
```

