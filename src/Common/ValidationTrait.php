<?php

namespace LRC\Common;

/**
 * Model validation.
 */
trait ValidationTrait
{
    private $validationRules;
    private $validationErrors;
    
    
    public function setValidation($rules)
    {
        $this->validationRules = $rules;
    }
    
    
    public function isValid()
    {
        $this->validate();
        return empty($this->validationErrors);
    }
    
    
    public function getValidationErrors()
    {
        $this->validate();
        return $this->validationErrors;
    }
    
    
    private function validate()
    {
        $this->validationErrors = [];
        foreach ($this->validationRules as $attr => $rules) {
            foreach ($rules as $rule) {
                $passed = true;
                if ($rule['rule'] == 'required') {
                    $passed = $this->hasValue($attr);
                } elseif ($this->hasValue($attr)) {
                    $passed = $this->validateRule($rule, $attr);
                }
                if (!$passed) {
                    $this->validationErrors[$attr] = $rule['message'];
                }
            }
        }
    }
    
    
    private function validateRule($rule, $attr)
    {
        switch ($rule['rule']) {
            case 'number':
                $passed = is_numeric($this->$attr);
                break;
            case 'minlength':
                $passed = (mb_strlen($this->$attr) >= $rule['value']);
                break;
            case 'maxlength':
                $passed = (mb_strlen($this->$attr) <= $rule['value']);
                break;
            case 'email':
                $passed = (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}/', $this->$attr) == 1);
                break;
            case 'custom':
                $passed = $rule['value']($attr, $this->$attr);
                break;
            default:
                $passed = false;
        }
        return $passed;
    }
    
    
    private function hasValue($attr)
    {
        return (isset($this->$attr) && $this->$attr !== '');
    }
}
