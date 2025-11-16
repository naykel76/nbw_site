# Slim Select with Livewire and AlpineJS

- [Basic Implementation](#basic-implementation)
- [Step 2: Integrate with Livewire](#step-2-integrate-with-livewire)
- [Alpine Integration](#alpine-integration)

---

## Basic Implementation

Set up a basic component to confirm Slim Select works with AlpineJS. This is a
static example with no Livewire interaction or dynamic data.

```html +parse-and-code
   <div x-data="slimSelect">
        <select x-ref="selectElement" multiple>
            <option value="AU">Australia</option>
            <option value="CA">Canada</option>
            <option value="NZ">New Zealand</option>
            <option value="UK">United Kingdom</option>
            <option value="US">United States</option>
        </select>
    </div>

    <script>
        window.addEventListener('alpine:init', function() {
            Alpine.data('slimSelect', () => ({
                init() {
                    const SLIM = new SlimSelect({
                        select: this.$refs.selectElement,
                        settings: { },
                        events: { }
                    });
                    SLIM.setSelected(['AU', 'US']);
                }
            }));
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/slim-select@2.8.1/dist/slimselect.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/slim-select@2.8.1/dist/slimselect.min.js"></script>
```

**Explanation**

* The `x-data` creates an Alpine component named `slimSelect`.
* Within the `init` method, a new `SlimSelect` instance is created for the
  element referenced by `x-ref="select"`.
* `setSelected` is used to programmatically set initial values.

---

## Step 2: Integrate with Livewire

The next step is to integrate this with Livewire, allowing dynamic data
and model binding.

<div wire:ignore x-data="slimSelect">
    <select x-ref="selectElement" multiple>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>

- Add loop to generate options dynamically
- wire model??


**Explanation**

* We use `wire:ignore` to prevent Livewire from interfering with the Slim Select
  initialisation.



<!-- ### 4. **Set Up Initial Livewire Binding**

`wire:ignore` prevents stops tracking changes to that element directly — it
won’t update or read from it automatically, which breaks model binding unless
you handle it manually.

To restore model syncing, you use AlpineJS with `$wire.entangle` and manually
watch the value. Here's how it works:

* Use Alpine’s `x-data` to define a `value` property bound to the Livewire model
  using `@entangle('model').defer`.
* After the Slim Select instance is created, use `setSelected()` with `value` to
  show the initial values.
### 7. **Keep Livewire in Control**

* Avoid full re-renders on changes by using `.defer` on `@entangle` or updating
  the model manually via `$wire.set()`.
* When updating the options list via Livewire (e.g. via AJAX), you’ll need to
  destroy and reinitialise Slim Select to reflect the new options. -->

---

## Alpine Integration

```html +parse-and-code
<div wire:ignore x-data="slimSelect">
    <select x-ref="select" multiple>
        <template x-for="option in [
            { value: 'AU', label: 'Australia' },
            { value: 'CA', label: 'Canada' },
            { value: 'NZ', label: 'New Zealand' },
            { value: 'UK', label: 'United Kingdom' },
            { value: 'US', label: 'United States' }
        ]" :key="option.value">
            <option :value="option.value" x-text="option.label"></option>
        </template>
    </select>
</div>
```





<!-- 


@entangle('countrySelection').defer

<div wire:ignore x-data
    x-init="selectInstance = new SlimSelect({
        select: $refs.select,
        settings: {
            placeholderText: '{{ $placeholder }}',
            hideSelected: true,
            allowDeselect: true,
        },
        events: {

        }
    });
    console.log(selectInstance)
    
    {{-- single string, or array --}}
    selectInstance.setSelected(['AU', 'US'])
    
    ">
    <select x-ref="select" multiple>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div> -->

<!-- 

```html +code-blade
<div wire:ignore x-data
    x-init="selectInstance = new SlimSelect({
        select: $refs.selectElement,
        settings: {
            placeholderText: '{{ $placeholder }}',
            hideSelected: true,
            allowDeselect: true,
        },
        events: {
            afterChange: () => {
                const values = Array.from($refs.selectElement.selectedOptions).map(o => o.value)
                $wire.set('{{ $model }}', values)
            }
        }
    });
    selectInstance.setSelected(['AU', 'US']);
    ">
    <select x-ref="selectElement" multiple>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>
``` -->


<!-- 

---


---

### 5. **Handle Selection Changes**

* In the `afterChange` event, extract selected option values and update the
  `value` property.
* Alpine will sync `value` back to Livewire via `entangle()`.

---

### 6. **Generate Option Elements**

* In the Blade loop (`@foreach`), output each `<option>` with `value`.
* Do **not** rely on the `selected` attribute to set initial values — Slim
  Select requires you to set selected values programmatically.

---



---














This version communicates with livewire but it does not set the initial values
correctly.

```html +code-blade
<div wire:ignore x-data
    x-init="new SlimSelect({
        select: $refs.select,
        settings: {
            placeholderText: '{{ $placeholder }}',
            hideSelected: true,
            allowDeselect: true,
        },
        events: {
            afterChange: () => {
                const values = Array.from($refs.select.selectedOptions).map(o => o.value)
                $wire.set('{{ $model }}', values)
            }
        }
    });">
    <select x-ref="select" multiple>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @if (collect($attributes->wire('model')->value())->contains($value)) selected @endif>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
``` -->

<!-- 
<div wire:ignore {{ $attributes }} x-data="slimSelect">
    <select x-ref="selectElement" multiple>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>

<script>
    window.addEventListener('alpine:init', function() {
        Alpine.data('slimSelect', () => ({
            init() {
                const SLIM = new SlimSelect({
                    select: this.$refs.selectElement,
                    settings: {},
                    events: {
                        afterChange: () => {
                            const values = Array.from(this.$refs.selectElement.selectedOptions).map(o => o.value)
                            this.$wire.set('{{ $model }}', values)
                        }
                    }
                });
                SLIM.setSelected(this.values);
            }
        }));
    });
</script> -->