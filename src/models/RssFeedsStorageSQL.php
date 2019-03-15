<?php

require_once __DIR__ . '/Model.php';

class RssFeedsStorageSQL extends Model {

    public function getRssFeed($rssFeedId) {
        $query = 'SELECT *
                  FROM rss_feeds
                  WHERE id = :id 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':id', $rssFeedId);

        $rss_feed = $this->database->result();

        return $rss_feed;
    }

    public function getAllRssFeeds() {
        $query = 'SELECT * FROM rss_feeds';

        $this->database->query($query);

        $rss_feeds = $this->database->resultset();

        return $rss_feeds;
    }

    public function getRssFeedByName($rssFeedName) {
        $query = 'SELECT *
                  FROM rss_feeds
                  WHERE name = :name 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':name', $rssFeedName);

        $rss_feed = $this->database->result();

        return $rss_feed;
    }

    public function getRssFeedsByUserId($userId) {
        $query = 'SELECT *
                  FROM users_rss_feeds
                  WHERE user_id = :user_id 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':user_id', $userId);

        $rss_feeds = $this->database->result();

        return $rss_feeds;
    }

    public function registerNewRssFeed($name, $url) {
        $query = 'INSERT INTO rss_feeds (name, url)
                  VALUES (:name, :url)';

        $this->database->query($query);
        $this->database->bind(':name', $name);
        $this->database->bind(':url', $url);

        $result = $this->database->execute();

        return $result;
    }

    public function deleteRssFeed($rssFeedId) {
        $query = 'DELETE FROM rss_feeds
                  WHERE id = :id';

        $this->database->query($query);
        $this->database->bind(':id', $rssFeedId);

        $result = $this->database->execute();

        $query = 'DELETE FROM users_rss_feeds
                  WHERE rss_feed_id = :rss_feed_id';

        $this->database->query($query);
        $this->database->bind(':rss_feed_id', $rssFeedId);
        $this->database->execute();

        return $result;
    }

}
