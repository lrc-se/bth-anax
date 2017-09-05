<?php

namespace LRC\App;

/**
 * Base class for controllers.
 */
class BaseController
{
    protected $app;
    
    function __construct($app)
    {
        $this->app = $app;
    }
}
