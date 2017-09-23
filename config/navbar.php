<?php

/**
 * Config file for navbar.
 */

// main routes
$navbar = [
    'items' => [
        'start' => [
            'title' => 'Start',
            'route' => ''
        ],
        'about' => [
            'title' => 'Om',
            'route' => 'about'
        ],
        'tasks' => [
            'title' => 'Uppgifter',
            'route' => null,
            'items' => [
                [
                    'title' => 'REM-server',
                    'route' => 'rem'
                ],
                [
                    'title' => 'Böcker',
                    'route' => 'book'
                ]
            ]
        ],
        'report' => [
            'title' => 'Redovisning',
            'route' => 'report'
        ],
        'user' => [
            'title' => 'Användare',
            'route' => null
        ]
    ]
];

// handle logged-in user, if any
try {
    $user = $this->di->user->getCurrent();
} catch (Exception $ex) {
    $user = null;
}
if ($user) {
    $navbar['items']['user']['title'] .= ' <span class="navbar-user">(<span>' . htmlspecialchars($user->username) . '</span>)</span>';
    $navbar['items']['user']['items'] = [
        [
            'title' => 'Profil',
            'route' => 'user/profile'
        ]
    ];
    if ($user->admin) {
        $navbar['items']['user']['items'][] = [
            'title' => 'Administration',
            'route' => 'admin'
        ];
    }
    $navbar['items']['user']['items'][] = [
        'title' => 'Logga ut',
        'route' => 'user/logout'
    ];
} else {
    $navbar['items']['user']['items'] = [
        [
            'title' => 'Registrera ny',
            'route' => 'user/profile/create'
        ],
        [
            'title' => 'Logga in',
            'route' => 'user/login'
        ]
    ];
}

return $navbar;
