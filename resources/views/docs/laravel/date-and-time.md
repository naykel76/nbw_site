# Date and Time Cheat Sheet

<!-- TOC -->

- [Set timezone](#set-timezone)
- [Carbon](#carbon)
    - [Set Date](#set-date)

<!-- /TOC -->

<a id="markdown-set-timezone" name="set-timezone"></a>

## Set timezone

Option 1

Edit the `config/app.php` and set the `timezone` value from UTC to the desired timezone from the
list of available timezones.

```php
'timezone' => 'Australia/Brisbane',
```

<a id="markdown-carbon" name="carbon"></a>

## Carbon

<a id="markdown-set-date" name="set-date"></a>

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



