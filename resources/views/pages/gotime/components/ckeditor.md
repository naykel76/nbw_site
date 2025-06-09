<h1>Editor</h1>

- [Basic Usage](#basic-usage)
- [Control Only](#control-only)
    - [Classic Editor](#classic-editor)
    - [Balloon Editor](#balloon-editor)
- [Control Group](#control-group)
    - [Classic Editor](#classic-editor-1)
    - [Balloon Editor](#balloon-editor-1)
- [Attributes](#attributes)

## Basic Usage

To use the editor component, call the component and set the `wire:model` attribute to the
name of the field you want to bind to and provide a unique `editorId` to identify the
editor instance.

You can generate a unique `editorId` using the `Str::uuid()` method from the Laravel
helper, ensuring it is prefixed with an underscore   to avoid any issues.

```html
editorId="{{ '_' . Str::uuid() }}"
```

## Control Only

### Classic Editor

```html +parse
<livewire:gotime.components.ckeditor variant="classic-control-only-basic" />
```
```html +parse
<livewire:gotime.components.ckeditor variant="classic-control-only-standard" />
```

### Balloon Editor

```html +parse
<livewire:gotime.components.ckeditor variant="balloon-control-only-basic" />
```
```html +parse
<livewire:gotime.components.ckeditor variant="balloon-control-only-standard" />
```

## Control Group

### Classic Editor

```html +parse
<livewire:gotime.components.ckeditor variant="classic-control-group-basic" />
```
```html +parse
<livewire:gotime.components.ckeditor variant="classic-control-group-standard" />
```

### Balloon Editor

```html +parse
<livewire:gotime.components.ckeditor variant="balloon-control-group-basic" />
```
```html +parse
<livewire:gotime.components.ckeditor variant="balloon-control-group-standard" />
```


```html
<x-gotime::v2.input.controls.ckeditor wire:model=\"body\" 
    editorId=\"{{ '_' . Str::uuid() }}\" editorType=\"classic\" editorConfig=\"basic\" />
```

## Attributes

Values are converted to a `config` array, which is passed to the editor instance. The
`config` array is used to configure the editor instance. 


| Attribute      | Required |  Default   | Description                                                 |
| :------------- | :------: | :--------: | :---------------------------------------------------------- |
| `editorId`     |   Yes    | `classic`  | The unique editor id                                        |
| `editorType`   |    No    | `classic`  | The editor type to be used (e.g., `'classic'`, `'balloon'`) |
| `editorConfig` |    No    | `standard` | The configuration type (e.g., `'basic'`, `'standard'`)      |
