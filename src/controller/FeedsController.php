<?php

require_once __DIR__ . '/Controller.php';

class FeedsController extends Controller {

    public $feed;

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $get = $_GET;

        $default_url = 'https://www.lequipe.fr/rss/actu_rss.xml';  // lequipe by default
        if (key_exists('src', $get)) {
            switch ($get['src']) {
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

        // TODO: Handle exception

        $curl = curl_init();

        curl_setopt_array($curl, Array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => 'UTF-8'
        ));

        $data = curl_exec($curl);
        curl_close($curl);

        $xml_response = simplexml_load_string($data, null, LIBXML_NOCDATA);
        $json_response = json_encode($xml_response);
        $response_array = json_decode($json_response, TRUE);

        $this->feed = $response_array['channel'];

        $this->renderView('feeds');
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
