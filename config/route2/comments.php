<?php
/**
 * Routes for comments.
 */

return [
    'routes' => [
        [
            'info' => 'Get comment text.',
            'requestMethod' => 'get',
            'path' => 'comment/get/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'get']
        ],
        [
            'info' => 'Create new comment.',
            'requestMethod' => 'post',
            'path' => 'comment/create/{contentId:alphanum}',
            'callable' => ['commentController', 'create']
        ],
        [
            'info' => 'Upsert/replace a comment.',
            'requestMethod' => 'post',
            'path' => 'comment/update/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'update']
        ],
        [
            'info' => 'Delete a comment.',
            'requestMethod' => 'post',
            'path' => 'comment/delete/{contentId:alphanum}/{commentId:digit}',
            'callable' => ['commentController', 'delete']
        ]
    ]
];
