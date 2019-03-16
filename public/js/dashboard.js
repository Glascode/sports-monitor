$.fn.datepicker.defaults.orientation = "bottom auto";
$.fn.datepicker.defaults.todayHighlight = "true";

$('#tag-cloud-date-1').change(function() {
	generateTagCloud($(this).val(), 'tag-cloud-1');
});

$('#tag-cloud-date-2').change(function() {
	generateTagCloud($(this).val(), 'tag-cloud-2');
});

function generateTagCloud(date, id_div) {
	var oReq = new XMLHttpRequest();

	oReq.onload = function() {
		$('#' + id_div).html(this.responseText)
	};

	oReq.open('get', 'generate_tag_cloud.php?date=' + date, true);

	oReq.send();
}