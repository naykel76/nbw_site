@props([
    'options' => [],
    'selected' => [],
    'multiple' => false,
    'name' => 'choices',
])

<div
    x-data="{
        selected: @entangle($attributes->wire('model')),
        toggle(option) {
            if (this.multiple) {
                if (this.selected.includes(option)) {
                    this.selected = this.selected.filter(i => i !== option)
                } else {
                    this.selected.push(option)
                }
            } else {
                this.selected = [option]
            }
        },
        multiple: @js($multiple),
    }"
    class="flex flex-wrap gap-2"
>
    <template x-for="(label, value) in options" :key="value">
        <button
            type="button"
            class="px-3 py-1 rounded border border-gray-300 bg-white hover:bg-gray-100"
            :class="selected.includes(value) ? 'bg-blue-500 text-white' : ''"
            x-text="label"
            @click="toggle(value)"
        ></button>
    </template>
    <input type="hidden" :name="name" :value="multiple ? selected : selected[0]">
</div>
