# Date and Time Cheat Sheet

- [Date Format Conversion Table (Carbon, Pikaday, Flatpickr)](#date-format-conversion-table-carbon-pikaday-flatpickr)
- [Carbon](#carbon)
    - [Set Date](#set-date)
- [String Formatting](#string-formatting)
- [Set timezone](#set-timezone)
- [Additional Resources](#additional-resources)


<!-- Where do I convert date formats in Laravel? -->

<!-- Is it better to work with carbon instances or strings? -->

<!-- Displaying Dates in Blade -->

<!-- {{ $event->start_date->format('d/m/Y') }}
{{ $user->created_at->diffForHumans() }}
{{ $post->published_at->isToday() ? 'Published today' : 'Not today' }} -->

## Date Format Conversion Table (Carbon, Pikaday, Flatpickr)

| Output Example | Carbon   | Pikaday       | Flatpickr |
| -------------- | -------- | ------------- | --------- |
| 28-03-24       | `d-m-y`  | `DD-MM-YY`    | `d-m-y`   |
| 28-03-2024     | `d-m-Y`  | `DD-MM-YYYY`  | `d-m-Y`   |
| Mar, 28, 2024  | `M d, Y` | `MMM D, YYYY` | `m-d-Y`   |
| 18 Mar, 2024   | `d M, Y` | `D MMM, YYYY` | `d-m-Y`   |
| 18 March       | `d F`    |               |           |

| Output Example | Format  | Description                          |
| -------------- | ------- | ------------------------------------ |
| 2:05 PM        | `g:i A` | 12-hour, no leading 0, AM/PM (caps)  |
| 2:05 pm`       | `g:i a` | 12-hour, no leading 0, am/pm (lower) |

To remove the space between the time and the AM/PM, you simple add a space
before the `A` or `a` in the format string:

```php +torchlight-php
$time = $carbon->format('g:i a'); // 2:05 pm
$time = $carbon->format('g:ia'); // 2:05pm
```


<!-- |                |         |                                      |
| 02:05 PM`      | `h:i A` | 12-hour, leading 0, AM/PM (caps)     |
| 02:05 pm`      | `h:i a` | 12-hour, leading 0, am/pm (lower)    |
| 14:05`         | `H:i`   | 24-hour, leading 0                   |
| 14:05`         | `G:i`   | 24-hour, no leading 0 (rarely used)  |
| 05`            | `i`     | Minutes only                         |
| 05`            | `s`     | Seconds only                         |
| pm`            | `a`     | am/pm in lowercase                   |
| PM`            | `A`     | AM/PM in uppercase                   |
| 28`            | `d`     | Day of the month (01-31)             |
| Thu`           | `D`     | Short day of the week (3 letters)    |
| 28`            | `j`     | Day of the month without leading     | -->

## Carbon

### Set Date
```php +torchlight-php
$current = Carbon::now();
$today = Carbon::today();
$yesterday = Carbon::yesterday();
$tomorrow = Carbon::tomorrow();

Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);
Carbon::create(2012, 1, 31, 0);

$trialExpires = $current->addDays(30);

$day = $carbon->day;       // day as integer (1–31)
$month = $carbon->month;   // month as integer (1–12)
$year = $carbon->year;     // full year (e.g., 2025)
```


## String Formatting

https://carbon.nesbot.com/docs/#api-formatting

```php +torchlight-php
$dt->toDateString();                          // 1975-12-25
$dt->toTimeString();                          // 14:15:16
$dt->toDateTimeString();                      // 1975-12-25 14:15:16
```

## Set timezone

Option 1

Edit the `config/app.php` and set the `timezone` value from UTC to the desired timezone from the
list of available timezones.

```php +torchlight-php
'timezone' => 'Australia/Brisbane',
```




## Additional Resources

<a href="https://carbon.nesbot.com/docs/" target="blank">Carbon Docs</a>