# Migrations, Factories and Seeding

<!-- TOC -->

- [Create vs Make](#create-vs-make)
- [Running Factories](#running-factories)
  - [Has Many Relationships](#has-many-relationships)
  - [Belongs To Relationship](#belongs-to-relationship)

<!-- /TOC -->

## Create vs Make

```php
User::factory()->create(); // persists to the database
User::factory()->make();   // does not persist to the database
```

```php
```


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

### Has Many Relationships

```php
// verbose
Course::factory(10)->has(Chapter::factory()->count(4))->create();
// magic method
Course::factory(10)->hasChapters(5)->create();
```
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

