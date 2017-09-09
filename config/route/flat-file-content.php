<?php
/**
 * Routes for flat file content.
 */
$app->router->always(function () use ($app) {
    $app->contentController->defaultView();
});
