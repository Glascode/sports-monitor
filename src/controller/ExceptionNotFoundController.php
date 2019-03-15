<?php

require_once __DIR__ . '/Controller.php';

class ExceptionNotFoundController extends Controller {

    public $pageTitle = 'Error 404';

    public function get() {
        $this->error = 'The page you\'re looking for was not found.';
        $this->renderView('error');
    }

}
