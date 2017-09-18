<?php
/**
 * Config file for repositories.
 */

return [

    'repositories' => [
        'books' => [
            'table' => 'book',
            'model' => '\\LRC\\Book\\Book'
        ],
        'users' => [
            'table' => 'user',
            'model' => '\\LRC\\User\\User'
        ],
        'comments' => [
            'table' => 'comment',
            'model' => '\\LRC\Comment\\Comment'
        ]
    ]

];
