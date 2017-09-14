<?php
/**
 * User routes.
 */

return [
    'routes' => [
        [
            'info' => 'Login page.',
            'requestMethod' => 'get',
            'path' => '',
            'callable' => ['userController', 'login']
        ],
        [
            'info' => 'Login handler.',
            'requestMethod' => 'post',
            'path' => 'login',
            'callable' => ['userController', 'handleLogin']
        ],
        [
            'info' => 'Logout handler.',
            'requestMethod' => 'post',
            'path' => 'logout',
            'callable' => ['userController', 'handleLogout']
        ]
    ]
];
