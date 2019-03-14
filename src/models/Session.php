<?php

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
    public function login($user) {
        $_SESSION['user_id'] = $user['id'];
    }

    /**
     * Unsets the session variable and destroy the session.
     */
    public function logout() {
        unset($_SESSION['user_id']);
        session_destroy();
    }

    /**
     * Determines if user is logged in, and redirect to the login screen
     * if not.
     */
    public function authenticate($userId) {
        if (!key_exists('user_id', $_SESSION) || $userId !== $_SESSION['user_id']) {
            header('Location: /login');
        }
    }

    /**
     * Returns true if user is logged in.
     */
    public function isUserLoggedIn() {
        return key_exists('user_id', $_SESSION);
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