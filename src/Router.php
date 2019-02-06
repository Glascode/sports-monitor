<?php

require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/models/Session.php';
require_once __DIR__ . '/view/View.php';

class Router {

    private $view;
    private $session;

    public function main() {

        $this->view = new View($this);
        $this->session = new Session('AUTHENTICATION');

        try {
            switch (getUri()) {
                case 'login':
                    $controller = new Controller($this->view, $this->session);
                    $controller->login();
                    break;
                default:
                    $this->view->makeHomePage();
                    break;
            }
        } catch (Exception $e) {
            $this->view->makeUnexpectedErrorPage($e);
        }

        $this->view->render();
    }

    public function getLoginURL() {
        return '/login';
    }

}