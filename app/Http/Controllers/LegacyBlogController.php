<?php

namespace App\Http\Controllers;

class LegacyBlogController extends Controller
{
    /**
     * Redirect to root of orchestra/story.
     *
     * @return mixed
     */
    public function index()
    {
        return redirect(handles('orchestra/story::/'), 301);
    }

    /**
     * Redirect to specific page on orchestra/story.
     *
     * @return mixed
     */
    public function show($year, $month, $day, $slug)
    {
        $url = implode('/', [$year, $month, $day, $slug]);

        return redirect(handles("orchestra/story::{$url}"), 301);
    }
}
