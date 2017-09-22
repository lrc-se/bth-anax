<?php

namespace LRC\Form;

/**
 * Data-bound model form.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class ModelForm
{
    /**
     * @var string  Form ID.
     */
    public $id;
    
    /**
     * @var mixed   Model instance to bind to.
     */
    private $model;
    
    /**
     * @var array   Array of form parameters not bound to the model and their values.
     */
    private $extra;
    
    /**
     * @var array   Array of validation errors according to the bound model's rules (attribute => error).
     */
    private $errors;
    
    
    /**
     * Constructor.
     *
     * @param string    $id     Form ID.
     * @param mixed     $model  Model instance or class to instantiate.
     */
    public function __construct($id, $model = null)
    {
        $this->id = $id;
        $this->model = (is_object($model) ? $model : (!is_null($model) ? new $model() : null));
        $this->extra = [];
        $this->errors = [];
    }
    
    
    /**
     * Return the bound model.
     *
     * @return mixed    Model instance.
     */
    public function getModel()
    {
        return $this->model;
    }
    
    
    /**
     * Return form field value not bound to the model.
     *
     * @param string $param     Form parameter name.
     * @param mixed  $default   Default value if the parameter is not found.
     *
     * @return mixed            Parameter value, or the default value if the parameter is not found.
     */
    public function getExtra($param, $default = null)
    {
        return (array_key_exists($param, $this->extra) ? $this->extra[$param] : $default);
    }
    
    
    /**
     * Populate the bound model from form data.
     *
     * @param array $include    Array of model properties to include in binding.
     * @param array $exclude    Array of model properties to exclude from binding.
     * @param array $source     Data source (defaults to $_POST).
     *
     * @return mixed            The populated model.
     */
    public function populateModel($include = null, $exclude = null, $source = null)
    {
        // determine which properties to bind
        $props = (is_array($include) ? $include : array_keys(get_object_vars($this->model)));
        if (is_array($exclude)) {
            $props = array_diff($props, $exclude);
        }
        
        // bind properties from provided data source
        if (is_null($source)) {
            $source = $_POST;
        }
        foreach ($source as $param => $value) {
            if (in_array($param, $props)) {
                // save model property
                if ($value === '' && $this->model->isNullable($param)) {
                    $value = null;
                }
                $this->model->$param = $value;
            } else {
                // save extraneous parameter
                $this->extra[$param] = $value;
            }
        }
        
        return $this->model;
    }
    
    
    /**
     * Validate bound model and retrieve validation errors, if any.
     */
    public function validate()
    {
        if ($this->model->isValid()) {
            $this->errors = [];
        } else {
            $this->errors = array_merge($this->errors, $this->model->getValidationErrors());
        }
    }
    
    
    /**
     * Check whether the form is considered valid (does not perform active validation).
     *
     * @return bool     True if no model validation errors have been retrieved, false otherwise.
     */
    public function isValid()
    {
        return empty($this->errors);
    }
    
    
    /**
     * Check whether a specific model property has a retrieved validation error (does not perform active validation).
     *
     * @param string $prop  Model property.
     *
     * @return bool         True if the property has an associated error, false otherwise.
     */
    public function hasError($prop)
    {
        return isset($this->errors[$prop]);
    }
    
    
    /**
     * Get retrieved validation error for a specific model property (does not perform active validation).
     *
     * @param string $prop  Model property.
     *
     * @return string|null  Error message, or null if the property has no associated error.
     */
    public function getError($prop)
    {
        return (isset($this->errors[$prop]) ? $this->errors[$prop] : null);
    }
    
    
    /**
     * Get all retrieved validation errors (does not perform active validation).
     *
     * @return array    Array of model validation errors (property => error).
     */
    public function getErrors()
    {
        return $this->errors;
    }
    
    
    /**
     * Add validation error to retrieved error list.
     *
     * @param string $prop      Model property.
     * @param string $message   Error message.
     */
    public function addError($prop, $message)
    {
        if (empty($this->errors[$prop])) {
            $this->errors[$prop] = $message;
        } else {
            $this->errors[$prop] .= " $message";
        }
    }
    
    
    // === FORM ELEMENTS === //
        
    /**
     * Generate opening <form> tag.
     *
     * @param   string  $action     Action URL.
     * @param   string  $method     Action request method.
     * @param   array   $attrs      Array of HTML attributes and their values.
     *
     * @return  string              Generated HTML.
     */
    public function form($action = '', $method = 'post', $attrs = [])
    {
        $attrs['action'] = $action;
        $attrs['method'] = $method;
        return '<form ' . $this->getAttributeString(null, $attrs, false) . '>';
    }
    
    
    /**
     * Generate data-bound <input> element (general).
     *
     * @param   string  $prop   Bound model property.
     * @param   string  $type   Input type.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function input($prop, $type, $attrs = [])
    {
        $attrs['type'] = $type;
        if ($type != 'checkbox' && $type != 'radio') {
            $attrs['value'] = (strtolower($type) != 'password' ? htmlspecialchars($this->getModelValue($prop)) : '');
        }
        return '<input ' . $this->getAttributeString($prop, $attrs) . '>';
    }
    
    
    /**
     * Generate data-bound text field element (shorthand).
     *
     * @param   string  $prop   Bound model property.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function text($prop, $attrs = [])
    {
        return $this->input($prop, 'text', $attrs);
    }
    
    
    /**
     * Generate data-bound checkbox element.
     *
     * @param   string  $prop   Bound model property.
     * @param   string  $value  Parameter value.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function checkbox($prop, $value, $attrs = [])
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = $value;
        $attrs['checked'] = (bool)$this->getModelValue($prop);
        return $this->input($prop, 'checkbox', $attrs);
    }
    
    
    /**
     * Generate data-bound radio button element.
     *
     * @param   string  $prop   Bound model property.
     * @param   string  $value  Parameter value.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function radio($prop, $value, $attrs = [])
    {
        $attrs['type'] = 'radio';
        $attrs['value'] = $value;
        $attrs['checked'] = (bool)$this->getModelValue($prop);
        return $this->input($prop, 'radio', $attrs);
    }
    
    
    /**
     * Generate data-bound <textarea> element.
     *
     * @param   string  $prop   Bound model property.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function textarea($prop, $attrs = [])
    {
        return '<textarea ' . $this->getAttributeString($prop, $attrs) . '>' . htmlspecialchars($this->getModelValue($prop)) . '</textarea>';
    }
    
    
    /**
     * Generate label for bound form field.
     *
     * @param   string  $prop   Bound model property.
     * @param   string  $text   Label text.
     * @param   array   $attrs  Array of HTML attributes and their values.
     *
     * @return  string          Generated HTML.
     */
    public function label($prop, $text, $attrs = [])
    {
        $attrs['for'] = $this->id . '-' . $prop;
        return '<label ' . $this->getAttributeString($prop, $attrs, false) . ">$text</label>";
    }
    
    // === ********** === //
    
    
    /**
     * Generate HTML attribute code.
     *
     * @param   string  $prop       Bound model property.
     * @param   array   $attrs      Array of HTML attributes and their values.
     * @param   bool    $isField    Whether the attributes apply to a form field or not.
     *
     * @return  string          Generated HTML.
     */
    private function getAttributeString($prop, $attrs, $isField = true)
    {
        if ($isField) {
            $attrs['id'] = $this->id . '-' . $prop;
            $attrs['name'] = $prop;
        }
        if (!is_null($prop) && isset($this->errors[$prop])) {
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
    
    
    /**
     * Return value for bound model property.
     *
     * @param string $prop  Model property.
     *
     * @return mixed        Property value, or null if the bound model does not include the property.
     */
    private function getModelValue($prop)
    {
        if (!is_null($this->model) && isset($this->model->$prop)) {
            return $this->model->$prop;
        }
        return null;
    }
}
