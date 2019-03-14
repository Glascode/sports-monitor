<?php

// Site
define('SITE_TITLE', 'Sports Monitor');
define('BASE_URL', '');

// Login
define('LOGIN_FAIL', 'Incorrect username / password combination!');

// Password validation
define('PASSWORD_TOO_SHORT', 'Password must contain at least 8 characters');
define('PASSWORD_MISSING', 'You must include a password');

// Username validation
define('USERNAME_EXISTS', 'That username already exists');
define('USERNAME_NOT_EXISTS', 'That username does not exist');
define('USERNAME_MISSING', 'You must include a username');
define('USERNAME_TOO_SHORT', 'Username must contain at least 3 characters');
define('USERNAME_TOO_LONG', 'Username must be shorter than 50 characters');
define('USERNAME_CONTAINS_DISALLOWED', 'Your username cannot contain special characters');

// Twitter API
require_once 'access.php';
