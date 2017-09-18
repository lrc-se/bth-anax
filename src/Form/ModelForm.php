<?php

namespace LRC\Form;

/**
 * Data-bound model form.
 */
class ModelForm
{
    public $id;
    private $model;
    private $errors;
    
    
    public function __construct($id, $model = null)
    {
        $this->id = $id;
        $this->model = (is_object($model) ? $model : (!is_null($model) ? new $model() : null));
        $this->errors = [];
    }
    
    
    public function getModel()
    {
        return $this->model;
    }
    
    
    public function populateModel($getter, $include = null, $exclude = null)
    {
        // determine which properties to bind
        $props = (is_array($include) ? $include : array_keys(get_object_vars($this->model)));
        if (is_array($exclude)) {
            $props = array_diff($props, $exclude);
        }
        
        // bind properties from provided data source
        foreach ($props as $prop) {
            $value = $getter($prop);
            if ($value === '' && $this->model->isNullable($prop)) {
                $value = null;
            }
            $this->model->$prop = $value;
        }
        
        return $this->model;
    }
    
    
    public function validate()
    {
        if ($this->model->isValid()) {
            $this->errors = [];
        } else {
            $this->errors = array_merge($this->errors, $this->model->getValidationErrors());
        }
    }
    
    
    public function isValid()
    {
        return empty($this->errors);
    }
    
    
    public function getError($prop)
    {
        return (isset($this->errors[$prop]) ? $this->errors[$prop] : null);
    }
    
    
    public function getErrors()
    {
        return $this->errors;
    }
    
    
    public function hasError($prop)
    {
        return isset($this->errors[$prop]);
    }
    
    
    public function addError($prop, $message)
    {
        if (empty($this->errors[$prop])) {
            $this->errors[$prop] = $message;
        } else {
            $this->errors[$prop] .= " $message";
        }
    }
    
    
    public function input($prop, $type, $attrs = [])
    {
        $attrs['type'] = $type;
        $attrs['value'] = (strtolower($type) != 'password' ? htmlspecialchars($this->getModelValue($prop)) : '');
        return '<input ' . $this->getAttributeString($prop, $attrs) . '>';
    }
    
    
    public function textfield($prop, $attrs = [], $type = 'text')
    {
        return $this->input($prop, $type, $attrs);
    }
    
    
    public function checkbox($prop, $value, $attrs = [])
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = $value;
        $attrs['checked'] = (bool)$this->getModelValue($prop);
        return $this->input($prop, 'checkbox', $attrs);
    }
    
    
    public function radio($prop, $value, $attrs = [])
    {
        $attrs['type'] = 'radio';
        $attrs['value'] = $value;
        $attrs['checked'] = (bool)$this->getModelValue($prop);
        return $this->input($prop, 'radio', $attrs);
    }
    
    
    public function textarea($prop, $attrs = [])
    {
        return '<textarea ' . $this->getAttributeString($prop, $attrs) . '></textarea>';
    }
    
    
    public function label($prop, $text, $attrs = [])
    {
        $attrs['for'] = $this->id . '-' . $prop;
        return '<label ' . $this->getAttributeString($prop, $attrs, false) . ">$text</label>";
    }
    
    
    private function getAttributeString($prop, $attrs, $isField = true)
    {
        if ($isField) {
            $attrs['id'] = $this->id . '-' . $prop;
            $attrs['name'] = $prop;
        }
        if (isset($this->errors[$prop])) {
            $attrs['class'] = (empty($attrs['class']) ? 'has-error' : $attrs['class'] . ' has-error');
        }
        $res = [];
        foreach ($attrs as $attr => $val) {
            if (!is_bool($val)) {
                $res[] = $attr . '="' . htmlspecialchars($val) . '"';
            } elseif ($val === true) {
                $res[] = $attr;
            }
        }
        return implode(' ', $res);
    }
    
    
    private function getModelValue($prop)
    {
        return (!is_null($this->model) ? $this->model->$prop : null);
    }
}
