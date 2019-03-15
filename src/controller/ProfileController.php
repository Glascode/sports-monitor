<?php

require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller {

    public $allRssFeeds;
    public $userRssFeeds;
    public $userId;
    public $pageTitle;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $this->userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($this->userId);
        $user = $this->userStorage->getUser($this->userId);

        $this->allRssFeeds = $this->rssFeedsStorage->getAllRssFeeds();

        $this->pageTitle = $user['username'];
        $this->renderView('profile');
    }

    public function post() {
        $this->userId = $this->session->getSessionValue('user_id');
        $this->session->authenticate($this->userId);
        $user = $this->userStorage->getUser($this->userId);

        if (key_exists('follow', $_POST)) {
            $rssFeedId = $_POST['follow'];
            $this->rssFeedsStorage->registerNewUserRssFeed($this->userId, $rssFeedId);
        } else if (key_exists('unfollow', $_POST)) {
            $rssFeedId = $_POST['unfollow'];
            $this->rssFeedsStorage->deleteUserRssFeed($this->userId, $rssFeedId);
        }

        $this->allRssFeeds = $this->rssFeedsStorage->getAllRssFeeds();

        $this->pageTitle = $user['username'];
        $this->renderView('profile');
    }

}