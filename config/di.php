<?php
/**
 * Config file for DI container.
 */

// add primary services
$config = [
    'services' => [
        // core
        'request' => [
            'shared' => true,
            'callback' => function () {
                $request = new \Anax\Request\Request();
                $request->init();
                return $request;
            }
        ],
        'response' => [
            'shared' => true,
            'callback' => '\Anax\Response\Response'
        ],
        'url' => [
            'shared' => true,
            'callback' => function () {
                $req = $this->request;
                $url = new \Anax\Url\Url();
                $url->setSiteUrl($req->getSiteUrl());
                $url->setBaseUrl($req->getBaseUrl());
                $url->setStaticSiteUrl($req->getSiteUrl());
                $url->setStaticBaseUrl($req->getBaseUrl());
                $url->setScriptName($req->getScriptName());
                $url->configure('url.php');
                $url->setDefaultsFromConfiguration();
                return $url;
            }
        ],
        'router' => [
            'shared' => true,
            'callback' => function () {
                $router = new \Anax\Route\Router();
                $router->configure('route2.php');
                $router->setDI($this);
                return $router;
            }
        ],
        'view' => [
            'shared' => true,
            'callback' => function () {
                $view = new \Anax\View\ViewCollection();
                $view->configure('view.php');
                $view->setDI($this);
                return $view;
            }
        ],
        'viewRenderFile' => [
            'shared' => true,
            'callback' => function () {
                $viewRender = new \Anax\View\ViewRenderFile2();
                $viewRender->setDI($this);
                return $viewRender;
            }
        ],
        'session' => [
            'shared' => true,
            'callback' => function () {
                $session = new \Anax\Session\SessionConfigurable();
                $session->configure('session.php');
                return $session;
            }
        ],
        'textfilter' => [
            'shared' => true,
            'callback' => '\Anax\TextFilter\TextFilter',
        ],
        
        // extensions
        'common' => [
            'shared' => true,
            'callback' => function () {
                return new \LRC\Common\CommonService($this);
            }
        ],
        'navbar' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\Navbar\Navbar($this))
                    ->configure('navbar.php');
            }
        ],
        'content' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\Content\ContentService())
                    ->inject(['textfilter' => $this->textfilter]);
            }
        ],
        'user' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\User\UserService())
                    ->inject(['session' => $this->session]);
            }
        ],
        'rem' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\Rem\RemServer())
                    ->configure('remserver.php')
                    ->inject(['session' => $this->session]);
            }
        ],
        'comments' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\Comment\CommentService())
                    ->configure('comments.php')
                    ->inject([
                        'session' => $this->session,
                        'user' => $this->user
                    ]);
            }
        ]
    ]
];


// register controllers
$controllers = [
    'content' => 'Content\Content',
    'error' => 'Content\Error',
    'rem' => 'Rem\Rem',
    'comment' => 'Comment\Comment',
    'user' => 'User\User'
];

foreach ($controllers as $key => $controller) {
    $class = ($controller[0] != '\\' ? "\\LRC\\$controller" : $controller) . 'Controller';
    $config['services']["{$key}Controller"] = [
        'shared' => true,
        'callback' => function () use ($class) {
            return new $class($this);
        }
    ];
}


return $config;
