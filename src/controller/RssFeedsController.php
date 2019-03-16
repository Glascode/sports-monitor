<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/WordsOccurrencesCounter.php';

class RssFeedsController extends Controller {

    public $userId;
    public $userRssFeeds;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $this->userId = $this->session->getSessionValue('user_id');

        $this->userRssFeeds = $this->rssFeedsStorage->getAllUserRssFeeds($this->userId);

        $wordsOccurrencesCounter = new WordsOccurrencesCounter();

        foreach ($this->userRssFeeds as $userRssFeed) {
            $rssFeed = $this->getRssChannel($userRssFeed['url']);
            foreach ($rssFeed['item'] as $item) {
                $wordsOccurrencesCounter->addWordsFromText($item['description']);
            }
        }

        var_dump($wordsOccurrencesCounter->getWordOccurrences());

        $this->renderView('feeds');
    }

    public function getRssChannel($url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => 'UTF-8'
        ));

        $data = curl_exec($curl);
        curl_close($curl);

        $xmlResponse = simplexml_load_string($data, null, LIBXML_NOCDATA);
        $jsonResponse = json_encode($xmlResponse);
        $responseArray = json_decode($jsonResponse, true);

        return $responseArray['channel'];
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
