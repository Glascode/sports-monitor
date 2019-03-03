<?php

// Site
define('SITE_TITLE', 'Sports Monitor');
define('BASE_URL', '');

// Login
define('LOGIN_FAIL', 'Le nom d\'utilisateur et le mot de passe ne correspondent pas.');

// Password validation
define('PASSWORD_TOO_SHORT', 'Le mot de passe doit contenir au moins 8 caractères.');
define('PASSWORD_MISSING', 'Vous devez fournir un mot passe.');

// Username validation
define('USERNAME_EXISTS', 'Le nom d\'utilisateur existe déjà.');
define('USERNAME_NOT_EXISTS', 'Ce nom d\'utilisateur n\'existe pas.');
define('USERNAME_NOT_APPROVED', 'That username is not approved.');
define('USERNAME_MISSING', 'Vous devez fournir un nom d\'utilisateur.');
define('USERNAME_TOO_SHORT', 'Le nom d\'utilisateur doit contenir au moins 3 caractères.');
define('USERNAME_TOO_LONG', 'Le nom d\'utilisateur ne doit pas dépasser 50 caractères.');
define('USERNAME_CONTAINS_DISALLOWED', 'Votre nom d\'utilisateur ne peut pas contenir des caractères spéciaux.');

// Twitter API
require_once 'access.php';
