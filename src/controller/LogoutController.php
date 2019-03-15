<?php

require_once __DIR__ . '/Controller.php';

class LogoutController extends Controller {

    public function get() {
        $this->session->logout();
        $this->redirect('/');
    }

}