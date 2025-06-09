# Modal Component


## Base 

The base modal component handles the display logic, including configuring the
width, backdrop, and style. You can close the modal by pressing the escape key
or by adding a button to set the `showModal` property to `false`.

```html +parse
<livewire:gotime.components.modal variant="base"/>
```

## Variations

```html +parse
<livewire:gotime.components.modal variant="dialog"/>
```

----------


to

    {{--


    The modal's open / close state is determined by a `wire:model` property declared
    on the component. Typically, you will set this property to `true` when the user
    clicks some UI element

    <!-- <div class="bx info-light flex">
        <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#info"></use></svg>
        <div>You can have multiple modals </div>
    </div> -->

    <a id="markdown-modal-layouts" name="modal-layouts"></a>

    ## Modal Layouts
    There are several modal layouts you can use and by default all content not in
    named slots will be placed in the main `$slot` of the base modal layout.
    Available slots will depend on the layout as detailed below, and unless
    otherwise specified all slots are optional.

    <a id="markdown-base-modal" name="base-modal"></a>

    ### Base Modal
    ```html
    <x-gt-modal wire:model="showModal">
        Base modal layout with base box styling.
        Sets the max-width and positions the box on the screen.
    </x-gt-modal>
    ```

    <a id="markdown-dialog-modal" name="dialog-modal"></a>

    ### Dialog Modal
    ```html
    <x-gt-modal.dialog wire:model.live="showModal">

        <!-- accepts attributes -->
        <x-slot name="title"></x-slot>

        All other content appears here in the main slot!

        <!-- accepts attributes -->
        <x-slot name="footer"> </x-slot>

    </x-gt-modal.dialog>
    ```



    <a id="markdown-modal-attributes" name="modal-attributes"></a>

    ## Modal Attributes
        <x-modal.save wire:model.live="showModal" maxWidth="600px" class="danger">

    | Attribute  | Required | Description                                                       |
    | ---------- | :------: | ----------------------------------------------------------------- |
    | `maxWidth` |    no    | Minimum width including unit. Uses css min() function (max = 90%) |
    | `id`       |    no    | on screen help text                                               |


    <a id="markdown-toggle-button-example" name="toggle-button-example"></a>

    ## Toggle Button Example
    Add a button or element to uses as a toggle to set the modal display property = `true`. This can be achieved using the `$toggle` magic method or through the a Livewire function.

    ```html
    <!-- Directly toggle the respective Livewire property  -->
    <button wire:click="$toggle('showModal')">Toggle Modal</button>]
    ```

    <a id="markdown-trouble-shooting" name="trouble-shooting"></a>

    ## Trouble Shooting
    **Modal not displaying as expected** <br>
    Check the display property is bound to the modal component or entangle will fail. `wire:model.live="showModal"` --}}

</div>