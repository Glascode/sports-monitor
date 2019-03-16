$(document).ready(function (){
	$inputDate = $('.input-group.date');

	$inputDate.on('click', 'svg', function() {
		$parent = $(this).parent().parent();
		$parent.find('.form-group').addClass('is-focused');
	})
});
