# Frequently Asked Questions

- [Markdown](#markdown)
    - [How do I insert a markdown file into a blade view?](#how-do-i-insert-a-markdown-file-into-a-blade-view)
    - [Why is there a margin on my code block?](#why-is-there-a-margin-on-my-code-block)
    - [How can I insert a file into the Torchlight component?](#how-can-i-insert-a-file-into-the-torchlight-component)
- [Mermaid Diagrams](#mermaid-diagrams)


## Markdown

### <question>How do I insert a markdown file into a blade view?</question>

To insert a markdown file into a Blade view, you can use the `x-gt-markdown`
component. This component takes the path to the markdown file as an argument.

```blade +torchlight-blade
@verbatim
<x-gt-markdown path="pages/gotime/faqs.md" />
@endverbatim
```

### <question>Why is there a margin on my code block?</question>

The margin issue occurs when you place the `x-torchlight-code` component on a
new line after the opening `<pre>` tag. The whitespace (newline and indentation)
before the component gets rendered as part of the HTML content, creating
unwanted margin or spacing.

**Correct approach** (no extra margin):
```html +torchlight-html
@verbatim
<pre><x-torchlight-code language='php'>
    Hey There!
</x-torchlight-code></pre>
@endverbatim
```

**Incorrect approach** (creates unwanted margin):
```html +torchlight-html
@verbatim
<pre>
    <x-torchlight-code language='php'>
        Hey There!
    </x-torchlight-code>
</pre>
@endverbatim
```

The key is to place the opening tag of `x-torchlight-code` immediately after 
the `<pre>` tag with no whitespace or newline characters in between.

### <question>How can I insert a file into the Torchlight component?</question>

To insert a file into a Torchlight component, add the `contents` attribute with
the path to the file you want to include.

When using `contents`, Torchlight will first check if the given path points to a
valid file. If it is not valid, the path will be treated as relative to the
`resources/views` directory.

```html +torchlight-blade
@verbatim
<x-torchlight-code language="php" contents="path/to/file.md" />
@endverbatim
```

```html +torchlight-blade
@verbatim
<x-torchlight-code language="php" contents="{{  base_path('path/to/file.md') }}" />
@endverbatim
```

## Mermaid Diagrams

<question>How can I inset a mermaid file?</question>

```html +torchlight-html
***mermaid +parse-mermaid
resources\views\docs\diagrams\sequence-diagram.mmd
***
```

Replace '*' with backticks to format as code block.
