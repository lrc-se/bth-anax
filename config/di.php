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
                return (new \Anax\Request\Request())
                    ->init();
            }
        ],
        'response' => [
            'shared' => true,
            'callback' => '\Anax\Response\Response'
        ],
        'url' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\Url\Url())
                    ->setSiteUrl($this->request->getSiteUrl())
                    ->setBaseUrl($this->request->getBaseUrl())
                    ->setStaticSiteUrl($this->request->getSiteUrl())
                    ->setStaticBaseUrl($this->request->getBaseUrl())
                    ->setScriptName($this->request->getScriptName())
                    ->configure('url.php')
                    ->setDefaultsFromConfiguration();
            }
        ],
        'router' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\Route\Router())
                    ->configure('route2.php')
                    ->setDI($this);
            }
        ],
        'view' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\View\ViewCollection())
                    ->configure('view.php')
                    ->setDI($this);
            }
        ],
        'viewRenderFile' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\View\ViewRenderFile2())
                    ->setDI($this);
            }
        ],
        'session' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\Session\SessionConfigurable())
                    ->configure('session.php');
            }
        ],
        'textfilter' => [
            'shared' => true,
            'callback' => '\Anax\TextFilter\TextFilter',
        ],
        'db' => [
            'shared' => true,
            'callback' => function () {
                return (new \Anax\Database\DatabaseQueryBuilder())
                    ->configure('db.php');
            }
        ],
        'repository' => [
            'shared' => true,
            'callback' => function () {
                return (new \LRC\Database\RepositoryService())
                    ->inject(['db' => $this->db])
                    ->configure('repositories.php');
            }
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
                    ->inject([
                        'session' => $this->session,
                        'users' => $this->repository->users
                    ]);
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
    'user' => 'User\User',
    'book' => 'Book\Book'
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
