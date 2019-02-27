<?php

// MySQL server config
define('DB_HOST', '127.0.0.1');

// Credentials
define('DB_NAME', '');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

// DSN
define('PDO_DSN',
    'mysql:host=' . DB_HOST .
    ';dbname=' . DB_NAME .
    ';user=' . DB_USER .
    ';password=' . DB_PASSWORD .
    ';charset=utf8');
