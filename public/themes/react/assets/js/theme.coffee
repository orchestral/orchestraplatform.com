app = @.jQuery

bootstrap = ($)->
	app('pre').addClass('prettyprint')
	app('table').addClass('table table-striped')

app(bootstrap)
