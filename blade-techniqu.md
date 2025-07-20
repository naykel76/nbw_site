When you use Blade's @include directive (e.g., @include('livewire.scheduled-events.create-edit-modal')) inside a Livewire component view, the included file automatically has access to all the public properties and methods of the Livewire component.

This is because the included Blade partial is rendered in the same PHP scope as the parent view. In Livewire, the view is rendered with the component's data, so any @include within that view inherits the same data context.

You do not need to explicitly pass variables unless you want to override or add to the data. All public properties (like $form, $showModal, etc.) and methods from your Livewire component are available in the included partial, just as they are in the main view.

In summary:

The included file is rendered in the same scope as the parent view.
All Livewire public properties and methods are available in the included file by default.
You only need to pass data explicitly if you want to provide different or additional variables.