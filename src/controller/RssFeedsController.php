<?php

require_once __DIR__ . '/Controller.php';

class RssFeedsController extends Controller {

    public $feeds;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $user_id = $this->session->getSessionValue('user_id');
        $user = $this->userStorage->getUser($user_id);

        $rss_feeds = $this->rssFeedsStorage->getRssFeedsByUserId($user['id']);

        // TODO: Clean this mess
        if ($rss_feeds) {

            $default_url = 'https://www.lequipe.fr/rss/actu_rss.xml';  // lequipe by default

            if (key_exists('src', $_GET)) {
                switch ($_GET['src']) {
                    case 'lequipe':
                        $url = 'https://www.lequipe.fr/rss/actu_rss_Football.xml';
                        break;
                    case 'bbc-sport':
                        $url = 'http://feeds.bbci.co.uk/sport/football/rss.xml?edition=uk';
                        break;
                    default:
                        $url = $default_url;
                        break;
                }
            } else {
                $url = $default_url;
            }

            $this->feeds = self::getRssChannel($url);
        }

        $this->renderView('feeds');
    }

    public static function getRssChannel($url) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => 'UTF-8'
        ));

        $data = curl_exec($curl);
        curl_close($curl);

        $xmlResponse = simplexml_load_string($data, null, LIBXML_NOCDATA);
        $jsonResponse = json_encode($xmlResponse);
        $responseArray = json_decode($jsonResponse, true);

        return $responseArray['channel'];
    }

    public function formatPublishedTime($time) {
        date_default_timezone_set('Europe/Paris');
        $published_time_interval = (time() - $time) / 60;

        if ($published_time_interval > 60) {
            $lapse = round($published_time_interval / 60);
            return $lapse . ' hour' . ($lapse > 1 ? 's' : '') . ' ago';
        }
        $lapse = round($published_time_interval);
        return $lapse . ' minute' . ($lapse > 1 ? 's' : '') . ' ago';
    }

}
