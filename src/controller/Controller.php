<?php

abstract class Controller {

    private $view;

    protected $session;
    protected $userStorage;
    protected $rssFeedsStorage;
    protected $errors;

    public $menu;

    public function __construct(Session $session, UserStorageSQL $userStorage, RssFeedsStorageSQL $rssFeedsStorage) {
        $this->session = $session;
        $this->userStorage = $userStorage;
        $this->rssFeedsStorage = $rssFeedsStorage;
        $this->generateMenu();
    }

    private function generateMenu() {
        $this->menu = [
            'lequipe' => [
                'title' => 'Feeds',
                'url' => '/feeds'
            ],
            'trends' => [
                'title' => 'Twitter trends',
                'url' => '/trends'
            ]
        ];

        $userId = $this->session->getSessionValue('user_id');
        $user = $this->userStorage->getUser($userId);

        $this->me = $user['username'];
    }

    public static function escape($html) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    }

    protected function renderView($view) {
        $this->view = strtolower($view);
        include __DIR__ . '/../view/default.php';
    }

    protected function redirect($url) {
        $url = strtolower($url);
        header('Location: ' . $url);
        exit;
    }

    protected function encryptPassword($password) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        return $passwordHash;
    }

    protected function verifyPassword($submittedPassword, $passwordHash) {
        $validPassword = password_verify($submittedPassword, $passwordHash);
        return $validPassword;
    }

    protected function validateUsername($username) {
        if (!empty($username)) {
            if (strlen($username) < '3') {
                $this->errors[] = USERNAME_TOO_SHORT;
            }
            if (strlen($username) > '50') {
                $this->errors[] = USERNAME_TOO_LONG;
            }
            // Match a-z, A-Z, 1-9, -, _.
            if (!preg_match("/^[a-zA-Z\d-_]+$/i", $username)) {
                $this->errors[] = USERNAME_CONTAINS_DISALLOWED;
            }
        } else {
            $this->errors[] = USERNAME_MISSING;
        }
    }

    protected function validatePassword($password) {
        if (!empty($password)) {
            if (strlen($password) < '8') {
                $this->errors[] = PASSWORD_TOO_SHORT;
            }
        } else {
            $this->errors[] = PASSWORD_MISSING;
        }
    }

    protected function formatErrors($errors) {
        $formattedErrors = '';
        foreach ($errors as $error) {
            $formattedErrors .= $error . "\n";
        }
        return $formattedErrors;
    }

}
