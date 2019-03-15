<?php

require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $this->renderView('dashboard');
    }

}
