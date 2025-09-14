<h1>Icons</h1>

<x-toc></x-toc>

<p>Gotime icons are based on the <a href="https://heroicons.com" target="_blank">heroicons</a> built by the creators of
    tailwind.</p>
<div class="bx info-light bdr-3 rounded-1 flex va-c">
    <svg class="icon wh-4 fs0 mr-2">
        <use xlink:href="/svg/naykel-ui.svg#information-circle"></use>
    </svg>
    <div class="txt-xl fw7">Note, this is a class based component.</div>
</div>

<x-docs.sections.layout title="Introduction">

    <p>The <code>icon</code> component is a class-based component with two main attributes:</p>

    <ol>
        <li><code>name</code>: This attribute corresponds to the filename of the icon to be displayed. E.g.
            <code>cart</code>, <code>user</code>, <code>credit-card</code> etc.
        </li>
        <li><code>type</code>: This attribute determines the directory where the icon is located. By default, it is set
            to <code>outline</code>.</li>
    </ol>

    <p>Consider the <code>type</code> as the folder name, as it guides the component to the correct directory. If you're
        using the <code>outline</code> icons, you can omit the type attribute since
        <code>outline</code> is the default
        setting. The icon component will search for the specified icon within the directory indicated by the
        <code>type</code> attribute.
    </p>

    <x-mermaid>
        classDiagram
        class Icon {
        -name: String
        -type: String
        +construct(name: String, type: String)
        +render()
        }
    </x-mermaid>

</x-docs.sections.layout>


<x-docs.sections.layout title="Usage">

    <p>To use the icon component, you need to invoke it and assign the desired icon's filename to the <code>name</code>
        attribute.</p>
    <p>The UI icons reside in two main folders: solid and outline. Unless specified otherwise by the type attribute, the
        icon component will look in the outline folder by default.</p>

    <div>
        <x-gt-icon name="shopping-cart" />
        <x-gt-icon name="shopping-cart" type="solid" />
        <x-gt-icon name="shopping-cart" class="txt-orange" />
    </div>

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-icon name="shopping-cart" />
            <x-gt-icon name="shopping-cart" type="solid" />
            <x-gt-icon name="shopping-cart" class="txt-orange" />
        @endverbatim
    </x-gt-markdown>

    <p>You can change the default type in the config file by setting the <code>component.icon.type</code>.</p>

</x-docs.sections.layout>

<x-docs.sections.layout title="Solid Icons">

    @php
        $root = base_path('vendor/naykel/gotime/resources/views/components/v2/icon/solid');
        $filesInFolder = \File::files("$root");
    @endphp

    <div class="grid cols-3">

        @foreach ($filesInFolder as $path)
            @php
                $iconFileName = basename($path, '.blade.php');
            @endphp

            <div class="flex va-c">
                <x-gt-icon name="{{ $iconFileName }}" style="solid" />
                <span class="ml-075">{{ $iconFileName }}</span>
            </div>
        @endforeach
    </div>

</x-docs.sections.layout>

<x-docs.sections.layout title="Outline Icons">

    @php
        $root = base_path('vendor/naykel/gotime/resources/views/components/v2/icon/outline');
        $filesInFolder = \File::files("$root");
    @endphp

    <div class="grid cols-3">

        @foreach ($filesInFolder as $path)
            @php
                $iconFileName = basename($path, '.blade.php');
            @endphp

            <div class="flex va-c">
                <x-gt-icon name="{{ $iconFileName }}" />
                <span class="ml-075">{{ $iconFileName }}</span>
            </div>
        @endforeach
    </div>

</x-docs.sections.layout>

{{-- <x-docs.sections.layout title="Payment Platform Icons">

    @php
        $root = base_path('vendor/naykel/gotime/resources/views/components/v2/icon/payment');
        $filesInFolder = \File::files("$root");
    @endphp

    <div class="grid cols-2 mt-2">

        @foreach ($filesInFolder as $path)
            @php
                $iconFileName = basename($path, '.blade.php');
            @endphp

            <div class="flex va-c">
                <div class="w-8 tar mr"><x-gt-icon name="{{ $iconFileName }}" type="payment" /></div>
                <span class="ml-075">{{ $iconFileName }}</span>
            </div>
        @endforeach
    </div>

</x-docs.sections.layout> --}}