# Radio Group

<!-- ```html +parse
<livewire:gotime.components.radio />
``` -->




@php
    $options = [
    'red' => 'Red',
    'blue' => 'Blue',
    'green' => 'Green',
    'indigo' => 'Indigo',
    'gray' => 'Gray',
    ];
@endphp


<x-docs.sections.layout title="Basic Usage">

    {{-- <p>The most basic usage of the <code>radio</code> component only requires the <code>for</code> and <code>options</code> attributes. By default, radio buttons are placed inside a form row and will be displayed horizontally.</p> --}}

    {{-- <div class="flex">
        <label class="mr">Receive Offers</label>
        <x-gt-radio wire:model="form.receive_offers" for="form.receive_offers" option="Yes" value="true" controlOnly class="ml" />
        <x-gt-radio wire:model="form.receive_offers" for="form.receive_offers" option="No" value="false" controlOnly class="ml" />
    </div>
 --}}

    <livewire:gotime.components.radio />

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-radio wire:model="receiveEmails" for="receiveEmails" :options label="Receive Emails?" />
        @endverbatim
    </x-gt-markdown>

</x-docs.sections.layout>

<x-docs.sections.layout title="Setting the selected value">

    <div class="bx info-light bdr-3 rounded-1 flex va-c">
        <svg class="icon wh-4 fs0 mr-2">
            <use xlink:href="/svg/naykel-ui.svg#question-mark-circle"></use>
        </svg>
        <p>Livewire will select the radio button whose value matches that of the public property as such it means the checked attribute no longer works.</p>
    </div>

</x-docs.sections.layout>

<x-docs.sections.control-only>

    <div class="bx warning-light bdr-3 rounded-1 flex va-c">
        <svg class="icon wh-4 fs0 mr-2">
            <use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use>
        </svg>
        <div>This is the best option for now. It is difficult to come up with a one-size fits all in terms on layout. </div>
    </div>

    <div class="my space-x">
        <x-gt-radio wire:model="color" for="color2" option="Red" value="1" controlOnly />
        <x-gt-radio wire:model="color" for="color2" option="Green" value="2" controlOnly />
    </div>

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-radio wire:model="color" for="color" option="Red" value="1" controlOnly />
            <x-gt-radio wire:model="color" for="color" option="Green" value="2" controlOnly />
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.control-only>

<x-docs.sections.layout title="Label and Tooltip">

    <p>The <code>helpTextTop</code> flag has been set to place the help text directly under the <code>label</code>, and the <code>tooltip</code> slot has been included.</p>

    <div class="maxw-16">
        <x-gt-radio wire:model="color" for="unique_id_2" :$options label="Select Color"
            help-text="Select your preferred colour" helpTextTop>
            <x-slot name="tooltip">
                Select your favourite color.
            </x-slot>
        </x-gt-radio>
    </div>
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```
            <x-gt-radio wire:model="color" for="color" :$options label="Select Color"
                help-text="Select your colour" helpTextTop>
                <x-slot name="tooltip">
                    ...
                </x-slot>
            </x-gt-radio>
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.layout>

<x-docs.sections.control-error-handling>
    <livewire:gotime.components.radio withError />
</x-docs.sections.control-error-handling>
