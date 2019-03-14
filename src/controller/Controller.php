<?php

abstract class Controller {

    protected $view;
    protected $session;
    protected $userStorage;

    protected $errors;

    public function __construct(View $view, Session $session, UserStorageSQL $userStorage) {
        $this->view = $view;
        $this->session = $session;
        $this->userStorage = $userStorage;
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
