<?php

namespace LRC\App;

/**
 * Base class for controllers.
 */
class BaseController
{
    /**
     * @var App     Reference to framework app.
     */
    protected $app;
    
    /**
     * Constructor.
     * 
     * @param App   $app    Reference to framework app.
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
}
