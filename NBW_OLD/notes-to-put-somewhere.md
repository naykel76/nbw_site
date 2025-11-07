

## Creating a Vite project

```bash +torchlight-bash
npm create vite@latest
```

```bash +torchlight-bash
npm install -D autoprefixer nk_jtb postcss postcss-cli sass
```

# How to deal with decoded JSON

The difference is how you access the properties

```php +code
// array
$resultArray[$menu] = [
    'standalone' => $menuData['standalone_menu'] ?? false,
];

// object
$resultArray[$menu] = [
    'standalone' => $menuData->standalone_menu ?? false,
];
```

```php +code
// Fetch JSON and Decode to PHP associative array
$menus = getJsonFile(resource_path("navs/$this->filename.json"), true);
// Initialize an empty array to store the processed data.
$resultArray = [];

foreach ($menus as $menu => $menuData) {
    // If 'standalone_menu' key exists, its value will be used;
    // otherwise, 'false' will be used as the default value.
    $resultArray[$menu] = [
        'standalone' => isset($menuData['standalone_menu'])
            ? $menuData['standalone_menu']
            : false
    ];
}
```

```php +code
$filePath = resource_path("navs/{$filename}.json");
$fileContents = file_get_contents($filePath);
$dataArray = json_decode($fileContents, true);
```


All of these are considered empty (true)
```php +code
$var1 = "";         // true
$var2 = null;       // true
$var3 = [];         // true
$var4 = 0;          // true - 0 is considered empty
$var5 = false;      // true - false is considered empty
```



#### How can I remove all non-alphabetical characters from a string?

```js
const string = "Hello, 123 World!";
const cleanedString = string.replace(/[^a-z]/gi, '');
console.log(cleanedString); // Output: "HelloWorld"
```

/ /g match all


Remove the vendor directory and reinstall dependencies: Run the following commands to remove the existing vendor directory and reinstall the project's dependencies:

```bash +torchlight-bash
rm -rf vendor
composer install
```

```php +code
// Checks if the object or class has a property
property_exists($object_or_class, string $property): bool
```

#### How to count the sections in a php path?

```php +code
$path = "section1/section2";
$sections = explode("/", $path);
$num_sections = count($sections);
echo "Number of sections: " . $num_sections;
```

