<?php

class View {

    private $router;
    private $pageTitle;
    private $page;

    public $menu;

    public function __construct(Router $router) {
        $this->router = $router;
        $this->menu = [
            'trends' => [
                'title' => 'Twitter trends',
                'url' => '/trends'
            ],
            'login' => [
                'title' => 'Login',
                'url' => '/login'
            ]
        ];
    }

    public function render() {
        include __DIR__ . '/default.php';
    }

    public function makePage($page) {
        $this->page = $page;
    }

    public function makePageWithFeedback($page, $message) {
        $this->page = $page;
        $this->message = $message;
    }

    public function makeTrendsPage(array $responseArray) {
        $this->page = 'trends';
        $this->tweets = $responseArray['statuses'];
    }

    public function makeNotFoundPage() {
        $this->pageTitle = 'Error 404';
        $this->error = 'The page you\'re looking for was not found.';
        $this->page = 'error';
    }

    public function makeUnexpectedErrorPage($error) {
        $this->pageTitle = 'Unexpected error';
        $this->error = $error;
        $this->page = 'error';
    }

}