<?php

require_once __DIR__ . '/Controller.php';

class FeedController extends Controller {

    public function get() {
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
        $json = json_encode($xml_response);
        $array = json_decode($json, TRUE);

        $this->view->makeFeedPage($array);
    }

}
