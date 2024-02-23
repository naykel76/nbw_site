# Troubleshooting

<!-- TOC -->

- [Child component not updating](#child-component-not-updating)
- [Dispatch to component not working](#dispatch-to-component-not-working)
- [Dispatching to a child component](#dispatching-to-a-child-component)

<!-- /TOC -->


<a id="markdown-child-component-not-updating" name="child-component-not-updating"></a>

## Child component not updating

Make sure you are dispatching an event to listen for.

```php
public function save()
{
    $this->dispatch('item-saved');
}
```

Listen for the event in the parent component.

This seems to work when you updated an item in a list but it is failing to update when new items are created

```php
#[On('item-saved')]
class CourseChapterModal extends Component { }
```

The only way to get the list to update is to attach the event listener to a dedicated method that
re-fetches the items.

```php
#[On('item-saved')]
public function refreshItems() {
    // code to reload the items
}
```


<a id="markdown-dispatch-to-component-not-working" name="dispatch-to-component-not-working"></a>

## Dispatch to component not working

Make sure you are using `dispatchTo` and not just `dispatch`

<a id="markdown-dispatching-to-a-child-component" name="dispatching-to-a-child-component"></a>

## Dispatching to a child component

When using the `dispatchTo` method to invoke a method in a child component make sure you use
`kebab-case` for the component name. Also make sure you wrap any parameters in culey braces `{}`.
For example:

```php
$dispatchTo('child-component', 'method', { id: 427 })

$dispatchTo('user-create-edit', 'edit', {id: {{ $user->id }}})
```

