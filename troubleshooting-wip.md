
{{-- 
- this works but it is not reactive, and no communication works with livewire
- initial values load correctly and the and I can add and remove options
- $attributes are not included here so wire:model in not set, is this the reason
  in is not communicating with livewire?
 --}}
<select x-data="choicesComponent($wire.entangle('{{ $model }}'))" x-ref="selectElement" multiple>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>


{{-- 
- when i add {{ $attributes }} to the select, the component starts to communicate with livewire,
  but it clears previously selected values and changes the array format form this

   "tags": [
        "AU",
        "UK"
    ],

to this
  "tags": {
        "value": "UK"
    },
--}}
<select {{ $attributes }} x-data="choicesComponent($wire.entangle('{{ $model }}'))" x-ref="selectElement" multiple>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>