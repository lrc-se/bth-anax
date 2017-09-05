<?php
/**
 * Routes for the REM server.
 */
 
 /** Start the session and initiate the REM server. */
$app->router->add('rem/api/**', [$app->remController, 'prepare']);

/** Init or re-init the REM server. */
$app->router->get('rem/api/init', [$app->remController, 'init']);

/** Destroy the session. */
$app->router->get('rem/api/destroy', [$app->remController, 'destroy']);

/** Get a dataset. */
$app->router->get('rem/api/{dataset:alphanum}', [$app->remController, 'getDataset']);

/** Get one item from the dataset. */
$app->router->get('rem/api/{dataset:alphanum}/{id:digit}', [$app->remController, 'getItem']);

/** Create a new item and add to the dataset. */
$app->router->post('rem/api/{dataset:alphanum}', [$app->remController, 'createItem']);

/** Upsert/replace an item in the dataset. */
$app->router->put('rem/api/{dataset:alphanum}/{id:digit}', [$app->remController, 'updateItem']);

/** Delete an item from the dataset */
$app->router->delete('rem/api/{dataset:alphanum}/{id:digit}', [$app->remController, 'deleteItem']);

/** Show a message that the route is unsupported, a local 404. */
$app->router->add('rem/api/**', [$app->remController, 'unsupported']);
