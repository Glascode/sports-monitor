<?php

require_once __DIR__ . '/Controller.php';

class RegisterController extends Controller {

    public $message;
    public $styleSheet = 'login';

    public function get() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->renderView('register');
    }

    public function post() {
        $username = key_exists('username', $_POST) ? self::escape($_POST['username']) : null;
        $password = key_exists('password', $_POST) ? self::escape($_POST['password']) : null;

        // Validate username and password
        $this->validateNewUser($username, $password);

        // Store errors if any tests failed
        if (!empty($this->errors)) {
            $this->message = $this->formatErrors($this->errors);
        } else {
            // Hash the password
            $passwordHash = $this->encryptPassword($password);
            $result = $this->userStorage->registerNewUser($username, $passwordHash);

            // User registration successful
            if ($result) {
                $user = $this->userStorage->getUserByUsername($username);
                $this->session->login($user);
                $this->redirect('/profile');
            }
        }

        $this->renderView('register');
    }

    /**
     * Make sure password passes proper testing and username does not contain
     * special characters.
     */
    public function validateNewUser($username, $password) {
        $this->validateUsername($username);
        $this->validatePassword($password);

        $usernameSearchResults = $this->userStorage->isUsernameAvailable($username);

        if ($usernameSearchResults > 0) {
            // Username already exists in the database
            $this->errors[] = USERNAME_EXISTS;
        }
    }

}