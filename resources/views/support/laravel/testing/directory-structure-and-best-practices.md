
# Testing Directory Structure and Best Practices

A good strategy is to mirror the Laravel directory structure, grouping tests by
functionality (e.g. Livewire components, models, pages). This helps maintain
clarity and makes it easier to find tests related to specific features.

```bash +torchlight-bash
tests/
├── Feature/
│   ├── Auth/
│   ├── Checkout/
│   ├── Http/
│   │   └── Controllers/
│   │   │   ├── CourseControllerTest.php
│   │   │   └── ShowHomePageControllerTest.php
│   ├── Livewire/                     
│   │   ├── CartSummaryTest.php
│   │   └── CourseManagerTest.php
│   ├── Models/                       
│   │   ├── CourseTest.php
│   ├── Pages/                        
│   │   ├── HomePageTest.php
│   │   ├── CourseIndexPageTest.php
│   │   └── CourseShowPageTest.php 
└── Unit/
    ├── Helpers/
    └── Services/
```

use resource naming convention

### Page vs View vs Controller Tests

Sometimes there can be confusion about the differences between page tests, view
tests, and controller tests. Here’s a breakdown:

- **Page Tests** (Feature Tests): These simulate a user interacting with the
  application through the browser. They check the HTTP response, the rendered
  view, and the data passed to the view. Page tests are concerned with the
  overall user experience.

- **View Tests**: These focus specifically on the Blade views. They ensure that
  the correct data is passed to the view and that the view renders the expected
  content. View tests are more granular and do not involve HTTP requests.

- **Controller Tests**: These test the controller methods directly, without
  going through the HTTP layer. They are useful for testing the business logic
  within the controller and ensuring that the correct responses are returned.

## Best Practices

### Avoiding Confusion and Redundancy

When writing tests, it’s easy to blur the lines between different test types.

You don’t need a separate file for every case. Related tests often belong in the
same file. For example, to test the home page for:

* Successful load
* Correct content
* HTTP 200 response
* Correct view
* Expected data passed

You might consider separate files like:

* `tests/Feature/Controllers/ShowHomePageControllerTest.php`
* `tests/Feature/Pages/HomePageTest.php`
* `tests/Feature/Pages/PageResponsesTest.php`

But since these are all basic and related, they should be consolidated into a
single file like: `tests/Feature/Pages/HomePageTest.php`