# File Input

## Default File Input

<input name="file" type="file">

    <input name="file" type="file">

## Make it Fancy


Add the `.file` class to any parent element for a styled styled file upload button. The native file input is hidden from view by setting `opacity: 0;` with absolute positioning allowing the the label to sit on top becoming the interactive and clickable part of the element.

<div class="file btn">
    <label>
        <input type="file" name="file">
            <svg class="icon">
                <use xlink:href="/svg/naykel-ui.svg#download"></use>
            </svg>
            <span>Choose a file…</span>
    </label>
</div>

    <div class="file btn">
        <label>
            <input type="file" name="file">
                <svg class="icon">
                    <use xlink:href="/svg/naykel-ui.svg#download"></use>
                </svg>
                <span>Choose a file…</span>
        </label>
    </div>


## Styles

Color theme work the same as buttons.

<div class="file btn primary">
    <label>
        <input type="file" name="file">
            <svg class="icon">
                <use xlink:href="/svg/naykel-ui.svg#download"></use>
            </svg>
            <span>Choose a file…</span>
    </label>
</div>

    <div class="file btn primary">
        <label>
            <input type="file" name="file">
                <svg class="icon">
                    <use xlink:href="/svg/naykel-ui.svg#download"></use>
                </svg>
                <span>Choose a file…</span>
        </label>
    </div>

