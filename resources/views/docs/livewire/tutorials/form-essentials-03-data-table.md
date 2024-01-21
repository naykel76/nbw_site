# Livewire Data Table
<!-- TOC -->

- [Introduction](#introduction)
- [Create the Livewire table component](#create-the-livewire-table-component)
- [Define the component properties and import the form object](#define-the-component-properties-and-import-the-form-object)
- [Component Methods](#component-methods)
- [Things worth noting](#things-worth-noting)
    - [Enum class for select field options](#enum-class-for-select-field-options)
- [Additional resources and source code](#additional-resources-and-source-code)
- [Trouble shooting](#trouble-shooting)

<!-- /TOC -->
<a id="markdown-introduction" name="introduction"></a>

## Introduction

<a id="markdown-create-the-livewire-table-component" name="create-the-livewire-table-component"></a>

## Create the Livewire table component

```bash
php artisan make:livewire Course/Table
```

<a id="markdown-define-the-component-properties-and-import-the-form-object" name="define-the-component-properties-and-import-the-form-object"></a>

## Define the component properties and import the form object
<a id="markdown-component-methods" name="component-methods"></a>

## Component Methods
<a id="markdown-things-worth-noting" name="things-worth-noting"></a>

## Things worth noting


<a id="markdown-enum-class-for-select-field-options" name="enum-class-for-select-field-options"></a>

### Enum class for select field options

The `status` field uses an Enum class to provide the options for the select field. The `status`
field is defined in the `Table` class as follows:

The `status` field is cast to an Enum class in the `Course` model as follows:

```php
protected $casts = [
    'status' => CourseStatus::class,
];
```


<a id="markdown-additional-resources-and-source-code" name="additional-resources-and-source-code"></a>

## Additional resources and source code

<a id="markdown-trouble-shooting" name="trouble-shooting"></a>

## Trouble shooting
