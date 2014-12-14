<?php namespace App\Http\Controllers;

class LegacyBlogController extends Controller
{
    /**
     * Redirect to root of orchestra/story.
     *
     * @return mixed
     */
    public function index()
    {
        return redirect(handles('orchestra/story::/'));
    }

    /**
     * Redirect to specific page on orchestra/story.
     *
     * @return mixed
     */
    public function show($any)
    {
        return redirect(handles("orchestra/story::{$any}"));
    }
}
