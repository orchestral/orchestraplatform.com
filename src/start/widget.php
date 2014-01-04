<?php

use Orchestra\Story\Model\Content;

$placeholder = Widget::make('placeholder.footer');

$placeholder->add('what', function () {
    return View::make('widgets.what');
});

$placeholder->add('latest', function () {
    $posts = Content::post()->latestPublish()->take(5)->remember(60)->get();

    return View::make('widgets.latest', compact('posts'));
});
