# Javascript Date

<!-- TOC -->

- [Date object](#date-object)
- [Get the system date as a string](#get-the-system-date-as-a-string)
- [Getting the current time](#getting-the-current-time)

<!-- /TOC -->

<a id="markdown-date-object" name="date-object"></a>

## Date object

The Javascript `Date()` returns a `date` object where the date and time retrieved are obtained
from the user's local system. When no parameters are provided, the newly-created Date object
represents the current date and time.

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/Date#syntax


```js
new Date({ null | value | dateString | dateObject })
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


<!-- for testing -->
<script>

    const systemDateObject = new Date();
    console.log(systemDateObject);
    // Date Fri Jun 09 2023 08:30:32 GMT-0930 (Marquesas Time)

    const systemDateObjectToString = new Date().toString(); //string
    console.log(systemDateObjectToString);
    // Fri Jun 09 2023 08:33:00 GMT-0930 (Marquesas Time)

    const systemDateAsString = Date(); //string
    console.log(systemDateAsString);
    // Fri Jun 09 2023 08:33:00 GMT-0930 (Marquesas Time)

    // const dateGetTime = new Date().getTime(); // Output: 1686256888210
    // console.log('dateGetTime:_____ ' + dateGetTime);

    // const utcTimestamp = Date.now(); // Output: 1686256888210
    // console.log('utcTimestamp: ' + utcTimestamp);

    // const localFromTimestamp = new Date(utcTimestamp);
    // console.log('localFromTimestamp (local time zone): ' + localFromTimestamp);

    // const utcString = localFromTimestamp.toISOString();
    // console.log('utcFromTimestamp (UTC): ' + utcString);

</script>

<a id="markdown-getting-the-current-time" name="getting-the-current-time"></a>

## Getting the current time

The JavaScript `Date.now()` function returns a `timestamp` that is based on `UTC` Time and is
independent of the time zone of the user or the device executing the code.

<div class="bx info-light"><strong><code>Date.now()</code> is not affected</strong> by the local time or device running the JavaScript code.</div>

To convert the value returned by `Date.now()` into a human-readable date and time, you can use the
`Date()` object, and adjust it according to the desired time zone if necessary.

```js
const utcTimestamp = Date.now();                // Output: 1686256888210
// conversion is based on local time zone of the environment where the JavaScript code is executed.
const utcFromTimestamp = Date(utcTimestamp);    // Output: Fri Jun 09 2023 16:44:57 GMT+1000
// to make sure you get the UTC date time
```


The console.log statement is implicitly converting the Date object to a string using its default
toString() method. This default conversion displays the date and time in the local time zone of
the environment where the JavaScript code is executed.

If you want to display the utcFromTimestamp in UTC, you can use the toISOString() method, which
returns a string representation of the Date object in UTC format. Here's an updated version of
your code:




?? All static methods (`Date.now()`, `Date.parse()`, and `Date.UTC()`) return timestamps instead of Date objects.

?? You can interact with the timestamp value directly using the `getTime()` and `setTime()` methods.



    // console.log('localFromTimestamp (local time zone): ' + localFromTimestamp);
    // console.log('utcFromTimestamp (UTC): ' + utcString);

    // const utcString = utcFromTimestamp.toISOString();
    // console.log('utcFromTimestamp (UTC): ' + utcString);


    // const fish = Date(utcTimestamp);
    // const aa = fish.toISOString();

    // console.log(aa);

    // const diff = this.start - current;
    // this.remaining = parseInt(diff / 1000);
