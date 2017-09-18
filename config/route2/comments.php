<?php
/**
 * Routes for comments.
 */

return [
    'routes' => [
        [
            'info' => 'Get comment text.',
            'requestMethod' => 'get',
            'path' => 'get/{id:digit}',
            'callable' => ['commentController', 'get']
        ],
        [
            'info' => 'Create new comment.',
            'requestMethod' => 'post',
            'path' => 'create',
            'callable' => ['commentController', 'create']
        ],
        [
            'info' => 'Upsert/replace a comment.',
            'requestMethod' => 'post',
            'path' => 'update/{id:digit}',
            'callable' => ['commentController', 'update']
        ],
        [
            'info' => 'Delete a comment.',
            'requestMethod' => 'post',
            'path' => 'delete/{id:digit}',
            'callable' => ['commentController', 'delete']
        ]
    ]
];
