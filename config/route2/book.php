<?php
/**
 * Routes for book CRUD example.
 */

return [
    'routes' => [
        [
            'info' => 'Show all books.',
            'requestMethod' => 'get',
            'path' => '',
            'callable' => ['bookController', 'index']
        ],
        [
            'info' => 'Show one book.',
            'requestMethod' => 'get',
            'path' => '{id:digit}',
            'callable' => ['bookController', 'get']
        ],
        [
            'info' => 'Create a new book.',
            'requestMethod' => 'get|post',
            'path' => 'create',
            'callable' => ['bookController', 'create']
        ],
        [
            'info' => 'Update a book.',
            'requestMethod' => 'get|post',
            'path' => 'edit/{id:digit}',
            'callable' => ['bookController', 'update']
        ],
        [
            'info' => 'Delete a book.',
            'requestMethod' => 'get|post',
            'path' => 'delete/{id:digit}',
            'callable' => ['bookController', 'delete']
        ]
    ]
];
