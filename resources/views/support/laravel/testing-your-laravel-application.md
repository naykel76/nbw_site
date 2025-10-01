# Laravel Testing Guide with Pest

- [Testing Philosophy](#testing-philosophy)
- [Test Description Patterns](#test-description-patterns)
    - [Test Section Descriptions](#test-section-descriptions)
- [Testing Techniques \& Best Practices](#testing-techniques--best-practices)
    - [Initial Value Testing: `assertSet()` vs `expect()`](#initial-value-testing-assertset-vs-expect)
        - [When to Use Each Approach](#when-to-use-each-approach)
    - [Date Testing](#date-testing)
- [3. Form Object Tests (`tests/Feature/Livewire/WidgetFormObjectTest.php`)](#3-form-object-tests-testsfeaturelivewirewidgetformobjecttestphp)
- [Crap --------------------------------------------------](#crap---------------------------------------------------)
- [Page Tests](#page-tests)
- [Testing Emails](#testing-emails)
    - [`sends email to ...`](#sends-email-to-)
- [Troubleshooting](#troubleshooting)
    - [Authentication Required for Protected Routes](#authentication-required-for-protected-routes)
- [FAQ's](#faqs)
    - [What is the difference between `assertSee` and `assertSeeText`?](#what-is-the-difference-between-assertsee-and-assertseetext)
- [Important Notes](#important-notes)


## Testing Philosophy

**Focus on Feature Tests**: Test how users interact with your application, not
implementation details. Feature tests should cover complete user workflows and
business scenarios.

**Livewire Component Tests**: Focus on behaviour such as sorting, filtering,
data updates, state changes, and validation. Avoid testing authentication or
roles here; those belong in route or feature tests. 

## Test Description Patterns

```php +torchlight-php
describe('rendering', function () {
    // Test what users see and interact with such as buttons, forms, and lists.
    // Focus on the visual output and UI state, not the underlying implementation.
});

describe('initialisation', function () {
    // Test component setup and initial state such as default values and data loading.
});

describe('user interactions', function () {
    // Test form submissions, clicks, and UI responses to user actions.
});

describe('reactivity & events', function () {
    // Test silent event dispatching and responses to external events.
    // Use this section when events happen without direct user interaction.
});

describe('validation', function () {
    // Test that invalid data is properly rejected with appropriate error messages.
});

describe('data persistence', function () {
    // Test successful save/update/delete operations and their side effects.
});
```

### Test Section Descriptions

**Rendering**  
*Tests the visual output and UI state of the component. Covers how data is
displayed to users, including empty states, populated forms, lists with varying
record counts, and the presence of interactive elements like buttons and form
fields. Focus on what users see, not how it's implemented.*

**Initialisation**  
*Tests the component's setup behavior when first loaded. Verifies that forms
start with appropriate default values for new records, correctly populate with
existing data when editing, and that all properties are bound and ready for user
interaction. Covers both "create new" and "edit existing" scenarios.*

**User Interactions**  
*Tests how the component responds to user actions. Includes form submissions,
button clicks, field updates, and any dynamic UI changes triggered by user
behavior. Verifies that interactions trigger the expected component methods and
UI updates without testing the underlying business logic.*

**Reactivity & Events**  
*Tests component responses to external events and silent event dispatching.
Covers Livewire events from other components, background processes that dispatch
events, and reactive updates that occur without direct user interaction. Use
when testing event-driven behavior that happens independently of user actions.*

**Validation**  
*Tests that business rules are enforced at the form level. Focuses on negative
cases - ensuring invalid data is rejected with appropriate error messages. Each
validation rule should be tested individually with specific invalid inputs. Does
not test successful submissions (that belongs in data persistence).*

**Data Persistence**  
*Tests successful completion of operations with valid data. Verifies that
properly formatted data is saved to the database, relationships are created
correctly, events are dispatched, and users receive appropriate feedback. Covers
create, update, and delete operations along with their side effects.*


https://github.com/naykel76/wiggity/blob/main/tests/Feature/Livewire/ProductIndexTest.php


https://github.com/naykel76/wiggity/blob/main/tests/Feature/Livewire/ProductCreateEditTest.php


They're descriptive without being verbose. The pattern of:

- `displays products in...`
- `shows empty state when...`
- `refreshes to show new product after...`











## Testing Techniques & Best Practices

### Initial Value Testing: `assertSet()` vs `expect()`

**The Problem**: `assertSet()` uses loose comparison and can't distinguish
between different falsy values:

```php +torchlight-php
// ❌ BOTH of these will pass - this is wrong!
->assertSet('form.title', '')
->assertSet('form.title', null)
```

This makes it unreliable for testing exact initial states where the difference
between `''`, `null`, `0`, and `false` matters.

**The Solution**: Use `expect()` with `get()` for precise initial value testing:

```php +torchlight-php
it('initialises form with default values when creating', function () {
    $component = Livewire::test(WidgetCreateEdit::class)
        ->call('create');

    expect($component->get('form.title'))->toBe('');
    expect($component->get('form.start_date'))->toBeNull();
});
```

#### When to Use Each Approach

**Use `expect()->toBe()` / `expect()->toBeNull()` when:**
- Testing default/initial values from form object properties  
- You need to distinguish between `''`, `null`, `0`, `false`, etc.
- Testing exact type and value precision

**Use `assertSet()` when:**
- Comparing against known model data values
- Values are guaranteed to be non-ambiguous
- You want concise, readable assertions

### Date Testing

When testing dates, ensure both sides use the same format:

```php +torchlight-php
// In your form object's init method, format dates consistently
$this->start_date = $model->start_date?->format(config('gotime.date_format'));
$this->end_date = $model->end_date?->format(config('gotime.date_format'));

// In your test, use the same format
->assertSet('form.start_date', $widget->start_date?->format(config('gotime.date_format')))
->assertSet('form.end_date', $widget->end_date?->format(config('gotime.date_format')))
```



<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->









<!-- 


### Relationships

*Tests handling of related widget associations.*

* `handles empty related widget id correctly`
* `can set related widget id`

```php +torchlight-php
describe('relationships', function () {
    it('handles empty related widget id correctly', function () {
        // ... test code
    });

    it('can set related widget id', function () {
        // ... test code
    });
});
``` -->






---

## 3. Form Object Tests (`tests/Feature/Livewire/WidgetFormObjectTest.php`)



* `it initialises with empty form properties`
* `it initialises with model data`
* `it creates new model with provided data`
* `it creates new model with empty data`



* `it validates required title`
* `it validates title max length`
* `it validates country max length`
* `it validates start date after or equal today`
* `it validates end date after start date`
* `it validates related widget id as integer`
* `it passes validation with valid data`
* `it allows null dates`
* `it allows empty related widget id`


* `it stores editing model when initialised`
* `it handles related widget relationship`
* `it saves new model successfully`
* `it updates existing model successfully`

## Crap --------------------------------------------------

<!-- FIX ME -->
<!-- <p class="lead">This article explains <strong>What</strong> and <strong>How</strong> to test in Laravel using Pest PHP. It outlines common testing methods, recommended practices, and a structural guide to help ensure your application works as intended.</p> -->


## Page Tests

Page tests (also known as **feature tests**, **HTTP tests**, or **browser-style
tests**) verify the application's behavior from the user's perspective by
simulating full HTTP requests and checking the resulting responses. These tests
cover aspects such as page loading, view rendering, component visibility, and
redirects. Avoid testing business logic in page tests; instead, keep those
checks in dedicated service, model, or controller tests.












## Testing Emails

```html +parse
<x-gt-alert type="info">
When testing email functionality, always call <code>Mail::fake()</code> at the start of
your test. This ensures that no real emails are sent during the test run.
</x-gt-alert>
```

### `sends email to ...`

```php +torchlight-php
it('sends email to ...', function () {
    // Arrange
    Mail::fake();
    $user = User::factory()->create();

    // Act
    $this->get(route('send-newsletter-email'));

    // Assert
    Mail::assertSent(NewsLetter::class);
});
```

## Troubleshooting

### Authentication Required for Protected Routes

When testing protected routes (like admin pages), you'll often encounter
authentication failures. The test below will fail because the route requires
authentication:

```php +torchlight-php
// This will fail - no authenticated user
it('displays the component on the page for authenticated users', function () {
    get(route('admin.courses.index'))
        ->assertSeeLivewire(AdminCourseTable::class);
});
```

To resolve this, you need to simulate an authenticated user in your test.

```php +torchlight-php
// This will pass - simulating an authenticated admin user
it('displays the component on the page for authenticated users', function () {
    loginAsAdmin();
    get(route('admin.courses.index'))
        ->assertSeeLivewire(AdminCourseTable::class);
});
```

## FAQ's

### <question>What is the difference between `assertSee` and `assertSeeText`?</question>

- `assertSee` **includes** HTML in the search.  
- `assertSeeText` **ignores** HTML and checks only plain text.
  
```php +torchlight-php
$response->assertSee('<h1>Heading</h1>'); // Passes
$response->assertSeeText('<h1>Heading</h1>'); // Fails
```

## Important Notes

When testing Livewire components, avoid using `assertSet()` for checking initial
values as it performs loose comparison or type coercion, which makes it
unreliable for testing exact initial values.

Instead, use `expect()` with `get()` to ensure strict type checking and precise
value assertions.