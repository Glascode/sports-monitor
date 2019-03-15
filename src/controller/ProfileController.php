<?php

require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller {

    public $pageTitle;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($userId);
        $user = $this->userStorage->getUser($userId);

        $this->pageTitle = $user['username'];
        $this->renderView('profile');
    }

    public function post() {

    }

}