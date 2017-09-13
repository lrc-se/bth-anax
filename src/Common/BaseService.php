<?php

namespace LRC\Common;

/**
 * Base class for services.
 *
 * @SuppressWarnings(PHPMD.ShortVariables)
 */
class BaseService
{
    /**
     * @var \Anax\DI\DIInterface    DI container.
     */
    protected $di;
    
    
    /**
     * Constructor.
     *
     * @param DIInterface   $di     DI container reference.
     */
    public function __construct($di = null)
    {
        $this->di = ($di ?: new DISimple());
    }
    
    
    /**
     * Inject dependencies.
     * 
     * @param array $dependencies   Array of dependencies to inject.
     *
     * @return self
     */
    public function inject($dependencies)
    {
        foreach ($dependencies as $name => $dep) {
            $this->di->setShared($name, $dep);
        }
        return $this;
    }
}
