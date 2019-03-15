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
            // TODO: Handle message
            $this->message = USERNAME_NOT_EXISTS;
        } else {
            // User account found
            $correctPassword = $this->verifyPassword($password, $user['password']);

            if ($correctPassword) {
                // Log in user
                $this->session->login($user);
                $this->message = 'Proceed';
                $this->redirect('/select');
            } else {
                $this->message = LOGIN_FAIL;
            }
        }

        $this->view->makePageWithFeedback('login', $this->message);

    }

}