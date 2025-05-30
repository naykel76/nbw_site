# Checkbox

## Introduction

## Basic Usage

- You can omit the `text` to create the checkbox only

<div class="txt-red">The checkbox appearance is inconsistent. Adjust the styling to ensure the checkbox size remains uniform.</div>

```html +parse
<livewire:gotime.components.checkbox variant="control-group-checkbox-only" />
```

----------

### Control Group

```html +parse
<livewire:gotime.components.checkbox variant="control-group" />
<livewire:gotime.components.checkbox variant="control-group-checked" />
```

----------

### Control Only

```html +parse
<livewire:gotime.components.checkbox variant="control-only" />
<livewire:gotime.components.checkbox variant="control-only-checked" />
<livewire:gotime.components.checkbox variant="control-only-closed-tag" />
```

```html +parse-torchlight-blade
@verbatim
<x-gotime::v2.input.controls.checkbox wire:model="remember" label="Remember Me" />
@endverbatim
```



```html +parse-torchlight-blade
@verbatim
<x-gotime::v2.input.controls.checkbox wire:model="events">
    Event Invitations
</x-gotime::v2.input.controls.checkbox>
@endverbatim
```

----------



<!-- laravel only -->
<!-- ```html +parse
<x-gt-checkbox for="let" label="label" />
``` -->



<!-- 
{{-- <label>
    <input type="checkbox" name="hobbies" value="reading"> Reading
</label>
<label>
    <input type="checkbox" name="hobbies" value="traveling"> Traveling
</label>
<label>
    <input type="checkbox" name="hobbies" value="cooking"> Cooking
</label>
<label>
    <input type="checkbox" name="hobbies" value="sports"> Sports
</label> --}}

{{-- <input {{ $attributes->merge(['checked' => old($for)]) }} name="{{ $for }}" />
     --}}
{{-- force label? --}} -->


<!-- 

@props(['for', 'label' => null, 'options' => []])


{{-- this check needs to be in both the control, and component to make sure we cover both cases --}}
@php
    $for = $attributes->whereStartsWith('wire:model')->first() ?? $for;
    if (!isset($for)) {
        throw new InvalidArgumentException('A `for` or `wire:model` attribute must be provided for this form control.');
    }
@endphp


@if (!empty($options))
    {{-- this is crap and nothing like my code --}}
    <fieldset>
        @if ($label)
            <legend>{{ $label }}</legend>
        @endif

        @foreach ($options as $value => $text)
            @php
                if (is_int($value)) {
                    $value = $text;
                }
                $id = $for . '-' . Str::slug($value);
            @endphp


            <label for="{{ $id }}">
                <input id="{{ $id }}" type="checkbox" name="{{ $for }}[]" value="{{ $value }}" wire:model="{{ $for }}" />
                {{ $text }}
            </label>
        @endforeach
    </fieldset>
@else
    {{-- fallback to single checkbox --}}
    <label>
        <input
            {{ $attributes }} name="{{ $for }}"
            @checked(!$attributes->has('wire:model') && old($for))
            type="checkbox" />
        {{ $slot->isNotEmpty() ? $slot : $label }}
    </label>
@endif


{{-- <fieldset>
    <legend>Preferred Languages</legend>

    <label>
        <input type="checkbox" name="languages[]" value="English">
        English
    </label>

    <label>
        <input type="checkbox" name="languages[]" value="French">
        French
    </label>
</fieldset> --}} -->

<!-- 
{{-- <x-gt-checkbox-group 
for="updateTypes" 
:options="[ 'email' => 'Email', 'sms' => 'SMS', 'notification' => 'Notification', ]" 
legend="Update types" /> --}} -->
