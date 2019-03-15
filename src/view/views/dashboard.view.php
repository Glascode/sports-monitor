<h2 class="mb-5">Dashboard</h2>

<?php
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

$tagCloud = new tagCloud($tags);
?>

<div class="wrapper d-flex justify-content-around">
	<div id="tag-cloud-1" class="tag-cloud-container d-flex flex-column align-items-center justify-content-between p-5">
		<div class="input-group date" data-provide="datepicker">
			<div class="form-group">
				<label for="tag-cloud-date-1" class="bmd-label-floating">Pick a date</label>
				<input type="text" class="form-control" id="tag-cloud-date-1">
			</div>
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>

		<div class="tag-cloud">
			<?= $tagCloud->displayTagCloud(); ?>
		</div>
	</div>

	<div id="tag-cloud-2" class="tag-cloud-container d-flex flex-column align-items-center justify-content-between p-5">
		<div class="input-group date" data-provide="datepicker">
			<div class="form-group">
				<label for="tag-cloud-date-2" class="bmd-label-floating">Pick a date</label>
				<input type="text" class="form-control" id="tag-cloud-date-2">
			</div>
			<div class="input-group-addon">
				<span class="glyphicon glyphicon-th"></span>
			</div>
		</div>

		<div class="tag-cloud"></div>
	</div>
</div>

<?php

class tagCloud{

/*** the array of tags ***/
private $tagsArray;


public function __construct($tags){
 /*** set a few properties ***/
 $this->tagsArray = $tags;
}

/**
 *
 * Display tag cloud
 *
 * @access public
 *
 * @return string
 *
 */
public function displayTagCloud(){
 $ret = '';
 shuffle($this->tagsArray);
 foreach($this->tagsArray as $tag)
    {
    $ret.='<a style="font-size: '.$tag['weight'].'px;" href="'.$tag['url'].'">'.$tag['tagname'].'</a>'."\n";
    }
 return $ret;
}
    

} /*** end of class ***/

?>