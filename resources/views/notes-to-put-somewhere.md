#### How can I remove all non-alphabetical characters from a string?

```js
const string = "Hello, 123 World!";
const cleanedString = string.replace(/[^a-z]/gi, '');
console.log(cleanedString); // Output: "HelloWorld"
```

/ /g match all


Remove the vendor directory and reinstall dependencies: Run the following commands to remove the existing vendor directory and reinstall the project's dependencies:

```bash
rm -rf vendor
composer install
```

```php
// Checks if the object or class has a property
property_exists($object_or_class, string $property): bool
```

#### How to count the sections in a php path?

```php
$path = "section1/section2";
$sections = explode("/", $path);
$num_sections = count($sections);
echo "Number of sections: " . $num_sections;
```

## Regex

| Regex Pattern | Description                                                          |
| ------------- | -------------------------------------------------------------------- |
| `^`           | Matches the start of a string.                                       |
| `$`           | Matches the end of a string.                                         |
| `.`           | Matches any single character except newline.                         |
| `\d`          | Matches any digit (0-9).                                             |
| `\D`          | Matches any non-digit character.                                     |
| `\w`          | Matches any word character (alphanumeric + underscore).              |
| `\W`          | Matches any non-word character.                                      |
| `\s`          | Matches any whitespace character (space, tab, newline).              |
| `\S`          | Matches any non-whitespace character.                                |
| `[abc]`       | Matches any character within the brackets (a, b, or c).              |
| `[^abc]`      | Matches any character NOT within the brackets.                       |
| `[a-z]`       | Matches any lowercase letter (a to z).                               |
| `[A-Z]`       | Matches any uppercase letter (A to Z).                               |
| `[0-9]`       | Matches any digit (0 to 9).                                          |
| `*`           | Matches zero or more occurrences of the previous pattern.            |
| `+`           | Matches one or more occurrences of the previous pattern.             |
| `?`           | Matches zero or one occurrence of the previous pattern.              |
| `{n}`         | Matches exactly n occurrences of the previous pattern.               |
| `{n,}`        | Matches n or more occurrences of the previous pattern.               |
| `{n,m}`       | Matches between n and m occurrences of the previous pattern.         |
| `(abc)`       | Groups patterns together.                                            |
| `\|`          | Acts as an OR operator, matches either pattern on its left or right. |
| `\`           | Escapes a special character to be treated as a literal.              |
