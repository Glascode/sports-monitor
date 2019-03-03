<?php

require_once __DIR__ . '/Controller.php';

class SelectTeamController extends Controller {

    public $message;

    public function get() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('/');
        }

        $this->view->makePage('select-team');
    }

    public function post() {
        $post = $_POST;

        $team = $post['team'];

        $this->view->makePage('select-team');
    }

}