<?php
/**
 * User routes.
 */

return [
    'routes' => [
        [
            'info' => 'Login/profile page.',
            'requestMethod' => 'get',
            'path' => 'start',
            'callable' => ['userController', 'index']
        ],
        [
            'info' => 'Login handler.',
            'requestMethod' => 'post',
            'path' => 'login',
            'callable' => ['userController', 'handleLogin']
        ],
        [
            'info' => 'Logout handler.',
            'requestMethod' => 'get',
            'path' => 'logout',
            'callable' => ['userController', 'handleLogout']
        ]
    ]
];
