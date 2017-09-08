<?php
/**
 * Routes for comments.
 */

/** Create new comment. */
$app->router->post('comment/create/{contentId:alphanum}', [$app->commentController, 'create']);

/** Upsert/replace a comment. */
$app->router->post('comment/update/{contentId:alphanum}/{commentId:digit}', [$app->commentController, 'update']);

/** Delete a comment. */
$app->router->post('comment/delete/{contentId:alphanum}/{commentId:digit}', [$app->commentController, 'delete']);
