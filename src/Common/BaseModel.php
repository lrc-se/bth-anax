<?php

namespace LRC\Common;

/**
 * Base class for models.
 */
class BaseModel
{
    /**
     * @var array   Array of nullable attributes.
     */
    protected $nullables;
    
    
    /**
     * Set nullable attributes.
     *
     * @param array $attrs  Attribute names.
     */
    protected function setNullables($attrs)
    {
        $this->nullables = $attrs;
    }
    
    
    /**
     * Return whether an attribute is nullable.
     *
     * @param string $attr  Attribute name.
     *
     * @return bool         True if the attribute is nullable, false otherwise.
     */
    public function isNullable($attr)
    {
        return in_array($attr, $this->nullables);
    }
    
    
    /**
     * Retrieve a reference by foreign key.
     *
     * @param string                    $attr       Name of foreign key attribute.
     * @param \LRC\Database\Repository  $repository Repository to query.
     *
     * @return mixed                                Model instance if found, null otherwise.
     */
    public function getReference($attr, $repository)
    {
        return (isset($this->$attr) ? $repository->find('id', $this->$attr) : null);
    }
}
