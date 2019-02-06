<?php

class Controller {

    private $view;
    private $session;

    public function __construct(View $view, Session $session) {
        $this->view = $view;
        $this->session = $session;
    }

    private function redirect($view) {
        $view = strtolower($view);

        header('Location: /' . $view);
        exit;
    }

    public function login() {
        if ($this->session->isUserLoggedIn()) {
            $this->redirect('home');
        }
        $this->view->makeLoginPage();
    }

}
