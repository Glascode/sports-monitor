<?php

require_once __DIR__ . '/Controller.php';

class RegisterController extends Controller {

    public $message;

    public function get() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->view->style = 'login';
        $this->view->makePage('register');

    }

    public function post() {
        $post = $_POST;

        $username = $post['username'];
        $password = $post['password'];

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

        $this->view->style = 'login';
        $this->view->makePage('register')->withMessage($this->message);
    }

    /**
     * Make sure password passes proper testing and username does not contain
     * special characters.
     */
    public function validateNewUser($username, $password) {
        $this->validatePassword($password);
        $this->validateUsername($username);

        $usernameSearchResults = $this->userStorage->isUsernameAvailable($username);

        if ($usernameSearchResults > 0) {
            // Username already exists in the database
            $this->errors[] = USERNAME_EXISTS;
        }
    }


}