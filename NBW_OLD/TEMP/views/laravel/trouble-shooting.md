# Things to Check When Sh*t Ain't Working!

<!-- MarkdownTOC -->

- [Livewire Trouble Shooting](#livewire-trouble-shooting)
	- [Data binding not working as expected](#data-binding-not-working-as-expected)
	- [How do I refresh data table after delete?](#how-do-i-refresh-data-table-after-delete)
	- [Errors](#errors)
	- [Error: driver does not support creating temporary URLs.](#error-driver-does-not-support-creating-temporary-urls)
	- [Error: must not be accessed before initialization](#error-must-not-be-accessed-before-initialization)
	- [ERROR: The GET method is not supported for this route. Supported methods: POST.](#error-the-get-method-is-not-supported-for-this-route-supported-methods-post)

<!-- /MarkdownTOC -->





<a id="livewire-trouble-shooting"></a>
## Livewire Trouble Shooting




<a id="data-binding-not-working-as-expected"></a>
### Data binding not working as expected

Make sure you have a colon NOT a period when rendering the component

    <livewire:my-component> -NOT- <livewire.my-component>



<a id="how-do-i-refresh-data-table-after-delete"></a>
### How do I refresh data table after delete?

    $this->mount();


<a id="errors"></a>
### Errors

<a id="error-driver-does-not-support-creating-temporary-urls"></a>
### Error: driver does not support creating temporary URLs.

https://laracasts.com/discuss/channels/livewire/pdf-passes-image-validation?page=1&replyId=806087

https://github.com/livewire/livewire/discussions/3133#discussioncomment-2741258


```php
if (! $this->isPreviewable()) {
    // show a missing image icon (?) for files that cannot be previewed
    return \'data:image/png;base64...gap==\';
}
```

<a id="error-must-not-be-accessed-before-initialization"></a>
### Error: must not be accessed before initialization

Add the `mount()` function

    public function mount(Fugit $fugit)
    {
        $this->fugit = $fugit;
    }


<a id="error-the-get-method-is-not-supported-for-this-route-supported-methods-post"></a>
### ERROR: The GET method is not supported for this route. Supported methods: POST.

Make sure pagination component is correct


```html
{{ $projects->links('gotime::pagination.livewire') }} <!-- CORRECT -->

{{ $projects->links('gotime::pagination.default') }} <!-- INCORRECT -->
```
