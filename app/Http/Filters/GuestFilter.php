<?php namespace App\Http\Filters;

use Auth;
use Redirect;

class GuestFilter
{
    /**
     * Run the request filter.
     *
     * @return mixed
     */
    public function filter()
    {
        if (Auth::check()) {
            return Redirect::to('/');
        }
    }

}
