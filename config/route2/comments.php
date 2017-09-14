<?php
/**
 * Routes for comments.
 */

return [
    'routes' => [
        [
            'info' => 'Get comment text.',
            'requestMethod' => 'get',
            'path' => 'get/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'get']
        ],
        [
            'info' => 'Create new comment.',
            'requestMethod' => 'post',
            'path' => 'create/{contentId:alphanum}',
            'callable' => ['commentController', 'create']
        ],
        [
            'info' => 'Upsert/replace a comment.',
            'requestMethod' => 'post',
            'path' => 'update/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'update']
        ],
        [
            'info' => 'Delete a comment.',
            'requestMethod' => 'post',
            'path' => 'delete/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'delete']
        ]
    ]
];
