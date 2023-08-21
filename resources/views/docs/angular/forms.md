# Angular Forms

<!-- TOC -->

- [Template-driven forms](#template-driven-forms)
- [Form Controls](#form-controls)
    - [Radio Buttons](#radio-buttons)
- [Additional Resources](#additional-resources)

<!-- /TOC -->


<a id="markdown-template-driven-forms" name="template-driven-forms"></a>

## Template-driven forms

Template-driven forms are useful for adding a simple form to an app. They're easy to add, but they
don't scale as well as reactive forms. If you have very basic form requirements and logic that can
be managed solely in the template, use template-driven forms.

`NgModel`, `NgForm`, and `NgModelGroup` are the three directives defined in the `FormsModule` that
you need to know about to build a template-driven form.

<a id="markdown-form-controls" name="form-controls"></a>

## Form Controls

<a id="markdown-radio-buttons" name="radio-buttons"></a>

### Radio Buttons

True Or False

```html
<div class="frm-row">
    <label> <input [(ngModel)]="extended" type="radio"
        [value]="true" name="extended"> Normal </label>
    <label> <input [(ngModel)]="extended" type="radio"
        [value]="false" name="extended"> Extended </label>
</div>
```


  <!-- template: `
    <label>
      <input type="radio" [(ngModel)]="selectedValue" value="option1"> Option 1
    </label>
    <label>
      <input type="radio" [(ngModel)]="selectedValue" value="option2"> Option 2
    </label>
    <p>Selected value: {{ selectedValue }}</p>
  `,
}) -->




<a id="markdown-additional-resources" name="additional-resources"></a>

## Additional Resources

- <a href="https://angular.io/guide/forms-overview" target="blank">https://angular.io/guide/forms-overview</a>
- <a href="https://angular.io/api/forms/NgModel" target="blank">https://angular.io/api/forms/NgModel</a>
- <a href="https://angular.io/guide/forms" target="blank">Building a template-driven form</a>
