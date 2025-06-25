# Sidebar Component

## Base 

The base sidebar component handles the display logic, including configuring the
width, backdrop, and style. You can close the sidebar by pressing the escape key
or by adding a button to set the `open` property to `false`.

```html +parse
<x-gt-sidebar>
 content
</x-gt-sidebar>
```

<x-gt-sidebar>
    <x-slot name="toggle">
        <button type="button" class="btn" x-on:click="open = true">Open</button>
    </x-slot>
</x-gt-sidebar>


Description: Place the sidebar with buttons to open and close it in your layout, and it will handle the rest.


how do i define the button to open the sidebar?
how do i open the sidebar with a separate button

## Slots

The base layout has three slots

<x-gt-markdown class="-ml-2">
    @verbatim
    ```
    <x-gt-sidebar>
        <!-- required -->
        <x-slot name="toggle">
            <button type="button" class="btn" x-on:click="open = true">Open</button>
        </x-slot>
        <!-- omit for default header -->
        <x-slot name="header"> ... </x-slot>
        <!-- main slot -->
        <div> ... </div>
        <!-- optional -->
        <x-slot name="footer"> ... </x-slot>
    </x-gt-sidebar>
    @endverbatim
</x-gt-markdown>

