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
        ],
        [
            'info' => 'Admin page.',
            'requestMethod' => 'get',
            'path' => 'admin',
            'callable' => ['userController', 'admin']
        ],
        [
            'info' => 'Admin user list.',
            'requestMethod' => 'get',
            'path' => 'admin/user',
            'callable' => ['userController', 'users']
        ],
        [
            'info' => 'Admin user create.',
            'requestMethod' => 'get',
            'path' => 'admin/user/create',
            'callable' => ['userController', 'adminCreate']
        ],
        [
            'info' => 'Admin user create handler.',
            'requestMethod' => 'post',
            'path' => 'admin/user/create',
            'callable' => ['userController', 'handleAdminCreate']
        ],
        [
            'info' => 'Admin user profile edit.',
            'requestMethod' => 'get',
            'path' => 'admin/user/edit/{id:digit}',
            'callable' => ['userController', 'adminUpdate']
        ],
        [
            'info' => 'Admin user profile edit handler.',
            'requestMethod' => 'post',
            'path' => 'admin/user/edit/{id:digit}',
            'callable' => ['userController', 'handleAdminUpdate']
        ],
        [
            'info' => 'Admin user delete.',
            'requestMethod' => 'get',
            'path' => 'admin/user/delete/{id:digit}',
            'callable' => ['userController', 'adminDelete']
        ],
        [
            'info' => 'Admin user delete handler.',
            'requestMethod' => 'post',
            'path' => 'admin/user/delete/{id:digit}',
            'callable' => ['userController', 'handleAdminDelete']
        ],
        [
            'info' => 'Admin user restore handler.',
            'requestMethod' => 'get',
            'path' => 'admin/user/restore/{id:digit}',
            'callable' => ['userController', 'handleAdminRestore']
        ],
        [
            'info' => 'Admin user de-anonymization.',
            'requestMethod' => 'get',
            'path' => 'admin/user/register/{id:digit}',
            'callable' => ['userController', 'adminRegister']
        ],
        [
            'info' => 'Admin user de-anonymization handler.',
            'requestMethod' => 'post',
            'path' => 'admin/user/register/{id:digit}',
            'callable' => ['userController', 'handleAdminRegister']
        ],
        [
            'info' => 'Admin comment list.',
            'requestMethod' => 'get',
            'path' => 'admin/comment',
            'callable' => ['userController', 'comments']
        ]
    ]
];
