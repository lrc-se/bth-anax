<?php
/**
 * Add and configure services and return the $app object.
 */

// Add all resources to $app
$app = new \LRC\App\App();
$app->request = new \Anax\Request\Request();
$app->response = new \Anax\Response\Response();
$app->url = new \Anax\Url\Url();
$app->router = new \Anax\Route\RouterInjectable();
$app->view = new \Anax\View\ViewContainer();
$app->textfilter = new \Anax\TextFilter\TextFilter();
$app->session = new \Anax\Session\SessionConfigurable();
$app->navbar = new \LRC\Navbar\Navbar($app);

// MVC infrastructure
$app->content = new \LRC\App\ContentService($app->textfilter);
$app->contentController = new \LRC\App\ContentController($app);
$app->user = new \LRC\User\UserService();
$app->userController = new \LRC\User\UserController($app);
$app->rem = new \LRC\Rem\RemServer();
$app->remController = new \LRC\Rem\RemController($app);
$app->comments = new \LRC\Comment\CommentService();
$app->commentController = new \LRC\Comment\CommentController($app);

// Configure request
$app->request->init();

// Configure router
$app->router->setApp($app);

// Configure session
$app->session->configure('session.php');
$app->session->start();

// Configure url
$app->url->setSiteUrl($app->request->getSiteUrl());
$app->url->setBaseUrl($app->request->getBaseUrl());
$app->url->setStaticSiteUrl($app->request->getSiteUrl());
$app->url->setStaticBaseUrl($app->request->getBaseUrl());
$app->url->setScriptName($app->request->getScriptName());
$app->url->configure('url.php');
$app->url->setDefaultsFromConfiguration();

// Configure view
$app->view->setApp($app);
$app->view->configure('view.php');

// Configure user service
$app->user->inject(['session' => $app->session]);
$app->user->mock();

// Configure REM server
$app->rem->configure('remserver.php');
$app->rem->inject(['session' => $app->session]);

// Configure comment system
$app->comments->configure('comments.php');
$app->comments->inject([
    'session' => $app->session,
    'user' => $app->user
]);

// Configure navbar
$app->navbar->configure('navbar.php');

// Return the populated $app
return $app;
