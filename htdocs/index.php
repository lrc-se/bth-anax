<?php
/**
 * Bootstrap the framework and handle the request.
 */

// Were are all the files?
define('ANAX_INSTALL_PATH', realpath(__DIR__ . '/..'));
define('ANAX_APP_PATH', ANAX_INSTALL_PATH);

// Include essentials
require ANAX_INSTALL_PATH . '/config/error_reporting.php';

// Get the autoloader by using composers version.
require ANAX_INSTALL_PATH . '/vendor/autoload.php';

// Add all services to DI container
//$app = require ANAX_INSTALL_PATH . '/config/service.php';
$di = new \Anax\DI\DIFactoryConfigMagic('di.php');

// Start session
$di->session->start();

// Load the routes
//require ANAX_INSTALL_PATH . '/config/route.php';

// Leave to router to match incoming request to routes
$di->router->handle($di->request->getRoute(), $di->request->getMethod());
