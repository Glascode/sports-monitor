<?php

require_once __DIR__ . '/Model.php';

class UserStorageSQL extends Model {

    public function getUser($userId) {
        $query = 'SELECT *
                  FROM users
                  WHERE id = :id 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':id', $userId);

        $user = $this->database->result();

        return $user;
    }

    public function getAllUsers() {
        $query = 'SELECT * FROM users';

        $this->database->query($query);

        $users = $this->database->resultset();

        return $users;
    }

    public function getUserByUsername($username) {
        $query = 'SELECT *
                  FROM users
                  WHERE username = :username 
                  LIMIT 1';

        $this->database->query($query);
        $this->database->bind(':username', $username);

        $user = $this->database->result();

        return $user;
    }

    public function registerNewUser($username, $password) {
        $query = 'INSERT INTO users (username, password)
                  VALUES (:username, :password)';

        $this->database->query($query);
        $this->database->bind(':username', $username);
        $this->database->bind(':password', $password);

        $result = $this->database->execute();

        return $result;
    }

    public function isUsernameAvailable($username) {
        $username = strtolower($username);
        $query = 'SELECT COUNT(username)
                  AS nbusers
                  FROM users
                  WHERE LOWER(username) = :username';

        $this->database->query($query);
        $this->database->bind(':username', $username);

        $result = $this->database->result();

        return $result['nbusers'];
    }

    public function deleteUser($userId) {
        $query = 'DELETE FROM users
                  WHERE id = :id';

        $this->database->query($query);
        $this->database->bind(':id', $userId);

        $result = $this->database->execute();

        $query = 'DELETE FROM users_rss_feeds
                  WHERE user_id = :user_id';

        $this->database->query($query);
        $this->database->bind(':user_id', $userId);
        $this->database->execute();

        return $result;
    }

}
