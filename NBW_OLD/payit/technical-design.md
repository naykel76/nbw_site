# Payit Technical Design Document
<div class="compress-tables"></div>

- [To Do's](#to-dos)
- [Database Design](#database-design)
    - [Payment Platforms](#payment-platforms)
- [General Workflow](#general-workflow)
    - [1. Payment Initiation](#1-payment-initiation)
    - [Payment Approval](#payment-approval)
- [Class Descriptions](#class-descriptions)
    - [`PaymentPlatformResolver`](#paymentplatformresolver)
- [Payment Options Component](#payment-options-component)


## To Do's

- The `HandlePaymentApprovalController` for Stripe is tightly coupled to the `checkout`
  route. This should be reviewed and refactored to allow for more flexibility and
  reusability.



## Database Design

### Payment Platforms

Stores the available payment platforms that users can choose from when making a payment.

```html +parse
<x-gt-alert type="warning">
The Payment Platforms are hardcoded in the <code>PaymentPlatform</code> model using
<code>calebporzio/sushi</code>. At this stage, it is overkill to use a database table for payment
platforms and this can be easily changed in the future if required.
</x-gt-alert>
```

```mermaid +parse
<x-mermaid>
erDiagram
    "PAYMENT PLATFORMS" {
        bigint id PK "The unique identifier of the payment platform method"
        string platform_name "The name of the payment platform (e.g., Stripe, PayPal)"
        string method "The specific method provided by the platform (e.g., Stripe API, Stripe Elements, PayPal)"
        standalone active "Use to indicate a standalone payment platform"
    }
</x-mermaid>
```

**Note**: `standalone` is used to indicate a standalone payment platform meaning there is
a dedicated component for the payment method. This is a bit of a hack to make it easy in
development and could be removed in the future.

## General Workflow

### 1. Payment Initiation

This sequence diagram outlines the workflow for initiating a payment. It covers the
process from the user selecting a payment platform and submitting the form, through to the
creation of the payment intent or order with the payment provider, and the subsequent
response required to proceed with the payment.

```+parse
<x-mermaid>
sequenceDiagram
    actor user
    participant Browser
    participant InitiatePaymentController
    participant PaymentPlatformResolver
    participant PaymentService

    user->>Browser: Select payment platform <br> and submit form
    Browser->>InitiatePaymentController: POST /payment/initiate
    InitiatePaymentController->>InitiatePaymentController: Validate request
    InitiatePaymentController->>InitiatePaymentController: Store `ppid` in session
    InitiatePaymentController->>PaymentPlatformResolver: resolveService(platformId)
    PaymentPlatformResolver -->> InitiatePaymentController: return service class <br> e.g. StripeService, PayPalService
    InitiatePaymentController->>PaymentService: service->initiatePayment(amount, request, ?currency)
    Note over PaymentService: Refer to specific service implementation <br> for processing and redirect details
    PaymentService->>PaymentService: Process payment
</x-mermaid>
```

- **Service Resolution**: The PaymentPlatformResolver resolves the appropriate payment
  service (e.g., StripeService or PayPalService) based on the selected platform, including
  the necessary platform credentials.
- **Stripe Integration**: Stripe currently requires the 'payment_method', which is
  returned from the Stripe Elements API. This will be updated in future versions to align
  with Stripe’s latest API version.

---

### Payment Approval


---

## Class Descriptions

### `PaymentPlatformResolver`

The `PaymentPlatformResolver` is responsible for resolving the appropriate payment service
based on the payment platform's ID (`ppid`). It dynamically identifies and instantiates
the correct service (e.g., `StripeService`, `PayPalService`) using the configuration
defined in the `payit.php` file.

The `InitiatePaymentController` job is to validate the request and delegate the payment
process to the resolved service. The service class is resolved by the
`PaymentPlatformResolver` and the payment handling is delegated to the resolved service.


---
---
---
---
---
---
---
---

## Payment Options Component

The `payment-options` component is responsible for displaying the available payment methods to the
user. It provides a form that allows the user to select a payment method and proceed with the
payment.

The component consists of the following elements:

- **Payment Method Selection**: A list of available payment methods is displayed, allowing the user
  to choose the desired payment method.
  