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
            'route' => 'user'
        ]
    ]
];

// handle logged-in user, if any
$user = $this->di->user->getCurrent();
if ($user) {
    $navbar['items']['user']['title'] .= ' <span class="navbar-user">(<span>' . $this->di->common->esc($user->username) . '</span>)</span>';
}

return $navbar;
