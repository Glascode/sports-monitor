<?php

class View {

    protected $router;
    protected $pageTitle;
    protected $page;

    public $menu;

    public function __construct(Router $router) {
        $this->router = $router;
        $this->menu = [
            'lequipe' => [
                'title' => 'Feed',
                'url' => '/feed'
            ],
            'trends' => [
                'title' => 'Twitter trends',
                'url' => '/trends'
            ]
        ];
        $this->loginButton = [
            'title' => 'Login',
            'url' => '/login'
        ];
    }

    public function render() {
        include __DIR__ . '/default.php';
    }

    public function makePage($page) {
        $this->page = $page;
        return $this;
    }

    public function makeFeedPage(array $responseArray) {
        $this->page = 'feed';
        $this->feed = $responseArray['channel'];
    }

    public function makeTwitterTrendsPage(array $responseArray) {
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

    public function withTitle($title) {
        $this->pageTitle = $title;
        return $this;
    }

    public function withMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function formatPublishedTime($time) {
        date_default_timezone_set('Europe/Paris');
        $published_time_interval = (time() - $time) / 60;

        if ($published_time_interval > 60) {
            $lapse = round($published_time_interval / 60);
            return $lapse . ' hour' . ($lapse > 1 ? 's' : '') . ' ago';
        }
        $lapse = round($published_time_interval);
        return $lapse . ' minute' . ($lapse > 1 ? 's' : '') . ' ago';
    }

}