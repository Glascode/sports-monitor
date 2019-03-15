<?php

require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/controller/FeedController.php';
require_once __DIR__ . '/controller/LoginController.php';
require_once __DIR__ . '/controller/SelectTeamController.php';
require_once __DIR__ . '/controller/TwitterTrendsController.php';
require_once __DIR__ . '/controller/DashboardController.php';
require_once __DIR__ . '/models/Session.php';
require_once __DIR__ . '/models/TwitterAPIExchange.php';
require_once __DIR__ . '/models/UserStorageSQL.php';
require_once __DIR__ . '/view/View.php';
require_once __DIR__ . '/view/PrivateView.php';

class Router {

    private $view;
    private $session;
    private $userStorage;

    public function main() {

        $this->userStorage = new UserStorageSQL();
        $this->session = new Session('SPORTS_MONITOR');

        if ($this->session->isUserLoggedIn()) {
            $this->view = new PrivateView($this);
        } else {
            $this->view = new View($this);
        }

        try {
            switch (get_uri()) {
                case '':
                    $this->view->makePage('index');
                    break;
                case 'login':
                    $controller = new LoginController($this->view, $this->session, $this->userStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                case 'select-team':
                    $controller = new SelectTeamController($this->view, $this->session, $this->userStorage);
                    $method = get_method();
                    $controller->get();
                    break;
                case 'feed':
                    $controller = new FeedController($this->view, $this->session, $this->userStorage);
                    $controller->get();
                    break;
                case 'trends':
                    $settings = array(
                        'oauth_access_token' => ACCESS_TOKEN,
                        'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
                        'consumer_key' => CONSUMER_KEY,
                        'consumer_secret' => CONSUMER_SECRET
                    );
                    $controller = new TwitterTrendsController($this->view,
                        $this->session, $this->userStorage, new TwitterAPIExchange($settings));
                    $controller->get();
                    break;
                case 'dashboard':
                    $controller = new DashboardController($this->view, $this->session, $this->userStorage);
                    $controller->get();
                    break;
                default:
                    $this->view->makeNotFoundPage();
                    break;
            }
        } catch (Exception $e) {
            $this->view->makeUnexpectedErrorPage($e);
        }

        $this->view->render();
    }

    public function getLoginURL() {
        return '/login';
    }

}