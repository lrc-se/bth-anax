<?php
/**
 * Routes.
 */
require __DIR__ . '/route/internal.php';
require __DIR__ . '/route/debug.php';
require __DIR__ . '/route/flat-file-content.php';
require __DIR__ . '/route/remserver.php';

// Catch all routes last
require __DIR__ . '/route/404.php';
