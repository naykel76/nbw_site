Certainly! You can include all the necessary code within a single Blade view. Here's how you can set up your view to show a popup notification using Alpine.js when a session flash message is present:
```php
// {{-- Include Alpine.js --}}
<script src="//unpkg.com/alpinejs" defer></script>

// {{-- Check for a session flash message and set up Alpine.js --}}
<div x-data="{ open: false, message: '' }"
     x-init="@this.on('notify', () => { open = true })"
     x-show="open"
     @click.away="open = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     class="fixed inset-0 flex items-center justify-center p-4"
     style="display: none;">

    {{-- Popup Notification --}}
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg">Notification</h2>
        <p x-text="message"></p>
        <button @click="open = false">Close</button>
    </div>
</div>

// {{-- Inline script to trigger the Alpine.js notification if a session message exists --}}
@if(session('notification'))
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Access the Alpine component's scope and set the message
        document.querySelector('[x-data]').__x.$data.message = '{{ session('notification') }}';

        // Trigger the 'notify' event
        document.querySelector('[x-data]').__x.$dispatch('notify');
    });
</script>
@endif
```

In this example:

We include Alpine.js via CDN.
We set up an Alpine.js component with x-data to hold the state of the popup (open) and the message to display (message).
We use x-init to listen for a custom notify event that will set open to true.
We use x-show to control the visibility of the popup based on the open state.
We add transition directives for a smooth open/close animation.
We check for a session flash message. If it exists, we use an inline script to set the message in the Alpine.js component and dispatch the notify event after the DOM content is loaded.
This way, when the view is rendered after a redirect from the controller with a flash message, the inline script will automatically trigger the notification popup.

please update the code so it is all handled from the same blade view

Lary's avatar
Certainly! Here's how you can handle everything within the same Blade view, including displaying a notification when a session flash message is present:

{{-- Include Alpine.js --}}
<script src="//unpkg.com/alpinejs" defer></script>

{{-- Blade view with Alpine.js component --}}
<div x-data="{ open: @if(session('notification')) true @else false @endif, message: '{{ session('notification') }}' }"
     x-show="open"
     @click.away="open = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     class="fixed inset-0 flex items-center justify-center p-4"
     style="display: none;">

    {{-- Popup Notification --}}
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg">Notification</h2>
        <p x-text="message"></p>
        <button @click="open = false">Close</button>
    </div>
</div>
In this updated code:

We include Alpine.js via CDN.
We create an Alpine.js component with x-data that initializes the open state based on whether a session flash message is present. If there is a flash message, open is set to true; otherwise, it's false.
The message property is set to the content of the session flash message.
We use x-show to control the visibility of the popup based on the open state.
We add transition directives for a smooth open/close animation.
We use @click.away to allow closing the popup by clicking outside of it.
With this setup, when the view is rendered and a session flash message is present, the notification popup will automatically be displayed without the need for additional JavaScript to dispatch events. The Alpine.js component will handle the display logic based on the initial state set by the Blade template.
