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

        $user = $this->database->result();

        return $user;
    }

    public function getAllRssFeeds() {
        $query = 'SELECT * FROM rss_feeds';

        $this->database->query($query);

        $users = $this->database->resultset();

        return $users;
    }

    public function getRssFeedByName($rssFeedName) {
        $query = 'SELECT *
                  FROM rss_feeds
                  WHERE $name = :name 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':name', $rssFeedName);

        $user = $this->database->result();

        return $user;
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

        return $result;
    }

}
