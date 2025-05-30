# Laravel Quick Reference

- [Determining the Current Environment](#determining-the-current-environment)

## Determining the Current Environment

```php
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



