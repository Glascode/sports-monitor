<?php

require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {

	public function get() {
		$this->view->style = 'dashboard';
		$this->view->makePage('dashboard');
	}

	public function generateTagCloud($array) {
		$tagArray = $array;

		$res = '';

		shuffle($tagArray);
		
		foreach($tagArray as $tag) {
			$res .= '<a style="font-size: ' .  $tag['weight'] . 'px; href="' . $tag['url'] . '">' . $tag['tagname'] . '</a>' . "\n";
		}

		return $res;
	}
}