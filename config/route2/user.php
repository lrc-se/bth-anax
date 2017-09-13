<?php
/**
 * User routes.
 */

return [
    'routes' => [
        [
            'info' => 'Login page.',
            'requestMethod' => 'get',
            'path' => 'user',
            'callable' => ['userController', 'login'],
        ],
        [
            'info' => 'Login handler.',
            'requestMethod' => 'post',
            'path' => 'user/login',
            'callable' => ['userController', 'handleLogin'],
        ],
        [
            'info' => 'Logout handler.',
            'requestMethod' => 'post',
            'path' => 'user/logout',
            'callable' => ['userController', 'handleLogout'],
        ]
    ]
];
