# Ionic Date and Time Examples
<a id="markdown-ionic-date-and-time-examples" name="ionic-date-and-time-examples"></a>

<!-- TOC -->

- [Date in popover formatted with date-fns](#date-in-popover-formatted-with-date-fns)

<!-- /TOC -->



## Date in popover formatted with date-fns
<a id="markdown-date-in-popover-formatted-with-date-fns" name="date-in-popover-formatted-with-date-fns"></a>

Install the `date-fns` package

```bash
npm install date-fns --save
```

Then, import the `format` and `parseISO` modules from the `date-fns` package and create a function
to format the date as a string.

```js
// src/app/some.page.ts
import { format, parseISO } from 'date-fns';

export class SomePage {

   date: any;

    setDateAsString(value) {
        this.date = format(parseISO(value), 'dd/MM/yyyy');
    }
}
```

Note: In the html, pass the date value as a reference rather than using data binding because dates
are a pain in the a$$ and there is no useful documentation to tell me otherwise!

```html
<!-- src/app/some.page.html -->
<ion-item id="open-date-popover">
    <ion-icon name="calendar-outline" slot="start"></ion-icon>
    <ion-label>Reminder</ion-label>
    <ion-text slot="end">{{reminder}}</ion-text>
</ion-item>

<ion-popover trigger="open-date-popover" size="cover">
    <ng-template>
        <ion-datetime #date presentation="date" (ionChange)="setDateAsString(date.value)"
            [preferWheel]="true" [showDefaultButtons]="true" size="cover"></ion-datetime>
    </ng-template>
</ion-popover>
```
