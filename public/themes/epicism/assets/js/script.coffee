root = @
jQuery = root.jQuery
canvas = jQuery(root)
doc = jQuery(root.document)

class Parallax
    canvas: null
    app: null
    constructor: (service) ->
        @app = service.jQuery
        @canvas = @app(service)
        @parallax()
        @header()
    parallax: ->
        app = @app
        canvas = @canvas

        nav      = app('#fixed-nav')
        header   = app('#header.inner')
        slider   = app('#slider')
        content  = app('body.home #content')
        navHomeY = nav.offset().top
        isFixed  = false

        canvas.scroll(->
            scrollTop = canvas.scrollTop()
            shouldBeFixed = scrollTop > navHomeY

            if shouldBeFixed and !isFixed
                nav.css(
                    position: 'fixed',
                    width: '100%',
                    top: 0,
                    opacity: 0.95
                )

                header.css(
                    paddingTop: '112px'
                )

                slider.css(
                    paddingTop: '112px'
                )

                content.css(
                    marginTop: '112px'
                )

                isFixed = true
            else if ! shouldBeFixed and isFixed
                nav.css(
                    position: 'relative',
                    width: '100%',
                    opacity: 1
                )

                header.css(
                    paddingTop: '0'
                )

                slider.css(
                    paddingTop: '0'
                )

                content.css(
                    marginTop: '0'
                )

                isFixed = false
        )
        true
    header: ->
        app = @app
        canvas = @canvas
        canvas.scroll(->
            scroll = canvas.scrollTop()
            slowScroll = scroll / 2
            app('#header').css(
                transform: "translateY(#{slowScroll}px)"
            )
        )

bootstrap = ($)->
    $('li', '#primary').hover(->
        $(this).find('ul:first').stop(true, true).animate(
            height: ['toggle', 'swing'],
            opacity: 'toggle'
        , 300, 'linear')

        true
    )

    $('pre').addClass('prettyprint')

    new Parallax(root)
    true

jQuery(bootstrap)
