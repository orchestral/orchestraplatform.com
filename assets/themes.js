jQuery(function onPageReady ($) {

	$('body pre').addClass('prettyprint');
	prettyPrint();

	$('table').addClass('uk-table uk-table-striped');

	$('.tm-doc-sidebar > h3').addClass('uk-panel-title');
	$('.tm-doc-sidebar > ul').addClass('uk-nav uk-nav-side');
	$('.tm-doc-sidebar > ul > li').addClass('uk-nav-header');
});
