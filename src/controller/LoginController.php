<?php

require_once __DIR__ . '/Controller.php';

class LoginController extends Controller {

    public $message;

    public function get() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->view->style = 'login';
        $this->view->makePage('login');
    }

    public function post() {
        $post = $_POST;

        $username = $post['username'];
        $password = $post['password'];

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

        $this->view->style = 'login';
        $this->view->makePage('login')->withMessage($this->message);

    }

}