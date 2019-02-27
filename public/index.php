<?php

require_once 'config/constants.php';
require_once 'config/credentials.php';
require_once 'config/utility.php';
require_once 'src/Router.php';

$router = new Router();
$router->main();
