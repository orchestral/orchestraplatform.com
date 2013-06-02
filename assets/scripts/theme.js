$(function() {
	$('.nav-tabs a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})
	$('.nav-tabs a:first').tab('show');
	$('.docs table, .post table').addClass('table table-striped');
	$('.section pre').addClass('prettyprint');
	prettyPrint();
});
