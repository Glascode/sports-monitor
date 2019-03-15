<?php

require_once __DIR__ . '/Controller.php';

class LoginController extends Controller {

    public $message;
    public $styleSheet = 'login';

    public function get() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->renderView('login');
    }

    public function post() {
        $username = key_exists('username', $_POST) ? self::escape($_POST['username']) : null;
        $password = key_exists('password', $_POST) ? self::escape($_POST['password']) : null;

        $this->validateUsername($username);
        $this->validatePassword($password);

        // Retrieve the user account information for the given username
        $user = $this->userStorage->getUserByUsername($username);

        if (!$user) {
            // Could not find a user with that username
            $this->message = USERNAME_NOT_EXISTS;
        } else {
            // User account found
            $correctPassword = $this->verifyPassword($password, $user['password']);
            if ($correctPassword) {
                $this->session->login($user);
                $this->redirect('/login');
            } else {
                $this->message = LOGIN_FAIL;
            }
        }

        $this->renderView('login');

    }

}