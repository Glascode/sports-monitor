<?php

class TagCloudGenerator {

    public $rssFeedsStorage;
    public $twitterAPIExchange;
    public $wordsOccurrencesCounter;

    public function __construct(RssFeedsStorageSQL $rssFeedsStorage,
                                TwitterAPIExchange $twitterAPIExchange) {
        $this->rssFeedsStorage = $rssFeedsStorage;
        $this->twitterAPIExchange = $twitterAPIExchange;
    }

    public function get() {
        $date = "";

        if (key_exists('date', $_GET)) {
            $date = $_GET['date'];
        }

        $this->wordsOccurrencesCounter = new WordsOccurrencesCounter();
        $this->wordsOccurrencesCounter->addWordsFromText($this->getRawRssFeeds($date));
        $this->wordsOccurrencesCounter->addWordsFromText($this->getRawTweets('football', $date));
        $this->wordsOccurrencesCounter->addWordsFromText($this->getRawTweets('soccer', $date));

        $wordsOccurrencesArray = array_slice($this->wordsOccurrencesCounter->getSortedWordsOccurrences(), 0, 30);

        $maxOccurrence = null;
        foreach ($wordsOccurrencesArray as $key => $maxOccurrence) {
            break;
        }

        $res = '';

        // Shuffle array
        uksort($wordsOccurrencesArray, function () {
            return rand() > rand();
        });

        foreach ($wordsOccurrencesArray as $tag => $occurrence) {
            $style = 'style="';

            if ($occurrence <= $maxOccurrence * 0.2) {
                $style .= 'font-size: 6pt;';
            } else if ($occurrence <= $maxOccurrence * 0.4) {
                $style .= 'font-size: 12pt; font-weight: 300';
            } else if ($occurrence <= $maxOccurrence * 0.6) {
                $style .= 'font-size: 18pt; font-weight: 500';
            } else if ($occurrence <= $maxOccurrence * 0.8) {
                $style .= 'font-size: 24pt; font-weight: 700';
            } else {
                $style .= 'font-size: 30pt; font-weight: 900';
            }

            $style .= '"';

            $res .= "<a " . $style . "href=\"/feeds?tag=$tag\">" . $tag . "</a>";
        }

        if (empty($res)) {
            $res .= '<p class="text-danger">There\'s no data for this selected date</p>';
        }

        echo $res;
    }

    private function getRawRssFeeds($givenDate) {
        $rawRssFeeds = '';
        $allRssFeeds = $this->rssFeedsStorage->getAllRssFeeds();

        foreach ($allRssFeeds as $rssFeed) {
            $rssFeed = RssFeedsController::getRssChannel($rssFeed['url']);
            foreach ($rssFeed['item'] as $item) {
                $dateParts = explode(' ', $item['pubDate']);
                $publicationDate = date('m/d/Y', strtotime($dateParts[0] . ' ' . $dateParts[1] . ' ' . $dateParts[2]));

                if ($publicationDate === $givenDate) {
                    $rawRssFeeds .= $item['description'];
                }
            }
        }

        return $rawRssFeeds;
    }

    private function getRawTweets($hashtag, $givenDate) {
        $rawTweets = '';

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = "?q=%23$hashtag&result_type=popular&lang=en&tweet_mode=extended";

        try {
            $jsonResponse = $this->twitterAPIExchange
                    ->setGetfield($getfield)
                    ->buildOauth($url, 'GET')
                    ->performRequest();
        } catch (Exception $e) {
            echo $e;
        }

        $responseArray = json_decode($jsonResponse, true);

        foreach ($responseArray['statuses'] as $tweet) {
            $dateParts = explode(' ', $tweet['created_at']);
            $publicationDate = date('m/d/Y', strtotime($dateParts[1] . ' ' . $dateParts[2] . ' ' . $dateParts[5]));

            if ($publicationDate === $givenDate) {
                $rawTweets .= preg_replace('/\b((https?|ftp|file):\/\/|www\.)[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', ' ', preg_replace('/#\S+[ \t]*/', '', $tweet['full_text']));
            }
        };

        return $rawTweets;
    }

}
