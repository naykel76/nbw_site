# Livewire Form Essentials - Form Object

## Methods

```php
public function getComponent() { return $this->component; }
public function getPropertyName() { return $this->propertyName; }
public function validate($rules = null, $messages = [], $attributes = [])
public function validateOnly($field, $rules = null, $messages = [], $attributes = [], $dataOverrides = [])
protected function runSubValidators()
protected function prefixErrorBag($bag)
protected function prefixArray($array)
public function addError($key, $message)
public function resetErrorBag($field = null)
public function all()
public function only($properties)
public function except($properties)
public function hasProperty($prop)
public function getPropertyValue($name)
public function fill($values)
public function reset(...$properties)
protected function resetExcept(...$properties)
public function pull($properties = null)
public function toArray()
```