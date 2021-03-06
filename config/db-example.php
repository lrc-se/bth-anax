<?php
/**
 * Config file for database connection (example).
 */

$config = [
    'driver_options' => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'],
    'fetch_mode' => \PDO::FETCH_OBJ,
    'table_prefix' => 'rv1_',
    'session_key' => 'kabc16-anax-db',

    // True to be very verbose during development
    'verbose' => null,

    // True to be verbose on connection failed
    'debug_connect' => false
];

if (strpos($_SERVER['HTTP_HOST'], 'student.bth.se') !== false) {
    // published environment
    $config['dsn'] = 'mysql:host=xxxxxxxxxxxx;port=3306;dbname=XXXXXX';
    $config['username'] = 'YYYYYYYY';
    $config['password'] = 'ZZZZZZZZ';
} else {
    // local development environment
    $config['dsn'] = 'mysql:host=localhost;dbname=XXXXXX';
    $config['username'] = 'YYYYYYYY';
    $config['password'] = 'ZZZZZZZZ';
}

return $config;
