<?php

$date = "";
if (key_exists('date', $_GET)) {
	$date = $_GET['date'];
}



$tags = array(
	array('weight'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('weight'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('weight'  =>10, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('weight'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('weight'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('weight'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('weight'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
	array('weight'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('weight'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('weight'  =>10, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('weight'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('weight'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('weight'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('weight'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
	array('weight'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('weight'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('weight'  =>10, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('weight'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('weight'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('weight'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('weight'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
);

$res = '';
shuffle($tags);
		
foreach($tags as $tag) {
	$res .= "<a style=\"font-size: " . $tag['weight'] . "px\"; href=\"" . $tag['url'] . "\">" . $tag['tagname'] . "</a>";
}
        
echo $res;
?>