# Laravel Quick Reference

- [Determining the Current Environment](#determining-the-current-environment)
- [String Limiting](#string-limiting)

## Determining the Current Environment

```php +code
if (App::environment('local')) {
    // The environment is local
}
 
if (App::environment(['local', 'staging'])) {
    // The environment is either local OR staging...
}
```

```
@env('staging')
    // The application is running in "staging"...
@endenv

@env(['staging', 'production'])
    // The application is running in "staging" or "production"...
@endenv
```

```
@production
    // Production specific content...
@endproduction
```


## String Limiting

```php +code
@verbatim
// Character-based limiting
{{ Str::limit($text, 30) }}          // 30 chars + "..."
{{ Str::limit($text, 30, ' →') }}    // 30 chars + " →"
@endverbatim
```
