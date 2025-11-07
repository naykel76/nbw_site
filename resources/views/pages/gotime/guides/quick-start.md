# Gotime Quick Start Guides

- [Table Component](#table-component)
- [Form Object](#form-object)
- [Form Component](#form-component)
- [Adding Additional Features](#adding-additional-features)
    - [Search](#search)


## Table Component

- [ ] In the **component class**:
  - [ ] Run `gtlc:table-class` to scaffold the class traits, properties, and
    methods for sorting, pagination, and querying.

- [ ] In the **component view**:
    - [ ] Run `gtlc:table` to generate the table markup.
    - [ ] Add pagination (consider including it in the snippet).

## Form Object

- [ ] Run `gtl:form-object` to scaffold the form object class with the necessary
  traits, properties, and methods for initialization, validation, and form
  handling.

- [ ] Add any additional properties and validation rules as needed.

## Form Component
- [ ] Run `gtlc:form-class` to generate the class with the necessary traits,
  properties, and methods for form handling.

- [ ] In the component view:
    - [ ] Run `gtlv:form` to generate the form markup.
    - [ ] Add any additional form fields as needed.







## Adding Additional Features

### Search

- [ ] Include the `Searchable` trait in your component class.
- [ ] Define a `searchableFields` property listing the fields to be searched.
- [ ] In the `prepareData()` method, chain the `applySearch()` to filter results
  based on the search input.