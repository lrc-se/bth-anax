<?php
/**
 * Routes for the REM server.
 */

return [
    'routes' => [
        [
            'info' => 'Start the session and initiate the REM server.',
            'requestMethod' => null,
            'path' => 'rem/api/**',
            'callable' => ['remController', 'prepare'],
        ],
        [
            'info' => 'Init or re-init the REM server.',
            'requestMethod' => 'get',
            'path' => 'rem/api/init',
            'callable' => ['remController', 'init'],
        ],
        [
            'info' => 'Destroy the session.',
            'requestMethod' => 'get',
            'path' => 'rem/api/destroy',
            'callable' => ['remController', 'destroy'],
        ],
        [
            'info' => 'Get a dataset.',
            'requestMethod' => 'get',
            'path' => 'rem/api/{dataset:alphanum}',
            'callable' => ['remController', 'getDataset'],
        ],
        [
            'info' => 'Get one item from the dataset.',
            'requestMethod' => 'get',
            'path' => 'rem/api/{dataset:alphanum}/{id:digit}',
            'callable' => ['remController', 'getItem'],
        ],
        [
            'info' => 'Create a new item and add to the dataset.',
            'requestMethod' => 'post',
            'path' => 'rem/api/{dataset:alphanum}',
            'callable' => ['remController', 'createItem'],
        ],
        [
            'info' => 'Upsert/replace an item in the dataset.',
            'requestMethod' => 'put',
            'path' => 'rem/api/{dataset:alphanum}/{id:digit}',
            'callable' => ['remController', 'updateItem'],
        ],
        [
            'info' => 'Delete an item from the dataset.',
            'requestMethod' => 'delete',
            'path' => 'rem/api/{dataset:alphanum}/{id:digit}',
            'callable' => ['remController', 'deleteItem'],
        ],
        [
            'info' => 'Show a message that the route is unsupported, a local 404.',
            'requestMethod' => null,
            'path' => 'rem/api/**',
            'callable' => ['remController', 'unsupported'],
        ]
    ]
];
