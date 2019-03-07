<?php

require_once __DIR__ . '/Controller.php';

class FeedController extends Controller {

    public function get() {
        $url = 'https://www.lequipe.fr/rss/actu_rss.xml';
//        $xml_response = simplexml_load_string($url, "SimpleXMLElement", LIBXML_NOCDATA);
//        $json = json_encode($xml_response);
//        $array = json_decode($json,TRUE);

        $curl = curl_init();

        curl_setopt_array($curl, Array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => 'UTF-8'
        ));

        $data = curl_exec($curl);
        curl_close($curl);

        $xml_response = simplexml_load_string($data);
        $json = json_encode($xml_response);
        $array = json_decode($json,TRUE);

        $this->view->makeFeedPage($array);
    }

}
