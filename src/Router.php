<?php

require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/controller/DashboardController.php';
require_once __DIR__ . '/controller/ExceptionNotFoundController.php';
require_once __DIR__ . '/controller/FeedsController.php';
require_once __DIR__ . '/controller/IndexController.php';
require_once __DIR__ . '/controller/LoginController.php';
require_once __DIR__ . '/controller/LogoutController.php';
require_once __DIR__ . '/controller/ProfileController.php';
require_once __DIR__ . '/controller/RegisterController.php';
require_once __DIR__ . '/controller/SelectTeamController.php';
require_once __DIR__ . '/controller/TwitterTrendsController.php';

require_once __DIR__ . '/models/Session.php';
require_once __DIR__ . '/models/TwitterAPIExchange.php';
require_once __DIR__ . '/models/UserStorageSQL.php';
require_once __DIR__ . '/models/RssFeedsStorageSQL.php';

class Router {

    private $session;
    private $userStorage;
    private $rssFeedsStorage;

    public function main() {

        $this->userStorage = new UserStorageSQL();
        $this->rssFeedsStorage = new RssFeedsStorageSQL();
        $this->session = new Session('SPORTS_MONITOR');

        try {
            switch (get_uri()) {
                case '':
                    $controller = new IndexController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
                case 'dashboard':
                    $controller = new DashboardController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
                case 'login':
                    $controller = new LoginController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                case 'register':
                    $controller = new RegisterController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                case 'profile':
                    $controller = new ProfileController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $method = get_method();
                    $controller->$method();
                    break;
                case 'logout':
                    $controller = new LogoutController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
                case 'select-team':
                    $controller = new SelectTeamController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $method = get_method();
                    $controller->get();
                    break;
                case 'feeds':
                    $controller = new FeedsController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
                case 'trends':
                    $settings = array(
                            'oauth_access_token' => ACCESS_TOKEN,
                            'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
                            'consumer_key' => CONSUMER_KEY,
                            'consumer_secret' => CONSUMER_SECRET
                    );
                    $controller = new TwitterTrendsController(
                            $this->session,
                            $this->userStorage,
                            $this->rssFeedsStorage,
                            new TwitterAPIExchange($settings)
                    );
                    $controller->get();
                    break;
                default:
                    $controller = new ExceptionNotFoundController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
            }
        } catch (Exception $e) {
            $controller = new ExceptionNotFoundController($this->session, $this->userStorage, $this->rssFeedsStorage);
            $controller->get();
        }
    }

}
