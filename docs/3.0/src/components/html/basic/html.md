---
title: Using HTML

---

`Orchestra\Html\HtmlBuilder` is a small improvement from `Illuminate\Html\HtmlBuilder`.

> Advise to use this only when manipulating HTML outside of view, otherwise it's better (and faster) to use html.

## Create HTML {#create-html}

Create a HTML tag from within your libraries/extension using following code:

    return HTML::create('p', 'Some awesome information');

    // will return <p>Some awesome information</p>

You can customize the HTML attibutes by adding third parameter.

    return HTML::create('p', 'Another awesomeness', ['id' => 'foo']);

    // will return <p id="foo">Another awesomeness</p>

## Raw HTML Entities {#raw-html}

Mark a string to be excluded from being escaped.

    return HTML::link('foo', HTML::raw('<img src="foo.jpg">'));

    // will return <a href="foo"><img src="foo.jpg"></a>

## Decorate HTML {#decorate-html}

Decorate method allow developer to define HTML attributes collection as `HTML::attributes` method, with the addition of including default attributes array as second parameter.

    return HTML::decorate(['class' => 'foo'], ['id' => 'foo', 'class' => 'span5']);

    // will return array('class' => 'foo span5', 'id' => 'foo');

It also support replacement of default attributes if such requirement is needed.

    return HTML::decorate(['class' => 'foo !span5'], ['class' => 'bar span5']);

    // will return array('class' => 'foo bar');
