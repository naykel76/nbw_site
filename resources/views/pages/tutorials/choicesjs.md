
How do i entangle a value and use it?

### Problem

When you use `$wire.entangle()` to bind a Livewire property to an AlpineJS
component, it creates a two-way binding. 

However, Choices.js directly manipulates
the DOM and does not automatically trigger updates in Alpine or Livewire when
the selection changes. This can lead to a situation where the UI does not
reflect the current state of the Livewire property, or vice versa.

### Solution
To make Choices.js work seamlessly with Livewire and AlpineJS, you need to
ensure that changes in the Choices.js selection are reflected in the Livewire
property and vice versa. This requires a bit of manual syncing.

```html +code-blade
@verbatim
<select 
    x-data="choicesComponent($wire.entangle('{{ $model }}'))" 
    x-ref="selectElement" 
    multiple
>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

@pushOnce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('choicesComponent', (selections) => ({
                selections,
                init() {
                    choices = new Choices(this.$refs.selectElement, {
                        removeItemButton: true,
                        searchEnabled: true,
                        placeholderValue: '{{ $placeholder }}',
                    })
                    choices.setChoiceByValue(this.selections);
                }
            }));
        });
    </script>
@endPushOnce
@endverbatim
```

The problem here is that we are passing the entangled property as a parameter to
the `choicesComponent` which means:

- Every time the Livewire property changes (like when you select an option), the
  entire `x-data` expression is re-evaluated,
- Alpine destroys and recreates the component, calling `init()` again,
- This resets the Choices.js instance. 

---
## How to properly use entangle without re-initializing

Instead of passing the entangled property as a parameter, declare it inside your
Alpine component like this:

---

To make it **reactive**, you need to:

1. **Manually update `selections` when the user changes the selection**
2. Optionally, **watch `selections` and update Choices.js if Livewire updates it
   externally**

Here’s a reactive version that stays in sync both ways:

```blade
<select x-data="choicesComponent($wire.entangle('{{ $model }}').defer)" x-ref="selectElement" multiple>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

@pushOnce('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('choicesComponent', (selections) => ({
                selections,
                choices: null,

                init() {
                    this.choices = new Choices(this.$refs.selectElement, {
                        removeItemButton: true,
                        searchEnabled: true,
                        placeholderValue: '{{ $placeholder }}',
                    });

                    // Set initial selection
                    this.choices.setChoiceByValue(this.selections);

                    // Sync changes from UI to entangled model
                    this.$refs.selectElement.addEventListener('change', () => {
                        this.selections = Array.from(this.$refs.selectElement.selectedOptions)
                            .map(option => option.value);
                    });
                },

                // Optional: Watch for changes to selections (e.g. from Livewire)
                // and update Choices.js if needed
                // Can be added with Alpine magic if required
            }));
        });
    </script>
@endPushOnce
```



