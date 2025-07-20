# Factories

## Create Factory States

```php +torchlight-php
public function published(?Carbon $date = null): self
{
    return $this->state(
        fn (array $attr) => ['published_at' => $date ?? Carbon::now()]
    );
}
```

### Using Factory States

```php +torchlight-php
$course = Course::factory()->published()->create();
```

## Using Factories to Generate Related Models

When creating a model with relationships, you can use factories to generate related models.

```php +torchlight-php
return [
    'started_at' => now(),
    'user_id' => User::factory(), // Use the User factory to generate a user_id
];
```

## Factory Relationships

### Has Many Relationships

```php +torchlight-php
$course = Course::factory()
            ->has(Chapter::factory()->count(3))
            ->create();
```

### Nested Relationships

```php +torchlight-php
$course = Course::factory()
            ->has(Chapter::factory()
                ->has(Media::factory()->count(3))
                ->count(3)
            )
            ->create();
```
