# Factories

## Create Factory States

```php +code
public function published(?Carbon $date = null): self
{
    return $this->state(
        fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
    );
}
```

### Using Factory States

```php +code
$course = Course::factory()->published()->create();
```

## Using Factories to Generate Related Models

When creating a model with relationships, you can use factories to generate related models.

```php +code
return [
    'started_at' => now(),
    'user_id' => User::factory(), // Use the User factory to generate a user_id
];
```

## Factory Relationships

### Has Many Relationships

```php +code
$course = Course::factory()
            ->has(Chapter::factory()->count(3))
            ->create();
```

### Nested Relationships

```php +code
$course = Course::factory()
            ->has(Chapter::factory()
                ->has(Media::factory()->count(3))
                ->count(3)
            )
            ->create();
```
