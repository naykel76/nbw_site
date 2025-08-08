### <question>How do I insert a markdown file into a blade view?</question>

To insert a markdown file into a Blade view, you can use the `x-gt-markdown` component. This component takes the path to the markdown file as an argument. Here's an example:

```blade +torchlight-blade
@verbatim
<x-gt-markdown path="pages/gotime/faqs.md" />
@endverbatim
```
This will render the contents of `faqs.md` in your Blade view.

### Why Use the `$modelClass` Property?

The `$modelClass` property is used to specify the primary model that the component
interacts with. This is important because it tells the `WithFormActions` trait which model
to perform actions (such as create, update, or delete) on.