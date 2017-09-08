<?php
/**
 * User routes.
 */

/** Login page. */
$app->router->get('user', [$app->userController, 'login']);

/** Login handler. */
$app->router->post('user/login', [$app->userController, 'handleLogin']);

/** Logout handler. */
$app->router->get('user/logout', [$app->userController, 'handleLogout']);
