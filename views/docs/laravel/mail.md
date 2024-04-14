# Sending Mail with Laravel

<!-- TOC -->

- [Create New Email](#create-new-email)
    - [Configure The Sender (Envelope)](#configure-the-sender-envelope)
- [Sending Mail](#sending-mail)
- [Testing](#testing)

<!-- /TOC -->

<a href="https://laravel.com/docs/10.x/mail#markdown-mailables" target="blank">https://laravel.com/docs/10.x/mail#markdown-mailables</a>



<a id="markdown-create-new-email" name="create-new-email"></a>

## Create New Email

```bash
php artisan make:mail TestEmail
```

<a id="markdown-configure-the-sender-envelope" name="configure-the-sender-envelope"></a>

### Configure The Sender (Envelope)

Or, in other words, who the email is going to be "from". There are two ways to configure the sender. First, you may specify the "from" address on your message's envelope:

<div class="bx info-light">The <code>envelop</code> can be omitted and the mailable will create the subject based on the class name and use the sender details configured in <code>config/mail.php</code>.</div>

```php
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

public function envelope(): Envelope
{
    return new Envelope(
        from: new Address('nathan@naykel.com.au', 'NayKel'),
        // If you would like, you may also specify a replyTo address:
        replyTo: [
            new Address('sales@naykel.com.au', 'Naykel Sales'),
        ],
        subject: 'Test Email',
    );
}
```

And the second way is to specify a global "from" address in your config/mail.php configuration file.

```
'from' => [
    'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
    'name' => env('MAIL_FROM_NAME', 'Example'),
],
```

Define markdown or blade view

```php
use Illuminate\Mail\Mailables\Content;

public function content(): Content
{
    return new Content(
        // view: 'contactit::emails.message-received',
        // markdown: 'contactit::emails.message-received',
    );
}
```

<a id="markdown-sending-mail" name="sending-mail"></a>

## Sending Mail

To send a message, use the to method on the Mail facade. The to method accepts an email address, a
user instance, or a collection of users. If you pass an object or collection of objects, the
mailer will automatically use their email and name properties when determining the email's
recipients, so make sure these attributes are available on your objects. Once you have specified
your recipients, you may pass an instance of your mailable class to the send method:

```php
use Illuminate\Support\Facades\Mail;

public function testEmail(Request $request): RedirectResponse
{
    Mail::to($request->user())->send(new TestEmail());

    return redirect('/');

}
```


    <x-mail::message>
    # Introduction

    <!-- The body of your message. -->

    <x-mail::button :url="''">
    <!-- Button Text -->
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
    </x-mail::message>


<a id="markdown-testing" name="testing"></a>

## Testing

A handy way to develop and test your mailable is to directly display the template file in the browser. In the `web.php` routes file add the `mail` facade, `mailable` class and create a route to display in the browser.

```php
Route::get('/test-email', function () {
    Mail::raw('Hello World!', function ($msg) {
        $msg->to('myemail@gmail.com')->subject('Test Email');
    });
});
```
