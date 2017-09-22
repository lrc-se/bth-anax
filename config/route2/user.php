<?php
/**
 * User routes.
 */

return [
    'routes' => [
        [
            'info' => 'Profile page.',
            'requestMethod' => 'get',
            'path' => 'profile',
            'callable' => ['userController', 'profile']
        ],
        [
            'info' => 'Registration page.',
            'requestMethod' => 'get',
            'path' => 'profile/create',
            'callable' => ['userController', 'create']
        ],
        [
            'info' => 'Registration handler.',
            'requestMethod' => 'post',
            'path' => 'profile/create',
            'callable' => ['userController', 'handleCreate']
        ],
        [
            'info' => 'Edit profile page.',
            'requestMethod' => 'get',
            'path' => 'profile/edit/{id:digit}',
            'callable' => ['userController', 'update']
        ],
        [
            'info' => 'Profile edit handler.',
            'requestMethod' => 'post',
            'path' => 'profile/edit/{id:digit}',
            'callable' => ['userController', 'handleUpdate']
        ],
        [
            'info' => 'Login page.',
            'requestMethod' => 'get',
            'path' => 'login',
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
            'requestMethod' => 'get',
            'path' => 'logout',
            'callable' => ['userController', 'handleLogout']
        ]
    ]
];
