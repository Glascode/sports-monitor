<?php

class View {

    private $router;
    private $pageTitle;
    private $page;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function render() {
        include __DIR__ . '/default.php';
    }

    public function makeHomePage() {
        $this->pageTitle = 'Home';
        $this->page = 'home';
    }

    public function makeLoginPage() {
        $this->pageTitle = 'Sign up or Sign in';
        $this->page = 'login';
    }

    public function makeRegisterPage() {
        $this->pageTitle = 'Register';
        $this->page = 'register';
    }

    public function makeUnexpectedErrorPage($error) {
        $this->pageTitle = 'Error';
        $this->error = $error;
        $this->page = 'error';
    }

}