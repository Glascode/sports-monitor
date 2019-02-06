<?php


/**
 * Session Class
 *
 * Determine and modify the state of user authentication.
 *
 * The Session class is used to check the state of a user's authentication.
 * It uses the PHP session superglobal to determine if a user is logged in or
 * not.
 */
class Session {

    /**
     * Initialises a session with a name.
     */
    public function __construct($name) {
        if (!isset($_SESSION)) {
            session_name($name);
            session_start();
        }
    }

    /**
     * Sets the user ID session.
     */
    public function login($userLogin) {
        $_SESSION['user_login'] = $userLogin;
    }

    /**
     * Unsets the session variable and destroy the session.
     */
    public function logout() {
        unset($_SESSION['user_login']);
        session_destroy();
    }

    /**
     * Determines if user is logged in, and redirect to the login screen
     * if not.
     */
    public function authenticate($userLogin) {
        if (!key_exists('user_login', $_SESSION) || $userLogin !== $_SESSION['user_login']) {
            header('Location: /login');
        }
    }

    /**
     * Returns true if user is logged in.
     */
    public function isUserLoggedIn() {
        return key_exists('user_login', $_SESSION);
    }

    /**
     * Sets a session value.
     */
    public function setSessionValue($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Unsets a session value.
     */
    public function deleteSessionValue($key) {
        unset($_SESSION[$key]);
    }

    /**
     * Returns a session value by key.
     * Returns the value or null.
     */
    public function getSessionValue($key) {
        return key_exists($key, $_SESSION) ? $_SESSION[$key] : null;
    }
}