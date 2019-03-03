<?php

require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/controller/LoginController.php';
require_once __DIR__ . '/controller/SelectTeamController.php';
require_once __DIR__ . '/models/Session.php';
require_once __DIR__ . '/models/UserStorageSQL.php';
require_once __DIR__ . '/view/View.php';

class Router {

    private $view;
    private $session;
    private $userStorage;

    public function main() {

        $this->view = new View($this);
        $this->session = new Session('AUTHENTICATION');
        $this->userStorage = new UserStorageSQL();

        try {
            switch (get_uri()) {
                case '':
                    $this->view->makePage('index');
                    break;
                case 'login':
                    $controller = new LoginController($this->view, $this->session, $this->userStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                case 'select-team':
                    $controller = new SelectTeamController($this->view, $this->session, $this->userStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                default:
                    $this->view->makeNotFoundPage();
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