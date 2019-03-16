<?php

require_once __DIR__ . '/Controller.php';

class TwitterTrendsController extends Controller {

    private $twitterAPI;

    public function __construct(Session $session,
                                UserStorageSQL $userStorage,
                                RssFeedsStorageSQL $rssFeedsStorage,
                                TwitterAPIExchange $twitterAPI) {
        parent::__construct($session, $userStorage, $rssFeedsStorage);
        $this->twitterAPI = $twitterAPI;
    }

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=%23football&result_type=popular&lang=en&tweet_mode=extended';

        $jsonResponse = $this->twitterAPI
            ->setGetfield($getfield)
            ->buildOauth($url, 'GET')
            ->performRequest();

        $responseArray = json_decode($jsonResponse, true);

        $this->tweets = $responseArray['statuses'];

        $this->renderView('trends');
    }

}
