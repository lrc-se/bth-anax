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
                $this->validateRule($rule, $attr);
            }
        }
    }
    
    private function validateRule($rule, $attr)
    {
        switch ($rule['rule']) {
            case 'required':
                $passed = isset($this->$attr);
                break;
            case 'number':
                $passed = (empty($this->$attr) || is_numeric($this->$attr));
                break;
            case 'maxlength':
                $passed = (mb_strlen($this->$attr) <= $rule['value']);
                break;
            case 'custom':
                if (isset($rule['value'])) {
                    $passed = $rule['value']($attr, $this->$attr, $rule['value']);
                } else {
                    $passed = $rule['value']($attr, $this->$attr);
                }
                break;
            default:
                $passed = false;
        }
        if (!$passed) {
            $this->validationErrors[$attr] = $rule['message'];
        }
    }
}