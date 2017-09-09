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

$user = $this->app->user->getCurrent();
if ($user) {
    $navbar['items']['user']['title'] .= ' <span class="navbar-user">(<span>' . $user['username'] . '</span>)</span>';
}

return $navbar;
