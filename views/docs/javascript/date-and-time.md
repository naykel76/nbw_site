# Javascript Date

<!-- TOC -->

- [Date object](#date-object)
- [Get the system date as a string](#get-the-system-date-as-a-string)
- [Get the current UTC time](#get-the-current-utc-time)
- [Convert timestamp to human readable date or time](#convert-timestamp-to-human-readable-date-or-time)

<!-- /TOC -->

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date

<a id="markdown-date-object" name="date-object"></a>

## Date object

The Javascript `Date()` returns a `date` object where the date and time retrieved are obtained
from the user's local system. When no parameters are provided, the newly-created Date object
represents the current date and time.

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/Date#syntax


```js
new Date({ null | value | dateString | dateObject })
new Date(year, monthIndex, day, hours, minutes, seconds, milliseconds)
```

```js
const systemDateObject = new Date();
// Date Fri Jun 09 2023 13:51:34 GMT+1000 (Australian Eastern Standard Time)
```

<a id="markdown-get-the-system-date-as-a-string" name="get-the-system-date-as-a-string"></a>

## Get the system date as a string

To get the string representation of the date you can call the the `Date()` function (without the
`new` keyword) or use the `new Date().toString()` method.

**NOTE:** Both the `Date()` and `new Date().toString()` will return the date and time value that
looks similar to the `new Date()` object. Be assured they are not the same, they are string
representations!

```js
const systemDateAsString = Date(); // string
// Fri Jun 09 2023 13:51:34 GMT+1000 (Australian Eastern Standard Time)
const systemDateObjectToString = new Date().toString(); //string
// Fri Jun 09 2023 13:51:34 GMT+1000 (Australian Eastern Standard Time)
```

<a id="markdown-get-the-current-utc-time" name="get-the-current-utc-time"></a>

## Get the current UTC time

The JavaScript `Date.now()` function returns a `timestamp` that is based on `UTC` Time and is
independent of the time zone of the user or the device executing the code.

<div class="bx info"><strong><code>Date.now()</code> is not affected</strong> by the local time or device running the JavaScript code.</div>

To convert the value returned by `Date.now()` into a human-readable date and time, you can use the
`Date()` object, and adjust it according to the desired time zone if necessary.

```js
const utcTimestamp = Date.now();
// Output UTC timestamp: 1686256888210
```

**NOTE:** even though the timestamp is based on the `UTC` time, When converting the timestamp to a
human readable format, the conversion is based on local time zone of the environment where the
JavaScript code is executed.


```js
const utcFromTimestamp = Date(utcTimestamp);
// Output: Fri Jun 09 2023 16:44:57 GMT+1000
```


The console.log statement is implicitly converting the Date object to a string using its default
toString() method. This default conversion displays the date and time in the local time zone of
the environment where the JavaScript code is executed.

If you want to display the utcFromTimestamp in UTC, you can use the toISOString() method, which
returns a string representation of the Date object in UTC format. Here's an updated version of
your code:

<a id="markdown-convert-timestamp-to-human-readable-date-or-time" name="convert-timestamp-to-human-readable-date-or-time"></a>

## Convert timestamp to human readable date or time

To convert a `timestamp` to human readable data you can ues the `Date` getter methods

First, convert the `timestamp` to a `Date` object, the add the selected method.

```js
const timestamp = 1686256888210;
const dateObject = new Date(timestamp);

dateObject.getDate()
dateObject.getDay()
dateObject.getFullYear()
dateObject.getHours()
dateObject.getMilliseconds()
dateObject.getMinutes()
dateObject.getMonth()
dateObject.getSeconds()
dateObject.getTime()
dateObject.getTimezoneOffset()
dateObject.getUTCDate()
dateObject.getUTCDay()
dateObject.getUTCFullYear()
dateObject.getUTCHours()
```
You can interact with the timestamp value directly using `getter` and `setter` methods.




<!-- code for testing -->
<script>

    const systemDateObject = new Date();
    console.log(systemDateObject);
    // Date Sat Jun 10 2023 05:41:28 GMT+1000 (Australian Eastern Standard Time)

    const systemDateObjectToString = new Date().toString(); //string
    console.log(systemDateObjectToString);
    // Sat Jun 10 2023 05:41:28 GMT+1000 (Australian Eastern Standard Time)

    const systemDateAsString = Date(); //string
    console.log(systemDateAsString);
    // Sat Jun 10 2023 05:41:28 GMT+1000 (Australian Eastern Standard Time)

    const utcTimestamp = Date.now();
    console.log(utcTimestamp);
    // 1686338928412

    const localFromTimestamp = new Date(1686339688229);
    console.log(localFromTimestamp);
    // Date Sat Jun 10 2023 05:41:28 GMT+1000 (Australian Eastern Standard Time)

    const utcString = localFromTimestamp.toISOString();
    console.log(utcString);
    // 2023-06-09T19:41:28.229Z

    const timestamp = 1686256888210;
    const dateObject = new Date(timestamp);

</script>
