<?php

require_once __DIR__ . '/Controller.php';

class TwitterTrendsController extends Controller {

    private $twitterAPI;

    public function __construct(View $view,
                                Session $session,
                                UserStorageSQL $userStorage,
                                TwitterAPIExchange $twitterAPI) {
        parent::__construct($view, $session, $userStorage);
        $this->twitterAPI = $twitterAPI;
    }

    public function get() {
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=neymar&result_type=popular&lang=en';
        $jsonResponse = $this->twitterAPI
            ->setGetfield($getfield)
            ->buildOauth($url, 'GET')
            ->performRequest();

        $responseArray = json_decode($jsonResponse, true);

        $this->view->makeTrendsPage($responseArray);
    }

}
