<?php

require_once __DIR__ . '/Controller.php';

class TwitterTrendsController extends Controller {

    private $twitterAPI;
    public $tweets;

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

        try {
            $jsonResponse = $this->twitterAPI
                    ->setGetfield($getfield)
                    ->buildOauth($url, 'GET')
                    ->performRequest();
        } catch (Exception $e) {
            echo $e;
        }

        $responseArray = json_decode($jsonResponse, true);

        $this->tweets = $responseArray['statuses'];

        $this->renderView('trends');
    }

}
