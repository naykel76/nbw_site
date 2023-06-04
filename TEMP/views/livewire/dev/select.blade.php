<div>

    <h5>With foreach loop</h5>
    <x-gt-select wire:model.defer="status" for="status" label="Status" placeholder="Please Select...">
        @foreach($statuses as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </x-gt-select>

    <x-markdown class="-ml-5">
        @verbatim
            ```
            <x-gt-select wire:model.defer="status" for="status" label="Status" placeholder="Please Select...">
                @foreach($statuses as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-gt-select>
        @endverbatim
    </x-markdown>

    <h5>Hardcoded values</h5>
    <x-gt-select wire:model.defer="status" for="status" label="Status" placeholder="Please Select...">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
    </x-gt-select>

    <x-markdown class="-ml-5">
        @verbatim
            ```
            <x-gt-select wire:model.defer="status" for="status" label="Status" placeholder="Please Select...">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
            </x-gt-select>
        @endverbatim
    </x-markdown>

    <div class="bx pxy-1 info-light">
        <div class="flex va-c">
            <x-gt-icon-info class="icon wh-4 mr-2 fs0" />
            <div>
                <p class="lead">When binding to a Livewire property you need to initialize an empty string or the placeholder is ignored and the first option is selected. This can be done in the <code>initialData</code> array.</p>
            </div>
        </div>
    </div>

    <x-markdown class="-ml-5">
        @verbatim
            ```
            public array $initialData = ['status' => ''];
        @endverbatim
    </x-markdown>

    <div class="txt-red">BUG: sometimes you may need to manually set the "please select" option because there is a bug I can not identify where Livewire picks the first item is the list but the value is null.</div>

    <x-markdown class="-ml-5">
        @verbatim
            ```
            <option selected value="">Please Select...</option>
        @endverbatim
    </x-markdown>

</div>
