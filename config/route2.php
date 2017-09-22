<?php

/**
 * Config file for routes.
 */

return [
    'routeFiles' => [
        [
            'mount' => null,
            'file' => __DIR__ . '/route2/internal.php'
        ],
        [
            'mount' => null,
            'file' => __DIR__ . '/route2/flat-file-content.php'
        ],
        [
            'mount' => 'rem/api',
            'file' => __DIR__ . '/route2/remserver.php'
        ],
        [
            'mount' => 'comment',
            'file' => __DIR__ . '/route2/comments.php'
        ],
        [
            'mount' => 'user',
            'file' => __DIR__ . '/route2/user.php'
        ],
        [
            'mount' => 'admin',
            'file' => __DIR__ . '/route2/admin.php'
        ],
        [
            'mount' => 'book',
            'file' => __DIR__ . '/route2/book.php'
        ],
        [
            'mount' => null,
            'file' => __DIR__ . '/route2/404.php'
        ]
    ]
];
