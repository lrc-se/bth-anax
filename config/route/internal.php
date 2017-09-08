<?php
/**
 * Internal routes for error handling.
 */

$app->router->addInternal('403', function () use ($app) {
    $app->renderPage('Förbjuden åtgärd', 'Du har inte behörighet att göra det du försökte göra.', ['title' => 'Förbjuden åtgärd'], 403);
});

$app->router->addInternal('404', function () use ($app) {
    $app->renderPage('Sidan kunde inte hittas', 'Sidan du letar efter finns inte här.', ['title' => 'Sidan kunde inte hittas'], 404);
});

$app->router->addInternal('500', function () use ($app) {
    $app->renderPage('Serverfel', 'Ett oväntat problem har uppstått.', ['title' => 'Serverfel'], 500);
});
