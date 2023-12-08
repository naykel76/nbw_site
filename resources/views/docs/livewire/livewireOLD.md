# Livewire Tips and Tricks

#### Make a child component "reactive" based on parent changes.

This technique forces the child to mount each time the parent is updated. Read more [here](https://github.com/livewire/livewire/discussions/2097)

```html
<livewire:create-question-answers key="{{ Str::random()}}" :quiz-id="$editing->id" />
```
