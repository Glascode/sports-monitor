<?php

require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {

    public $styleSheet = 'dashboard';
    public $script = 'dashboard';

    public $userId;
    public $wordsOccurrences;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $this->userId = $this->session->getSessionValue('user_id');
        $allRssFeeds = $this->rssFeedsStorage->getAllRssFeeds();

        $wordsOccurrencesCounter = new WordsOccurrencesCounter();

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
