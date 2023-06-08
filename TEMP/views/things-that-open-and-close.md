# Snippets for Things That Open and Close

<div class="relative" x-data="{open:false}" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
    <div class="absolute mt-05 flex w-16 z-100" x-show="open" x-transition.duration style="display: none;">
        ...
    </div>
</div>


<span x-data="{open:false}" x-on:mouseenter="open=true" x-on:mouseleave="open=false">
    <x-gt-icon-info class="txt-blue" />
    <div class="absolute mt-05 flex maxw-400 z-100 bx info-light pxy-05 " x-show="open" x-transition.duration style="display: none;">
        ...
    </div>
</span>
