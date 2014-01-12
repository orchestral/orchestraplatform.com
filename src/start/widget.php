<?php

use Orchestra\Story\Model\Content;

Widget::of('placeholder.footer', function ($placeholder) {
    $placeholder->add('what', function () {
        return View::make('widgets.what');
    });

    $placeholder->add('latest', function () {
        $posts = Content::post()->latestPublish()->take(5)->remember(60)->get();

        return View::make('widgets.latest', compact('posts'));
    });

    $placeholder->add('sponsor', function () {
        return View::make('widgets.sponsor');
    });
});
