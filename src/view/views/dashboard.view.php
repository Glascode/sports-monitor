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
?>

<div class="wrapper d-flex justify-content-around align-items-center">
	<div id="tag-cloud-1" class="tag-cloud-container d-flex flex-column align-items-center justify-content-between p-5">
		<div class="input-group date" data-provide="datepicker">
			<div class="form-group">
				<label for="tag-cloud-date-1" class="bmd-label-floating">Pick a date</label>
				<input type="text" class="form-control" id="tag-cloud-date-1">
			</div>
			<div class="input-group-addon">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="rgba(0,0,0,.26)"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
			</div>
		</div>

		<div class="tag-cloud">
			<?= $this->generateTagCloud($tags) ?>
		</div>
	</div>

	<div id="tag-cloud-2" class="tag-cloud-container d-flex flex-column align-items-center justify-content-between p-5">
		<div class="input-group date" data-provide="datepicker">
			<div class="form-group">
				<label for="tag-cloud-date-2" class="bmd-label-floating">Pick a date</label>
				<input type="text" class="form-control" id="tag-cloud-date-2">
			</div>
			<div class="input-group-addon">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="rgba(0,0,0,.26)"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
			</div>
		</div>

		<div class="tag-cloud">
			<?= $this->generateTagCloud($tags) ?>
		</div>
	</div>
</div>