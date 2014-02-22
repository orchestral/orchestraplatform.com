app = @.jQuery

bootstrap = ->
	app('pre').addClass('prettyprint')
	app('table').addClass('table table-striped')

	doc = app(document)
	win = app(window)
	toc = app('#toc', '#docs')

	viewport = ->
		height = doc.height()

		if doc.width() >= 768
			toc.css('height', height+'px')
		else
			toc.css('height', null)

		true

	if toc.size() > 0
		win.resize(viewport)
		viewport()

app(bootstrap)
