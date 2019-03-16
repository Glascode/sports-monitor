<?php

$date = "";
if (key_exists('date', $_GET)) {
	$date = $_GET['date'];
}

$tags = array(
	array('occurrences'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('occurrences'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('occurrences'  =>6, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('occurrences'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('occurrences'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('occurrences'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('occurrences'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
	array('occurrences'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('occurrences'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('occurrences'  =>10, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('occurrences'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('occurrences'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('occurrences'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('occurrences'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
	array('occurrences'  =>40, 'tagname' =>'tutorials', 'url'=>'http://www.phpro.org/tutorials/'),
	array('occurrences'  =>12, 'tagname' =>'examples', 'url'=>'http://www.phpro.org/examples/'),
	array('occurrences'  =>10, 'tagname' =>'contact', 'url'=>'http://www.phpro.org/contact/'),
	array('occurrences'  =>15, 'tagname' =>'quotes', 'url'=>'http://www.phpro.org/quotes/'),
	array('occurrences'  =>28, 'tagname' =>'devel', 'url'=>'http://www.phpro.org/phpdev/'),
	array('occurrences'  =>35, 'tagname' =>'manual', 'url'=>'http://www.phpro.org/en/index.html'),
	array('occurrences'  =>20, 'tagname' =>'articles', 'url'=>'http://www.phpro.org/articles/'),
);

$occurrenceMax = max(array_column($tags, 'occurrences'));

$res = '';
shuffle($tags);
		
foreach($tags as $tag) {
	$style = 'style="';

	if ($tag['occurrences'] <= $occurrenceMax*0.2) {
		$style .= 'font-size: 6pt;';
	} elseif ($tag['occurrences'] <= $occurrenceMax*0.4) {
		$style .= 'font-size: 12pt; font-weight: 300';
	} elseif ($tag['occurrences'] <= $occurrenceMax*0.6) {
		$style .= 'font-size: 18pt; font-weight: 500';
	} elseif ($tag['occurrences'] <= $occurrenceMax*0.8) {
		$style .= 'font-size: 24pt; font-weight: 700';
	} else {
		$style .= 'font-size: 30pt; font-weight: 900';
	}

	$style .= '"';

	$res .= "<a " . $style . "href=\"" . $tag['url'] . "\">" . $tag['tagname'] .  "</a>";
}
        
echo $res;
?>