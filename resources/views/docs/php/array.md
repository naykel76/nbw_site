# PHP Arrays

<!-- TOC -->

- [Add item to an array](#add-item-to-an-array)
- [Removing item from an array](#removing-item-from-an-array)
- [Compare the values of two php arrays to identify differences? `array_diff`](#compare-the-values-of-two-php-arrays-to-identify-differences-array_diff)
- [Reindex array key after unset key? `array_values`](#reindex-array-key-after-unset-key-array_values)
- [Other Array Methods](#other-array-methods)
- [Existence](#existence)
    - [Check if value exists in an array `in_array`](#check-if-value-exists-in-an-array-in_array)
    - [Check if the given key exists in an array `array_key_exists` or `key_exists`](#check-if-the-given-key-exists-in-an-array-array_key_exists-or-key_exists)
- [Validation Techniques](#validation-techniques)

<!-- /TOC -->
<a href="https://www.php.net/manual/en/ref.array.php" target="blank">PHP Array Functions</a>


<a id="markdown-add-item-to-an-array" name="add-item-to-an-array"></a>

## Add item to an array

```php
array_push(array &$array, mixed ...$values): int
```

<a id="markdown-removing-item-from-an-array" name="removing-item-from-an-array"></a>

## Removing item from an array

```php
array_pop(array &$array): mixed
```






<a id="markdown-compare-the-values-of-two-php-arrays-to-identify-differences-arraydiff" name="compare-the-values-of-two-php-arrays-to-identify-differences-arraydiff"></a>

## Compare the values of two php arrays to identify differences? `array_diff`

```php
$array1 = ['a', 'b', 'c', 'd'];
$array2 = ['b', 'd', 'e', 'f'];

// Get the values that are present in $array1 but not in $array2
$difference1 = array_diff($array1, $array2);

var_dump($difference1);

// array(2) { [0]=> string(1) "a" [2]=> string(1) "c" }
```

This method only looks for the values, if you want to check for keys as well (key AND value exists) you need to use `array_diff_assoc()`


<a id="markdown-reindex-array-key-after-unset-key-arrayvalues" name="reindex-array-key-after-unset-key-arrayvalues"></a>

## Reindex array key after unset key? `array_values`

```php
$myArray = array_values($myArray);
```

How does this work?

`array_values()` returns all the values from the array indexed numerically.


<a id="markdown-other-array-methods" name="other-array-methods"></a>

## Other Array Methods

```php
$keys = array_keys()
$merged = array_merge()
```



<a id="markdown-existence" name="existence"></a>

## Existence


<a id="markdown-check-if-value-exists-in-an-array-inarray" name="check-if-value-exists-in-an-array-inarray"></a>

### Check if value exists in an array `in_array`

 ```php
 in_array(mixed $needle, array $haystack, bool $strict = false): bool
 ```

```php
$currentRoutePrefix = 'category-1';
$routePrefixes = ['category-1', 'category-2', 'category-1/sub-category-1'];

if (in_array($currentRoutePrefix, $routePrefixes)) {
   return 'validation failed, route already exists';
}
```


<a id="markdown-check-if-the-given-key-exists-in-an-array-arraykeyexists-or-keyexists" name="check-if-the-given-key-exists-in-an-array-arraykeyexists-or-keyexists"></a>

### Check if the given key exists in an array `array_key_exists` or `key_exists`

 ```php
 array_key_exists(string|int $key, array $array): bool
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
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->








<a id="markdown-validation-techniques" name="validation-techniques"></a>

## Validation Techniques


<a id="markdown-check-if-key-exists-in-an-associative-array" name="check-if-key-exists-in-an-associative-array"></a>

##### Check if Key Exists in an Associative Array

    $cart = [
        'ITEM_01' => ['qty' => 4, 'price' => 2600, 'name' => 'Green Fish'],
        'ITEM_02' => ['qty' => 1, 'price' => 1700, 'name' => 'Yellow Otter'],
        'ITEM_03' => ['qty' => 3, 'price' => 4534, 'name' => 'Purple Pig']
    ];

    if (array_key_exists('ITEM_01', $cart)) {
        print_r('The key exists'); // returns true
    }


<a id="markdown-check-if-key-exists-in-a-multidimensional-associative-array" name="check-if-key-exists-in-a-multidimensional-associative-array"></a>

##### Check if Key Exists in a Multidimensional, Associative Array

    $cart = [
        'items' => [
            'ITEM_01' => ['qty' => 4, 'price' => 2600, 'name' => 'Green Fish'],
            'ITEM_02' => ['qty' => 1, 'price' => 1700, 'name' => 'Yellow Otter'],
            'ITEM_03' => ['qty' => 3, 'price' => 4534, 'name' => 'Purple Pig']
        ],
        'totalItems' => 8,
        'totalPrice' => 189000
    ];

    if (array_key_exists('ITEM_01', $cart['items'])) {
        print_r('The key exists'); // returns true
    }



See also is_array(), explode(), implode(), preg_split(), and unset().
Table of Contents ¶

- array_change_key_case — Changes the case of all keys in an array
- array_chunk — Split an array into chunks
- array_column — Return the values from a single column in the input array
- array_combine — Creates an array by using one array for keys and another for its values
- array_count_values — Counts all the values of an array
- array_diff_assoc — Computes the difference of arrays with additional index check
- array_diff_key — Computes the difference of arrays using keys for comparison
- array_diff_uassoc — Computes the difference of arrays with additional index check which is performed by a user supplied callback function
- array_diff_ukey — Computes the difference of arrays using a callback function on the keys for comparison
- array_diff — Computes the difference of arrays
- array_fill_keys — Fill an array with values, specifying keys
- array_fill — Fill an array with values
- array_filter — Filters elements of an array using a callback function
- array_flip — Exchanges all keys with their associated values in an array
- array_intersect_assoc — Computes the intersection of arrays with additional index check
- array_intersect_key — Computes the intersection of arrays using keys for comparison
- array_intersect_uassoc — Computes the intersection of arrays with additional index check, compares indexes by a callback function
- array_intersect_ukey — Computes the intersection of arrays using a callback function on the keys for comparison
- array_intersect — Computes the intersection of arrays
- array_is_list — Checks whether a given array is a list

- array_key_first — Gets the first key of an array
- array_key_last — Gets the last key of an array
- array_keys — Return all the keys or a subset of the keys of an array
- array_map — Applies the callback to the elements of the given arrays
- array_merge_recursive — Merge one or more arrays recursively
- array_merge — Merge one or more arrays
- array_multisort — Sort multiple or multi-dimensional arrays
- array_pad — Pad array to the specified length with a value
- array_product — Calculate the product of values in an array
- array_rand — Pick one or more random keys out of an array
- array_reduce — Iteratively reduce the array to a single value using a callback function
- array_replace_recursive — Replaces elements from passed arrays into the first array recursively
- array_replace — Replaces elements from passed arrays into the first array
- array_reverse — Return an array with elements in reverse order
- array_search — Searches the array for a given value and returns the first corresponding key if successful
- array_shift — Shift an element off the beginning of array
- array_slice — Extract a slice of the array
- array_splice — Remove a portion of the array and replace it with something else
- array_sum — Calculate the sum of values in an array
- array_udiff_assoc — Computes the difference of arrays with additional index check, compares data by a callback function
- array_udiff_uassoc — Computes the difference of arrays with additional index check, compares data and indexes by a callback function
- array_udiff — Computes the difference of arrays by using a callback function for data comparison
- array_uintersect_assoc — Computes the intersection of arrays with additional index check, compares data by a callback function
array_uintersect_uassoc — Computes the intersection of arrays with additional index check, compares data and indexes by separate callback - functions
- array_uintersect — Computes the intersection of arrays, compares data by a callback function
- array_unique — Removes duplicate values from an array
- array_unshift — Prepend one or more elements to the beginning of an array

- array_walk_recursive — Apply a user function recursively to every member of an array
- array_walk — Apply a user supplied function to every member of an array
- array — Create an array
- arsort — Sort an array in descending order and maintain index association
- asort — Sort an array in ascending order and maintain index association
- compact — Create array containing variables and their values
- count — Counts all elements in an array or in a Countable object
- current — Return the current element in an array
- each — Return the current key and value pair from an array and advance the array cursor
- end — Set the internal pointer of an array to its last element
- extract — Import variables into the current symbol table from an array


- key — Fetch a key from an array
- krsort — Sort an array by key in descending order
- ksort — Sort an array by key in ascending order
- list — Assign variables as if they were an array
- natcasesort — Sort an array using a case insensitive "natural order" algorithm
- natsort — Sort an array using a "natural order" algorithm
- next — Advance the internal pointer of an array
- pos — Alias of current
- prev — Rewind the internal array pointer
- range — Create an array containing a range of elements
- reset — Set the internal pointer of an array to its first element
- rsort — Sort an array in descending order
- shuffle — Shuffle an array
- sizeof — Alias of count
- sort — Sort an array in ascending order
- uasort — Sort an array with a user-defined comparison function and maintain index association
- uksort — Sort an array by keys using a user-defined comparison function
- usort — Sort an array by values using a user-defined comparison function

