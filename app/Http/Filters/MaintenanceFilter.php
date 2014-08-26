<?php namespace App\Http\Filters;

use App;
use Response;

class MaintenanceFilter
{
    /**
     * Run the request filter.
     *
     * @return mixed
     */
    public function filter()
    {
        if (App::isDownForMaintenance())
        {
            return Response::make('Be right back!');
        }
    }

}
