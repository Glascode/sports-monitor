<?php

require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {

    public $styleSheet = 'dashboard';
    public $script = 'dashboard';

    public function get() {
        if (!$this->session->isUserLoggedIn()) {
            $this->redirect('/login');
        }

        $this->renderView('dashboard');
    }

    public function generateTagCloud($array) {
        $tagArray = $array;
		$res = '';
		shuffle($tagArray);
		
		foreach($tagArray as $tag) {
            $res .= "<a style=\"font-size: " . $tag['weight'] . "px\"; href=\"" . $tag['url'] . "\">" . $tag['tagname'] . "</a>";
        }
        
		return $res;
	}

}
