<!-- TOC -->

- [Unique](#unique)
    - [Ignore a given ID](#ignore-a-given-id)

<!-- /TOC -->

<a id="markdown-unique" name="unique"></a>

## Unique

`unique:table,column,except,idColumn`

<a id="markdown-ignore-a-given-id" name="ignore-a-given-id"></a>

### Ignore a given ID

```php
'code' => 'required|min:3|unique:courses,code,' . $this->course->id,
```

```php
use Illuminate\Validation\Rule;
'code' => ['required', Rule::unique('courses')->ignore($this->course)],
```



