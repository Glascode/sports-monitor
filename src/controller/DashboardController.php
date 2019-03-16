<?php

require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {

    public $styleSheet = 'dashboard';
    public $script = 'dashboard';

    public $wordsOccurrences;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $wordsOccurrencesCounter = new WordsOccurrencesCounter();
        $allRssFeeds = $this->rssFeedsStorage->getAllRssFeeds();


        foreach ($allRssFeeds as $rssFeed) {
            $rssFeed = RssFeedsController::getRssChannel($rssFeed['url']);
            foreach ($rssFeed['item'] as $item) {
                $wordsOccurrencesCounter->addWordsFromText($item['description']);
            }
        }

        $this->wordsOccurrences = $wordsOccurrencesCounter->getSortedWordsOccurrences();

        $this->renderView('dashboard');
    }

}
