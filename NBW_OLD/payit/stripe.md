# Stripe

**Webhooks** notify your application when events occur in your Stripe account, such as payment
successes, disputes, or subscription updates. When an event happens, Stripe sends an HTTP POST
request to your webhook endpoint containing details of the event. By handling these notifications,
you can automate processes like order fulfillment, updating customer data, or managing subscriptions
in real-time.

To use webhooks, set up an HTTP endpoint to receive and verify these POST requests and ensure your
server is configured to handle them securely, ideally using asynchronous processing to manage
scalability.

- <a href="https://docs.stripe.com/webhooks" target="blank">https://docs.stripe.com/webhooks</a>
- <a href="https://docs.stripe.com/webhooks/quickstart" target="blank">https://docs.stripe.com/webhooks/quickstart</a>

`SetupIntents` in Stripe are used to guide you through the process of setting up and saving a
customer's payment credentials for future payments. Here are some important points about
SetupIntents:

<a href="https://docs.stripe.com/api/setup_intents" target="blank">https://docs.stripe.com/api/setup_intents</a>

When storing a customer's credit card information for future use by a subscription, the Stripe
"Setup Intents" API must be used to securely gather the customer's payment method details. A "Setup
Intent" indicates to Stripe the intention to charge a customer's payment method. Cashier's Billable
trait includes the createSetupIntent method to easily create a new Setup Intent. You should invoke
this method from the route or controller that will render the form which gathers your customer's
payment method details:

https://laravel.com/docs/11.x/billing#payment-methods-for-subscriptions

## Stripe Workflow

1. Create a PaymentIntent (`[PaymentController::class, checkout]`)


<!-- Build a checkout form that collects the customer's payment details and creates a PaymentIntent.
This form should include fields for the customer's name, email, and payment method details. When the
form is submitted, the PaymentIntent is created and the customer's payment method is attached to it.

1.  -->

<!-- ## Stripe Workflow

1. Create a SetupIntent
2. Collect payment method details
3. Confirm the SetupIntent
4. Create a Customer
5. Attach the payment method to the Customer
6. Create a Subscription
7. Handle webhooks
8. Update the subscription status
9. Update the customer's payment method
10. Update the subscription's payment method
11. Update the subscription's quantity
12. Cancel the subscription
13. Resume the subscription
14. Swap the subscription -->