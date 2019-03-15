<?php

require_once __DIR__ . '/Controller.php';

class IndexController extends Controller {

    public function get() {
        $this->redirect('/dashboard');
    }

}
