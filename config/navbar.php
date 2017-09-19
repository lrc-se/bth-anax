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
$user = $this->di->user->getCurrent();
if ($user) {
    $navbar['items']['user']['title'] .= ' <span class="navbar-user">(<span>' . $this->di->common->esc($user->username) . '</span>)</span>';
    $navbar['items']['user']['items'] = [
        [
            'title' => 'Profil',
            'route' => 'user/start'
        ],
        [
            'title' => 'Logga ut',
            'route' => 'user/logout'
        ]
    ];
} else {
    $navbar['items']['user']['items'] = [
        [
            'title' => 'Skapa ny',
            'route' => 'user/create'
        ],
        [
            'title' => 'Logga in',
            'route' => 'user/start'
        ]
    ];
}

return $navbar;
