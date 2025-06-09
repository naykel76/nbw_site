# CSS Frequently Asked Questions

<question>How can I get flex children to take up the height when there is not enough content?</question>


<!-- <style>
    .container {
    display: flex;                  /* Enable flexbox */
    flex-direction: column;        /* Stack children vertically */
    min-height: 100vh;             /* Minimum height to fill the viewport */
    overflow: auto;                /* Allows scrolling if content exceeds height */
    background: #f0f0f0;           /* Background color */
}

.child {
    flex-grow: 1;                  /* Allow children to grow */
    border: 1px solid #ccc;       /* Just for visual reference */
    padding: 10px;                /* Some padding */
}
</style> -->

```html +parse
<div class="flex h-24 gap">
    <aside class="pink minw-20">

    </aside>
    <div class="pink w-full">
    </div>
</div>
```


```html +parse
<div class="flex h-24 gap">
    <aside class="pink minw-20">

    </aside>
    <div class="pink w-full">
    </div>
</div>
```