<?php

require_once __DIR__ . '/controller/Controller.php';
require_once __DIR__ . '/controller/DashboardController.php';
require_once __DIR__ . '/controller/ExceptionNotFoundController.php';
require_once __DIR__ . '/controller/RssFeedsController.php';
require_once __DIR__ . '/controller/IndexController.php';
require_once __DIR__ . '/controller/LoginController.php';
require_once __DIR__ . '/controller/LogoutController.php';
require_once __DIR__ . '/controller/ProfileController.php';
require_once __DIR__ . '/controller/RegisterController.php';
require_once __DIR__ . '/controller/TwitterTrendsController.php';

require_once __DIR__ . '/models/Session.php';
require_once __DIR__ . '/models/TwitterAPIExchange.php';
require_once __DIR__ . '/models/UserStorageSQL.php';
require_once __DIR__ . '/models/RssFeedsStorageSQL.php';
require_once __DIR__ . '/models/TagCloudGenerator.php';

class Router {

    private $session;
    private $userStorage;
    private $rssFeedsStorage;
    private $twitterAPIExchange;

    public function main() {

        $this->userStorage = new UserStorageSQL();
        $this->rssFeedsStorage = new RssFeedsStorageSQL();
        $this->session = new Session('SPORTS_MONITOR');

        $this->twitterAPIExchange = new TwitterAPIExchange(array(
                'oauth_access_token' => ACCESS_TOKEN,
                'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
                'consumer_key' => CONSUMER_KEY,
                'consumer_secret' => CONSUMER_SECRET
        ));

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
                case 'feeds':
                    $controller = new RssFeedsController($this->session, $this->userStorage, $this->rssFeedsStorage);
                    $controller->get();
                    break;
                case 'trends':
                    $controller = new TwitterTrendsController(
                            $this->session,
                            $this->userStorage,
                            $this->rssFeedsStorage,
                            $this->twitterAPIExchange
                    );
                    $controller->get();
                    break;
                case 'generate_tag_cloud.php':
                    $tagCloudGenerator = new TagCloudGenerator($this->rssFeedsStorage, $this->twitterAPIExchange);
                    $tagCloudGenerator->get();
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
