<?php

require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller {

    public $message;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($userId);
        $user = $this->userStorage->getUser($userId);

        $this->view->makePage('profile')->withTitle($user['username']);
    }

    public function post() {

    }

}