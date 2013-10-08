
$(document).ready(function() {
	$(".alert-notice").alert();
	window.setTimeout(function() {
		$(".alert-notice").alert('close');
	}, 7000);
	$(".alert-error").alert();
	window.setTimeout(function() {
		$(".alert-error").alert('close');
	}, 7000);
	$(".alert-success").alert();
	window.setTimeout(function() {
		$(".alert-success").alert('close');
	}, 7000);

})