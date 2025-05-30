# Date and Time Cheat Sheet

- [Date Format Conversion Table (Carbon, Pikaday, Flatpickr)](#date-format-conversion-table-carbon-pikaday-flatpickr)
- [Carbon](#carbon)
- [String Formatting](#string-formatting)
- [Set timezone](#set-timezone)
- [Carbon](#carbon-1)
    - [Set Date](#set-date)
- [FAQ's](#faqs)


Database Value: `1995-09-18 08:27:16`

- (un-cast) `$model->birthday` = '1995-09-18 08:27:16'; 
- (cast as DateCast) `$model->birthday` = 'Sep 18, 1995'; `('M d, Y')`
- (cast as datetime) `$model->birthday` = Carbon instance; 

## Date Format Conversion Table (Carbon, Pikaday, Flatpickr)

| Format        | Carbon   | Pikaday       | Flatpickr |
| ------------- | -------- | ------------- | --------- |
| 28-03-24      | `d-m-y`  | `DD-MM-YY`    | `d-m-y`   |
| 28-03-2024    | `d-m-Y`  | `DD-MM-YYYY`  | `d-m-Y`   |
| Mar, 28, 2024 | `M d, Y` | `MMM D, YYYY` | `m-d-Y`   |
| 18 Mar, 2024  | `d M, Y` | `D MMM, YYYY` | `d-m-Y`   |

<!-- | Year-Month-Day | `Y-m-d`       | `YYYY-MM-DD`       | `Y-m-d`     |
| Full Date Time | `Y-m-d H:i:s` | `YYYY-MM-DD H:i:s` | `Y-m-d H:i` |
| 24-Hour Time   | `H:i`         | `HH:mm`            | `H:i`       | -->

## Carbon

Create a new instance of Carbon from a string or a timestamp.

```php
Carbon::create(2012, 1, 31, 0)            // 2012-01-31 00:00:00
Carbon::createFromDate(2012, 1, 31)       // 2012-01-31 22:43:06
Carbon::createFromTime(14, 15, 16)        // 2025-02-11 14:15:16
Carbon::createFromTimeString('14:15:16')  // 2025-02-11 14:15:16
Carbon::createFromTimestamp(650937976)    // 1990-08-18 00:06:16
Carbon::createFromTimestampUTC(650937976) // 1990-08-18 00:06:16
Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')           // 1975-05-21 22:00:00
Carbon::createFromFormat('Y-m-d', '1975-05-21')                // 1975-05-21 22:43:06
Carbon::createFromFormat('Y-m-d H:i:s', '1975-05-21 22:15:16') // 1975-05-21 22:15:16
```


## String Formatting

https://carbon.nesbot.com/docs/#api-formatting

```php
$dt->toDateString();                          // 1975-12-25
$dt->toTimeString();                          // 14:15:16
$dt->toDateTimeString();                      // 1975-12-25 14:15:16
```

<!-- You can also set the default __toString() format (which defaults to Y-m-d H:i:s) thats used when type juggling occurs.

$dt = Carbon::createFromFormat('Y-m-d H:i:s.u', '2019-02-01 03:45:27.612584'); -->


## Set timezone

Option 1

Edit the `config/app.php` and set the `timezone` value from UTC to the desired timezone from the
list of available timezones.

```php
'timezone' => 'Australia/Brisbane',
```


## Carbon


### Set Date
```php
$current = Carbon::now();
$today = Carbon::today();
$yesterday = Carbon::yesterday();
$tomorrow = Carbon::tomorrow();

Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);
Carbon::create(2012, 1, 31, 0);

// add 30 days to the current time
$trialExpires = $current->addDays(30);
```

    echo $dt->addYear(); 	2012-01-31 00:00:00
    echo $dt->addYears(5); 	2017-01-31 00:00:00
    echo $dt->subYear(); 	2011-01-31 00:00:00
    echo $dt->subYears(5); 	2007-01-31 00:00:00

    Modifying the date with addMonths() and subMonths() will result in the following:
    Command 	Output
    echo $dt->addMonth(); 	2012-03-03 00:00:00
    echo $dt->addMonths(60); 	2017-01-31 00:00:00
    echo $dt->subMonth(); 	2011-12-31 00:00:00
    echo $dt->subMonths(60); 	2007-01-31 00:00:00

    Take note of how adding one month to “January 31” resulted in “March 3” instead of “February 28”. If you prefer to not have that rollover, you can use addMonthWithoutOverflow().

    Modifying the date with addDays() and subDays() will result in the following:
    Command 	Output
    echo $dt->addDay(); 	2012-02-01 00:00:00
    echo $dt->addDays(29); 	2012-02-29 00:00:00
    echo $dt->subDay(); 	2012-01-30 00:00:00
    echo $dt->subDays(29); 	2012-01-02 00:00:00

    Modifying the date with addWeekdays() and subWeekdays() will result in the following:
    Command 	Output
    echo $dt->addWeekday(); 	2012-02-01 00:00:00
    echo $dt->addWeekdays(4); 	2012-02-06 00:00:00
    echo $dt->subWeekday(); 	2012-01-30 00:00:00
    echo $dt->subWeekdays(4); 	2012-01-25 00:00:00

    Modifying the date with addWeeks() and subWeeks() will result in the following:
    Command 	Output
    echo $dt->addWeek(); 	2012-02-07 00:00:00
    echo $dt->addWeeks(3); 	2012-02-21 00:00:00
    echo $dt->subWeek(); 	2012-01-24 00:00:00
    echo $dt->subWeeks(3); 	2012-01-10 00:00:00

    Modifying the date with addHours() and subHours() will result in the following:
    Command 	Output
    echo $dt->addHour(); 	2012-01-31 01:00:00
    echo $dt->addHours(24); 	2012-02-01 00:00:00
    echo $dt->subHour(); 	2012-01-30 23:00:00
    echo $dt->subHours(24); 	2012-01-30 00:00:00

    Modifying the date with addMinutes() and subMinutes() will result in the following:
    Command 	Output
    echo $dt->addMinute(); 	2012-01-31 00:01:00
    echo $dt->addMinutes(61); 	2012-01-31 01:01:00
    echo $dt->subMinute(); 	2012-01-30 23:59:00
    echo $dt->subMinutes(61); 	2012-01-30 22:59:00

    Modifying the date with addSeconds() and subSeconds() will result in the following:
    Command 	Output
    echo $dt->addSecond(); 	2012-01-31 00:00:01
    echo $dt->addSeconds(61); 	2012-01-31 00:01:01
    echo $dt->subSecond(); 	2012-01-30 23:59:59
    echo $dt->subSeconds(61); 	2012-01-30 23:58:59

    Using Carbon’s add and subtract tools can provide you with adjusted date and times.
    Using Getters and Setters

    Another way to read or manipulate the time is to use Carbon’s getters and setters.



## FAQ's

<question>Are dates retrieved from the database automatically cast to Carbon instances, or
do they require manual casting?</question>

If you use timestamps like `created_at` and `updated_at`, Laravel will automatically cast
them to Carbon instances for you. However, for other date fields, you need to specify the
cast manually.