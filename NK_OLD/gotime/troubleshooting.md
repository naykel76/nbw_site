# Trouble Shooting

- [Date and Time Fields](#date-and-time-fields)
    - [Date format is incorrect when using `Gotime/DateCast` trait. ](#date-format-is-incorrect-when-using-gotimedatecast-trait-)
- [Form Objects](#form-objects)
    - [Form Object Initialisation](#form-object-initialisation)

## Date and Time Fields

### <question>Date format is incorrect when using `Gotime/DateCast` trait. </question>

- Make sure you have initialised the `DateCast::class` in the $casts array of the model.

- Make sure you have created a public property in the form object to hold the date value.

- Make sure you have set the date value in the form object in the `init` method. <br>
  **This is not automatically set like some other primitive values**
    
## Form Objects


<!-- this needs to be tidied up -->

Make sure that the field has a validation rule set. If a field does not have a validation rule, it
will not be included in the validated data for database operations.

For fields with default values that users won't necessarily modify, simply add a `sometimes` rule to
ensure their inclusion in the validation process.



### Form Object Initialisation

When initialising a form object, ensure that the `init` method is called with the correct model

**Error:** Typed property `App\Livewire\Forms\UserForm::$name` must not be accessed before
initialisation.

Ensure that you have included the `WithFormActions` trait in the component class and initialised
the form object in the `mount` method of the parent component.