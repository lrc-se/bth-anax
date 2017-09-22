<?php
/**
 * Admin routes.
 */

return [
    'routes' => [
        [
            'info' => 'Admin page.',
            'requestMethod' => 'get',
            'path' => '',
            'callable' => ['adminController', 'index']
        ],
        [
            'info' => 'Admin user list.',
            'requestMethod' => 'get',
            'path' => 'user',
            'callable' => ['adminController', 'users']
        ],
        [
            'info' => 'Admin user create.',
            'requestMethod' => 'get',
            'path' => 'user/create',
            'callable' => ['adminController', 'createUser']
        ],
        [
            'info' => 'Admin user create handler.',
            'requestMethod' => 'post',
            'path' => 'user/create',
            'callable' => ['adminController', 'handleCreateUser']
        ],
        [
            'info' => 'Admin user profile edit.',
            'requestMethod' => 'get',
            'path' => 'user/edit/{id:digit}',
            'callable' => ['adminController', 'updateUser']
        ],
        [
            'info' => 'Admin user profile edit handler.',
            'requestMethod' => 'post',
            'path' => 'user/edit/{id:digit}',
            'callable' => ['adminController', 'handleUpdateUser']
        ],
        [
            'info' => 'Admin user delete.',
            'requestMethod' => 'get',
            'path' => 'user/delete/{id:digit}',
            'callable' => ['adminController', 'deleteUser']
        ],
        [
            'info' => 'Admin user delete handler.',
            'requestMethod' => 'post',
            'path' => 'user/delete/{id:digit}',
            'callable' => ['adminController', 'handleDeleteUser']
        ],
        [
            'info' => 'Admin user restore handler.',
            'requestMethod' => 'get',
            'path' => 'user/restore/{id:digit}',
            'callable' => ['adminController', 'handleRestoreUser']
        ],
        [
            'info' => 'Admin user de-anonymization.',
            'requestMethod' => 'get',
            'path' => 'user/register/{id:digit}',
            'callable' => ['adminController', 'registerUser']
        ],
        [
            'info' => 'Admin user de-anonymization handler.',
            'requestMethod' => 'post',
            'path' => 'user/register/{id:digit}',
            'callable' => ['adminController', 'handleRegisterUser']
        ],
        [
            'info' => 'Admin comment list.',
            'requestMethod' => 'get',
            'path' => 'comment',
            'callable' => ['adminController', 'comments']
        ]
    ]
];
