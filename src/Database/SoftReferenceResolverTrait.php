<?php

namespace LRC\Database;

/**
 * Soft-deletion-aware foreign-key reference resolution.
 */
trait SoftReferenceResolverTrait
{
    /**
     * Retrieve a reference by foreign key.
     *
     * @param string                    $attr       Name of foreign key attribute.
     * @param SoftRepositoryInterface   $repository Repository to query.
     * @param bool                      $soft       Whether to take soft-deletion into account.
     *
     * @return mixed                                Model instance if found, null otherwise.
     */
    public function getReference($attr, $repository, $soft = true)
    {
        if (isset($this->$attr)) {
            $method = ($soft ? 'findSoft' : 'find');
            return ($repository->$method('id', $this->$attr) ?: null);
        }
        return null;
    }
}